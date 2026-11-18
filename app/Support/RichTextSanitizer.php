<?php

namespace App\Support;

use DOMComment;
use DOMDocument;
use DOMElement;
use DOMNode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Spatie\MediaLibrary\HasMedia;

class RichTextSanitizer
{
    private const ALLOWED_CONTENT_TAGS = [
        'a',
        'b',
        'blockquote',
        'br',
        'code',
        'del',
        'em',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'i',
        'img',
        'li',
        'ol',
        'p',
        'pre',
        's',
        'span',
        'strong',
        'sub',
        'sup',
        'u',
        'ul',
    ];

    /**
     * Sanitize editor HTML, optionally moving temporary uploads into the
     * model's media library so the stored markup points at permanent URLs.
     */
    public function sanitize(
        string $content,
        (Model&HasMedia)|null $model = null,
        bool $requireContent = true,
        string $temporaryDirectory = 'posts/content/tmp',
        string $mediaCollection = 'content-images',
        string $label = 'post',
    ): string {
        $document = new DOMDocument('1.0', 'UTF-8');
        $previousLibxmlErrorSetting = libxml_use_internal_errors(true);

        try {
            $loaded = $document->loadHTML(
                '<?xml encoding="UTF-8"><div id="rich-text-root">'.$content.'</div>',
                LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NONET,
            );
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previousLibxmlErrorSetting);
        }

        $container = $document->getElementsByTagName('div')->item(0);

        if (! $loaded || ! $container instanceof DOMElement) {
            throw ValidationException::withMessages([
                'content' => 'The '.$label.' content could not be processed.',
            ]);
        }

        $persistedImages = [];
        $this->sanitizeContentNodes(
            $container,
            $model,
            $persistedImages,
            $temporaryDirectory,
            $mediaCollection,
        );

        $sanitizedContent = '';

        foreach ($container->childNodes as $childNode) {
            $sanitizedContent .= $document->saveHTML($childNode);
        }

        $textContent = trim(html_entity_decode(strip_tags($sanitizedContent), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

        if ($requireContent && $textContent === '' && ! str_contains($sanitizedContent, '<img')) {
            throw ValidationException::withMessages([
                'content' => 'Add text or an image to the '.$label.' content.',
            ]);
        }

        return $sanitizedContent;
    }

    /**
     * Remove content images that are no longer referenced by the model.
     */
    public function deleteUnusedContentImages(
        Model&HasMedia $model,
        string $mediaCollection = 'content-images',
        string $field = 'content',
    ): void {
        $content = (string) $model->getAttribute($field);

        foreach ($model->getMedia($mediaCollection) as $media) {
            if (! str_contains($content, $media->getUrl())) {
                $media->delete();
            }
        }
    }

    /**
     * @param  array<string, string>  $persistedImages
     */
    private function sanitizeContentNodes(
        DOMNode $parent,
        (Model&HasMedia)|null $model,
        array &$persistedImages,
        string $temporaryDirectory,
        string $mediaCollection,
    ): void {
        foreach (iterator_to_array($parent->childNodes) as $childNode) {
            if ($childNode instanceof DOMComment) {
                $parent->removeChild($childNode);

                continue;
            }

            if (! $childNode instanceof DOMElement) {
                continue;
            }

            $tagName = strtolower($childNode->tagName);

            if (! in_array($tagName, self::ALLOWED_CONTENT_TAGS, true)) {
                if (in_array($tagName, ['embed', 'iframe', 'math', 'object', 'script', 'style', 'svg', 'template'], true)) {
                    $parent->removeChild($childNode);

                    continue;
                }

                while ($childNode->firstChild !== null) {
                    $parent->insertBefore($childNode->firstChild, $childNode);
                }

                $parent->removeChild($childNode);

                continue;
            }

            if ($tagName === 'img') {
                $source = $childNode->getAttribute('src');
                $temporaryPath = $this->temporaryContentImagePath($source, $temporaryDirectory);

                if ($temporaryPath !== null) {
                    if (! Storage::disk('public')->exists($temporaryPath)) {
                        $parent->removeChild($childNode);

                        continue;
                    }

                    if ($model !== null) {
                        if (! array_key_exists($temporaryPath, $persistedImages)) {
                            $media = $model->addMediaFromDisk($temporaryPath, 'public')
                                ->toMediaCollection($mediaCollection);
                            Storage::disk('public')->delete($temporaryPath);
                            $persistedImages[$temporaryPath] = $media->getUrl();
                        }

                        $childNode->setAttribute('src', $persistedImages[$temporaryPath]);
                    }
                } elseif (! $this->isSafeContentImageSource($source)) {
                    $parent->removeChild($childNode);

                    continue;
                }
            }

            $this->sanitizeContentAttributes($childNode, $tagName);
            $this->sanitizeContentNodes(
                $childNode,
                $model,
                $persistedImages,
                $temporaryDirectory,
                $mediaCollection,
            );
        }
    }

    private function sanitizeContentAttributes(DOMElement $element, string $tagName): void
    {
        $allowedAttributes = match ($tagName) {
            'a' => ['href', 'rel', 'target'],
            'img' => ['alt', 'height', 'src', 'width'],
            'li' => ['class', 'data-list'],
            'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' => ['class'],
            'span' => ['class'],
            default => [],
        };

        foreach (iterator_to_array($element->attributes) as $attribute) {
            $attributeName = strtolower($attribute->name);

            if (! in_array($attributeName, $allowedAttributes, true)) {
                $element->removeAttribute($attribute->name);

                continue;
            }

            if ($attributeName === 'href' && ! $this->isSafeContentLink($attribute->value)) {
                $element->removeAttribute($attribute->name);
            } elseif ($attributeName === 'class') {
                $classes = preg_split('/\s+/', trim($attribute->value)) ?: [];
                $classes = array_filter($classes, fn (string $class): bool => preg_match(
                    '/^ql-(?:align-(?:center|right|justify)|indent-[1-8])$/D',
                    $class,
                ) === 1);

                if ($classes === []) {
                    $element->removeAttribute($attribute->name);
                } else {
                    $element->setAttribute('class', implode(' ', $classes));
                }
            } elseif ($attributeName === 'data-list'
                && ! in_array($attribute->value, ['bullet', 'checked', 'ordered', 'unchecked'], true)) {
                $element->removeAttribute($attribute->name);
            } elseif (in_array($attributeName, ['height', 'width'], true)
                && (preg_match('/^\d{1,4}$/D', $attribute->value) !== 1 || (int) $attribute->value > 2000)) {
                $element->removeAttribute($attribute->name);
            }
        }

        if ($tagName === 'a') {
            if ($element->getAttribute('target') === '_blank') {
                $element->setAttribute('rel', 'noopener noreferrer');
            } else {
                $element->removeAttribute('target');
            }
        }
    }

    private function isSafeContentLink(string $url): bool
    {
        $url = trim($url);

        if ($url === '' || str_starts_with($url, '//') || preg_match('/[\x00-\x1F\x7F]/', $url) === 1) {
            return false;
        }

        $scheme = parse_url($url, PHP_URL_SCHEME);

        return $scheme === null || in_array(strtolower($scheme), ['http', 'https', 'mailto'], true);
    }

    private function isSafeContentImageSource(string $source): bool
    {
        $source = trim($source);

        if (str_starts_with($source, '//') || preg_match('/[\x00-\x1F\x7F]/', $source) === 1) {
            return false;
        }

        $scheme = parse_url($source, PHP_URL_SCHEME);

        if ($scheme !== null) {
            return in_array(strtolower($scheme), ['http', 'https'], true);
        }

        $storageUrlPath = parse_url(Storage::disk('public')->url(''), PHP_URL_PATH);
        $storagePrefix = rtrim(is_string($storageUrlPath) ? $storageUrlPath : '/storage', '/').'/';

        return str_starts_with($source, $storagePrefix);
    }

    private function temporaryContentImagePath(string $source, string $temporaryDirectory): ?string
    {
        $storageUrl = Storage::disk('public')->url('');
        $storageUrlPath = parse_url($storageUrl, PHP_URL_PATH);
        $sourcePath = parse_url($source, PHP_URL_PATH);
        $storageBasePath = rtrim(is_string($storageUrlPath) ? $storageUrlPath : '/storage', '/');
        $sourceHost = parse_url($source, PHP_URL_HOST);
        $storageHost = parse_url($storageUrl, PHP_URL_HOST);
        $temporaryDirectory = trim($temporaryDirectory, '/');
        $temporaryPrefix = $storageBasePath.'/'.$temporaryDirectory.'/';

        if (! is_string($sourcePath) || ! str_starts_with($sourcePath, $temporaryPrefix)) {
            return null;
        }

        if (is_string($sourceHost) && is_string($storageHost) && strcasecmp($sourceHost, $storageHost) !== 0) {
            return null;
        }

        $relativePath = substr($sourcePath, strlen($storageBasePath) + 1);

        if (preg_match('#^'.preg_quote($temporaryDirectory, '#').'/[A-Za-z0-9._-]+$#D', $relativePath) !== 1) {
            return null;
        }

        return $relativePath;
    }
}
