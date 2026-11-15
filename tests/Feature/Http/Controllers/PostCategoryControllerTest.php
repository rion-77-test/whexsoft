<?php

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('post categories can be created updated and renamed for their posts', function () {
    $this->post(route('admin.post-categories.store'), [
        'name' => 'News',
        'slug' => 'news',
        'description' => 'News articles',
        'is_active' => 1,
    ])->assertRedirect(route('admin.post-categories.index'));

    $category = PostCategory::query()->where('slug', 'news')->firstOrFail();
    $post = Post::factory()->create(['category' => $category->name]);

    $this->put(route('admin.post-categories.update', $category), [
        'name' => 'Company News',
        'slug' => 'company-news',
        'description' => 'Company announcements',
        'is_active' => 0,
    ])->assertRedirect(route('admin.post-categories.show', $category));

    $category->refresh();
    $post->refresh();
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'category' => 'Company News',
    ]);

    $this->get(route('admin.post-categories.index'))
        ->assertOk()
        ->assertSee('Company News');
    $this->get(route('admin.post-categories.create'))->assertOk();
    $this->get(route('admin.post-categories.edit', $category))->assertOk();
    $this->get(route('admin.post-categories.show', $category))->assertOk();
});

test('post categories cannot be deleted while posts use them', function () {
    $category = PostCategory::factory()->create();
    Post::factory()->create(['category' => $category->name]);

    $this->delete(route('admin.post-categories.destroy', $category))
        ->assertRedirect(route('admin.post-categories.index'))
        ->assertSessionHas('error', 'This category cannot be deleted while posts use it.');

    $this->assertModelExists($category);
});

test('unused post categories can be deleted', function () {
    $category = PostCategory::factory()->create();

    $this->delete(route('admin.post-categories.destroy', $category))
        ->assertRedirect(route('admin.post-categories.index'));

    $this->assertModelMissing($category);
});
