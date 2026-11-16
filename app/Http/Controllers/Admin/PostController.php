<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Support\WebpImage;
use DOMComment;
use DOMDocument;
use DOMElement;
use DOMNode;
use Illuminate\Http\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PostController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()
            ->with(['postCategory', 'media'])
            ->latest()
            ->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = PostCategory::query()->orderBy('name')->get();
        $statusOptions = $this->statusOptions();

        return view('admin.posts.create', compact('categories', 'statusOptions'));
    }

    public function uploadContentImage(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
        ]);
        $converted = WebpImage::convert($validated['image']);
        $path = Storage::disk('public')->putFileAs(
            'posts/content/tmp',
            new File($converted),
            Str::random(40).'.webp',
        );

        if (WebpImage::convert($path) !== $path) {
            $path = WebpImage::convert($path);
            Storage::disk('public')->assertExists($path);
        }

        return response()->json([
            'url' => Storage::disk('public')->url($path),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->normalizePublicationDate($this->validatedPostData($request));
        $image = $request->file('image');
        $validated['content'] = $this->sanitizeContent($validated['content']);
        unset($validated['image'], $validated['remove_image']);

        $post = Post::create($validated);
        $post->content = $this->sanitizeContent($post->content, $post);
        $post->save();

        if ($image !== null) {
            $media = $post->addMedia(WebpImage::convert($image))->toMediaCollection('featured-image');
            $post->update(['featured_image' => $media->getUrl()]);
        }

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $post->load(['postCategory', 'media']);
        $safeContent = $this->sanitizeContent($post->content, requireContent: false);

        return view('admin.posts.show', compact('post', 'safeContent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $categories = PostCategory::query()->orderBy('name')->get();
        $statusOptions = $this->statusOptions();

        return view('admin.posts.edit', compact('post', 'categories', 'statusOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $this->normalizePublicationDate($this->validatedPostData($request, $post));
        $image = $request->file('image');
        $removeImage = $request->boolean('remove_image');
        $validated['content'] = $this->sanitizeContent($validated['content']);
        unset($validated['image'], $validated['remove_image']);

        $post->update($validated);
        $post->content = $this->sanitizeContent($post->content, $post);
        $post->save();
        $this->deleteUnusedContentImages($post);

        if ($image !== null) {
            $media = $post->addMedia(WebpImage::convert($image))->toMediaCollection('featured-image');
            $post->update(['featured_image' => $media->getUrl()]);
        } elseif ($removeImage) {
            $post->clearMediaCollection('featured-image');
            $post->update(['featured_image' => null]);
        }

        return redirect()
            ->route('admin.posts.show', $post)
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedPostData(Request $request, ?Post $post = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($post),
            ],
            'category' => ['nullable', 'string', 'max:255', 'exists:post_categories,name'],
            'excerpt' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in(array_keys($this->statusOptions()))],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
            'remove_image' => ['sometimes', 'boolean'],
        ]);
    }

    /**
     * @param  array<string, mixed>  $validated
     * @return array<string, mixed>
     */
    private function normalizePublicationDate(array $validated): array
    {
        if ($validated['status'] === 'published') {
            $validated['published_at'] ??= now();
        } else {
            $validated['published_at'] = null;
        }

        return $validated;
    }

    /**
     * @return array<string, string>
     */
    private function statusOptions(): array
    {
        return [
            'draft' => 'Draft',
            'published' => 'Published',
        ];
    }

    private function sanitizeContent(string $content, ?Post $post = null, bool $requireContent = true): string
    {
        $document = new DOMDocument('1.0', 'UTF-8');
        $previousLibxmlErrorSetting = libxml_use_internal_errors(true);

        try {
            $loaded = $document->loadHTML(
                '<?xml encoding="UTF-8"><div id="post-content-root">'.$content.'</div>',
                LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NONET,
            );
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previousLibxmlErrorSetting);
        }

        $container = $document->getElementsByTagName('div')->item(0);

        if (! $loaded || ! $container instanceof DOMElement) {
            throw ValidationException::withMessages([
                'content' => 'The post content could not be processed.',
            ]);
        }

        $persistedImages = [];
        $this->sanitizeContentNodes($container, $post, $persistedImages);

        $sanitizedContent = '';

        foreach ($container->childNodes as $childNode) {
            $sanitizedContent .= $document->saveHTML($childNode);
        }

        $textContent = trim(html_entity_decode(strip_tags($sanitizedContent), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

        if ($requireContent && $textContent === '' && ! str_contains($sanitizedContent, '<img')) {
            throw ValidationException::withMessages([
                'content' => 'Add text or an image to the post content.',
            ]);
        }

        return $sanitizedContent;
    }

    /**
     * @param  array<string, string>  $persistedImages
     */
    private function sanitizeContentNodes(DOMNode $parent, ?Post $post, array &$persistedImages): void
    {
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
                $temporaryPath = $this->temporaryContentImagePath($source);

                if ($temporaryPath !== null) {
                    if (! Storage::disk('public')->exists($temporaryPath)) {
                        $parent->removeChild($childNode);

                        continue;
                    }

                    if ($post !== null) {
                        if (! array_key_exists($temporaryPath, $persistedImages)) {
                            $media = $post->addMediaFromDisk($temporaryPath, 'public')
                                ->toMediaCollection('content-images');
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
            $this->sanitizeContentNodes($childNode, $post, $persistedImages);
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

    private function temporaryContentImagePath(string $source): ?string
    {
        $storageUrl = Storage::disk('public')->url('');
        $storageUrlPath = parse_url($storageUrl, PHP_URL_PATH);
        $sourcePath = parse_url($source, PHP_URL_PATH);
        $storageBasePath = rtrim(is_string($storageUrlPath) ? $storageUrlPath : '/storage', '/');
        $sourceHost = parse_url($source, PHP_URL_HOST);
        $storageHost = parse_url($storageUrl, PHP_URL_HOST);
        $temporaryPrefix = $storageBasePath.'/posts/content/tmp/';

        if (! is_string($sourcePath) || ! str_starts_with($sourcePath, $temporaryPrefix)) {
            return null;
        }

        if (is_string($sourceHost) && is_string($storageHost) && strcasecmp($sourceHost, $storageHost) !== 0) {
            return null;
        }

        $relativePath = substr($sourcePath, strlen($storageBasePath) + 1);

        if (preg_match('#^posts/content/tmp/[A-Za-z0-9._-]+$#D', $relativePath) !== 1) {
            return null;
        }

        return $relativePath;
    }

    private function deleteUnusedContentImages(Post $post): void
    {
        foreach ($post->getMedia('content-images') as $media) {
            if (! str_contains($post->content, $media->getUrl())) {
                $media->delete();
            }
        }
    }
}
