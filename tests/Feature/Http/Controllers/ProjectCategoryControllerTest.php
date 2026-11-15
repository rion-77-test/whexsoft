<?php

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('project categories can be created updated and deleted', function () {
    $this->post(route('admin.project-categories.store'), [
        'name' => 'Web Development',
        'slug' => 'web-development',
        'description' => 'Web projects',
        'is_active' => 1,
        'sort_order' => 1,
    ])->assertRedirect(route('admin.project-categories.index'));

    $category = ProjectCategory::query()->where('slug', 'web-development')->firstOrFail();
    $this->assertModelExists($category);

    $this->put(route('admin.project-categories.update', $category), [
        'name' => 'Application Development',
        'slug' => 'application-development',
        'description' => 'Application projects',
        'is_active' => 0,
        'sort_order' => 2,
    ])->assertRedirect(route('admin.project-categories.show', $category));

    $category->refresh();
    $this->assertDatabaseHas('project_categories', [
        'id' => $category->id,
        'name' => 'Application Development',
        'is_active' => false,
    ]);

    $this->get(route('admin.project-categories.index'))
        ->assertOk()
        ->assertSee('Application Development');
    $this->get(route('admin.project-categories.create'))->assertOk();
    $this->get(route('admin.project-categories.edit', $category))->assertOk();
    $this->get(route('admin.project-categories.show', $category))->assertOk();

    $this->delete(route('admin.project-categories.destroy', $category))
        ->assertRedirect(route('admin.project-categories.index'));

    $this->assertModelMissing($category);
});

test('project categories cannot be deleted while projects use them', function () {
    $category = ProjectCategory::factory()->create();
    Project::factory()->for($category, 'projectCategory')->create();

    $this->delete(route('admin.project-categories.destroy', $category))
        ->assertRedirect(route('admin.project-categories.index'))
        ->assertSessionHas('error', 'This category cannot be deleted while projects use it.');

    $this->assertModelExists($category);
});
