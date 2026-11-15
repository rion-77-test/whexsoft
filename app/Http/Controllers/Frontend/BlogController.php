<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display the published posts with search and category filters.
     */
    public function index(Request $request): View
    {
        $categories = PostCategory::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $search = trim($request->string('q')->toString());
        $activeCategory = $request->string('category')->toString();

        $posts = Post::query()
            ->published()
            ->with('media')
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->when($activeCategory !== '', fn ($query) => $query->where('category', $activeCategory))
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('frontend.blog.index', compact('posts', 'categories', 'search', 'activeCategory'));
    }

    /**
     * Display a single published post.
     */
    public function show(Post $post): View
    {
        abort_unless($post->status === 'published', 404);
        abort_if($post->published_at !== null && $post->published_at->isFuture(), 404);

        $post->load('media');

        $relatedPosts = Post::query()
            ->published()
            ->with('media')
            ->whereKeyNot($post->getKey())
            ->when($post->category, fn ($query) => $query->where('category', $post->category))
            ->latest('published_at')
            ->take(3)
            ->get();

        $recentPosts = Post::query()
            ->published()
            ->with('media')
            ->whereKeyNot($post->getKey())
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('frontend.blog.show', compact('post', 'relatedPosts', 'recentPosts'));
    }
}
