<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = PostCategory::query()
            ->withCount('posts')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.post-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.post-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        PostCategory::create($this->validatedCategoryData($request));

        return redirect()
            ->route('admin.post-categories.index')
            ->with('success', 'Post category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $postCategory): View
    {
        $posts = $postCategory->posts()
            ->with('media')
            ->latest()
            ->paginate(10);

        return view('admin.post-categories.show', compact('postCategory', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory): View
    {
        return view('admin.post-categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCategory $postCategory): RedirectResponse
    {
        $previousName = $postCategory->name;
        $validated = $this->validatedCategoryData($request, $postCategory);

        DB::transaction(function () use ($postCategory, $previousName, $validated): void {
            $postCategory->update($validated);

            if ($previousName !== $postCategory->name) {
                Post::query()
                    ->where('category', $previousName)
                    ->update([
                        'category' => $postCategory->name,
                        'updated_at' => now(),
                    ]);
            }
        });

        return redirect()
            ->route('admin.post-categories.show', $postCategory)
            ->with('success', 'Post category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory): RedirectResponse
    {
        if ($postCategory->posts()->exists()) {
            return redirect()
                ->route('admin.post-categories.index')
                ->with('error', 'This category cannot be deleted while posts use it.');
        }

        $postCategory->delete();

        return redirect()
            ->route('admin.post-categories.index')
            ->with('success', 'Post category deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedCategoryData(Request $request, ?PostCategory $postCategory = null): array
    {
        return $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('post_categories', 'name')->ignore($postCategory),
            ],
            'slug' => [
                'required',
                'string',
                'max:191',
                Rule::unique('post_categories', 'slug')->ignore($postCategory),
            ],
            'description' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
        ]);
    }
}
