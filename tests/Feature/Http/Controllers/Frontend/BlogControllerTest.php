<?php

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Setting;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('finds English post translations by title excerpt and content when English is active', function () {
    Setting::put('default_locale', 'en');

    $category = PostCategory::factory()->create();
    foreach ([
        'title' => 'EnglishTitleToken',
        'excerpt' => 'EnglishExcerptToken',
        'content' => 'EnglishContentToken',
    ] as $field => $term) {
        $post = Post::factory()->create([
            'category' => $category->name,
            'translations' => [
                'en' => [
                    'title' => $field === 'title' ? $term : 'English translated title',
                    'excerpt' => $field === 'excerpt' ? $term : 'English translated excerpt',
                    'content' => $field === 'content' ? $term : 'English translated content',
                ],
            ],
        ]);

        $this->get(route('blog.index', ['q' => $term]))
            ->assertOk()
            ->assertSee('<html lang="en">', false)
            ->assertViewHas('posts', fn ($posts): bool => $posts->total() === 1
                && $posts->getCollection()->first()->is($post));
    }
});

it('eager loads post categories for blog index and related post lists', function () {
    $category = PostCategory::factory()->create();
    $currentPost = Post::factory()->create(['category' => $category->name]);
    $relatedPost = Post::factory()->create(['category' => $category->name]);
    $recentPost = Post::factory()->create(['category' => 'Another category']);

    $this->get(route('blog.index'))
        ->assertOk()
        ->assertViewHas('posts', fn ($posts): bool => $posts->getCollection()
            ->every(fn (Post $post): bool => $post->relationLoaded('postCategory')));

    $this->get(route('blog.show', ['post' => $currentPost->slug]))
        ->assertOk()
        ->assertViewHas('post', fn (Post $post): bool => $post->relationLoaded('postCategory'))
        ->assertViewHas('relatedPosts', fn ($posts): bool => $posts
            ->every(fn (Post $post): bool => $post->relationLoaded('postCategory')))
        ->assertViewHas('recentPosts', fn ($posts): bool => $posts
            ->every(fn (Post $post): bool => $post->relationLoaded('postCategory')));
});
