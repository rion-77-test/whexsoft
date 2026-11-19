<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Support\ContentImageUploader;
use App\Support\RichTextSanitizer;
use App\Support\TranslationPayload;
use App\Support\WebpImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(
        private readonly RichTextSanitizer $sanitizer,
        private readonly ContentImageUploader $contentImages,
    ) {}

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

        return response()->json([
            'url' => $this->contentImages->store($validated['image'], 'posts/content/tmp'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->normalizePublicationDate($this->validatedPostData($request));
        $image = $request->file('image');
        $validated['content'] = $this->sanitizer->sanitize($validated['content']);
        $validated['translations'] = $this->sanitizeTranslations($validated['translations'] ?? []);
        unset($validated['image'], $validated['remove_image']);

        $post = Post::create($validated);
        $post->content = $this->sanitizer->sanitize($post->content, $post);
        $post->translations = $this->sanitizeTranslations($post->translations ?? [], $post);
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
        $safeContent = $this->sanitizer->sanitize($post->content, requireContent: false);

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
        $validated['content'] = $this->sanitizer->sanitize($validated['content']);
        $validated['translations'] = $this->sanitizeTranslations($validated['translations'] ?? []);
        unset($validated['image'], $validated['remove_image']);

        $post->update($validated);
        $post->content = $this->sanitizer->sanitize($post->content, $post);
        $post->translations = $this->sanitizeTranslations($post->translations ?? [], $post);
        $post->save();
        $this->sanitizer->deleteUnusedContentImages($post);

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
        $validated = $request->validate([
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
            'translations' => ['nullable', 'array'],
            'translations.en' => ['nullable', 'array'],
            'translations.en.title' => ['nullable', 'string', 'max:255'],
            'translations.en.excerpt' => ['nullable', 'string', 'max:255'],
            'translations.en.content' => ['nullable', 'string'],
            'translations.en.meta_title' => ['nullable', 'string', 'max:255'],
            'translations.en.meta_description' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
            'remove_image' => ['sometimes', 'boolean'],
        ]);

        $validated['translations'] = TranslationPayload::clean($validated['translations'] ?? []);

        return $validated;
    }

    /**
     * @param  array<string, mixed>  $translations
     * @return array<string, mixed>|null
     */
    private function sanitizeTranslations(array $translations, ?Post $post = null): ?array
    {
        $content = data_get($translations, 'en.content');

        if (filled($content)) {
            data_set(
                $translations,
                'en.content',
                $this->sanitizer->sanitize(
                    (string) $content,
                    $post,
                    requireContent: false,
                    label: 'English post',
                ) ?: null,
            );
        }

        return TranslationPayload::clean($translations);
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
}
