<?php

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

test('posts can be created updated and deleted with featured media', function () {
    $this->travelTo('2026-11-14 12:00:00');
    Storage::fake('public');
    $category = PostCategory::factory()->create();

    $this->post(route('admin.posts.store'), [
        'title' => 'First Post',
        'slug' => 'first-post',
        'category' => $category->name,
        'excerpt' => 'A short excerpt',
        'content' => 'Full post content',
        'status' => 'published',
        'published_at' => '',
        'meta_title' => 'First Post SEO',
        'meta_description' => 'First post metadata',
        'image' => UploadedFile::fake()->image('featured.png'),
    ])->assertRedirect(route('admin.posts.index'));

    $post = Post::query()->where('slug', 'first-post')->firstOrFail();
    $this->assertModelExists($post);
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'category' => $category->name,
        'status' => 'published',
        'published_at' => '2026-11-14 12:00:00',
    ]);
    expect($post->postCategory->is($category))->toBeTrue();
    expect($post->getMedia('featured-image'))->toHaveCount(1);

    $mediaId = $post->getFirstMedia('featured-image')->id;

    $this->put(route('admin.posts.update', $post), [
        'title' => 'Updated Post',
        'slug' => 'updated-post',
        'category' => '',
        'excerpt' => 'Updated excerpt',
        'content' => 'Updated content',
        'status' => 'draft',
        'published_at' => '2026-11-14T12:00',
        'meta_title' => '',
        'meta_description' => '',
        'remove_image' => 1,
    ])->assertRedirect(route('admin.posts.show', $post));

    $post->refresh();
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'slug' => 'updated-post',
        'category' => null,
        'status' => 'draft',
        'published_at' => null,
        'featured_image' => null,
    ]);
    $this->assertDatabaseMissing('media', ['id' => $mediaId]);

    $this->delete(route('admin.posts.destroy', $post))
        ->assertRedirect(route('admin.posts.index'));

    $this->assertModelMissing($post);
});

test('post pages render the image fallback when no image is uploaded', function () {
    $post = Post::factory()->create();

    $this->get(route('admin.posts.index'))
        ->assertOk()
        ->assertSee($post->title);

    $this->get(route('admin.posts.create'))->assertOk();
    $this->get(route('admin.posts.edit', $post))->assertOk();
    $this->get(route('admin.posts.show', $post))
        ->assertOk()
        ->assertSee(asset('assets/admin/images/default-fallback-image.png'));
});

test('post content images are uploaded and attached to the post', function () {
    Storage::fake('public');
    $category = PostCategory::factory()->create();

    $uploadResponse = $this->postJson(route('admin.posts.content-images.store'), [
        'image' => UploadedFile::fake()->image('content.png'),
    ])->assertOk()
        ->assertJsonStructure(['url']);

    $imageUrl = $uploadResponse->json('url');
    expect(Storage::disk('public')->allFiles('posts/content/tmp'))->toHaveCount(1);

    $this->post(route('admin.posts.store'), [
        'title' => 'Formatted Post',
        'slug' => 'formatted-post',
        'category' => $category->name,
        'excerpt' => 'A formatted post',
        'content' => '<p>Safe <strong>formatted</strong> content</p><script>alert(1)</script><img src="'.$imageUrl.'" onerror="alert(1)">',
        'status' => 'draft',
    ])->assertRedirect(route('admin.posts.index'));

    $post = Post::query()->where('slug', 'formatted-post')->firstOrFail();
    $post->refresh();

    expect($post->getMedia('content-images'))->toHaveCount(1)
        ->and($post->content)->toContain('<strong>formatted</strong>')
        ->and($post->content)->not->toContain('<script')
        ->and($post->content)->not->toContain('onerror')
        ->and($post->content)->not->toContain('posts/content/tmp');

    $this->get(route('admin.posts.show', $post))
        ->assertOk()
        ->assertSee('<strong>formatted</strong>', false)
        ->assertDontSee('<script');
});

test('post content image uploads reject non-image files', function () {
    Storage::fake('public');

    $this->postJson(route('admin.posts.content-images.store'), [
        'image' => UploadedFile::fake()->create('payload.txt', 1, 'text/plain'),
    ])->assertUnprocessable()
        ->assertJsonValidationErrors('image');

    expect(Storage::disk('public')->allFiles('posts/content/tmp'))->toBeEmpty();
});

test('legacy post content is sanitized before it is rendered', function () {
    $post = Post::factory()->create([
        'content' => '<p>Visible <em>formatting</em></p><script>alert(1)</script><img src="x" onerror="alert(1)"><a href="javascript:alert(1)">Unsafe link</a>',
    ]);

    $this->get(route('admin.posts.show', $post))
        ->assertOk()
        ->assertSee('<em>formatting</em>', false)
        ->assertDontSee('<script')
        ->assertDontSee('onerror')
        ->assertDontSee('javascript:');
});
