<?php

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

test('service categories can be created updated and deleted with media', function () {
    Storage::fake('public');

    $this->post(route('admin.service-categories.store'), [
        'name' => 'Website',
        'slug' => 'website',
        'description' => 'Website services',
        'sort_order' => 1,
        'is_active' => 1,
        'image' => UploadedFile::fake()->image('website.png'),
    ])->assertRedirect(route('admin.service-categories.index'));

    $category = ServiceCategory::query()->where('slug', 'website')->firstOrFail();
    $this->assertModelExists($category);
    expect($category->getMedia('category-image'))->toHaveCount(1);

    $this->put(route('admin.service-categories.update', $category), [
        'name' => 'Web Development',
        'slug' => 'web-development',
        'description' => 'Web development services',
        'sort_order' => 2,
        'is_active' => 0,
        'remove_image' => 1,
    ])->assertRedirect(route('admin.service-categories.show', $category));

    $category->refresh();
    $this->assertDatabaseHas('service_categories', [
        'id' => $category->id,
        'name' => 'Web Development',
        'slug' => 'web-development',
        'is_active' => false,
    ]);
    expect($category->getMedia('category-image'))->toHaveCount(0);

    $this->get(route('admin.service-categories.index'))
        ->assertOk()
        ->assertSee('Web Development');
    $this->get(route('admin.service-categories.create'))->assertOk();
    $this->get(route('admin.service-categories.edit', $category))->assertOk();
    $this->get(route('admin.service-categories.show', $category))->assertOk();

    $this->delete(route('admin.service-categories.destroy', $category))
        ->assertRedirect(route('admin.service-categories.index'));

    $this->assertModelMissing($category);
});

test('service categories cannot be deleted while services use them', function () {
    $category = ServiceCategory::factory()->create();
    Service::factory()->for($category, 'serviceCategory')->create();

    $this->delete(route('admin.service-categories.destroy', $category))
        ->assertRedirect(route('admin.service-categories.index'))
        ->assertSessionHas('error', 'This category cannot be deleted while services use it.');

    $this->assertModelExists($category);
});
