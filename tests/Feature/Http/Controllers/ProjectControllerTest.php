<?php

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

test('projects can be created updated and deleted with media', function () {
    Storage::fake('public');
    $category = ProjectCategory::factory()->create();

    $this->post(route('admin.projects.store'), [
        'title' => 'Portfolio Project',
        'slug' => 'portfolio-project',
        'project_category_id' => $category->id,
        'summary' => 'A project summary',
        'description' => 'A project description',
        'live_url' => 'https://example.com',
        'is_real_client' => 1,
        'is_featured' => 0,
        'is_published' => 1,
        'sort_order' => 2,
        'image' => UploadedFile::fake()->image('portfolio.png'),
    ])->assertRedirect(route('admin.projects.index'));

    $project = Project::query()->where('slug', 'portfolio-project')->firstOrFail();
    $this->assertModelExists($project);
    expect($project->projectCategory->is($category))->toBeTrue();
    expect($project->getMedia('project-image'))->toHaveCount(1);

    $firstMediaId = $project->getFirstMedia('project-image')->id;

    $this->put(route('admin.projects.update', $project), [
        'title' => 'Updated Portfolio Project',
        'slug' => 'updated-portfolio-project',
        'project_category_id' => $category->id,
        'summary' => 'Updated summary',
        'description' => 'Updated description',
        'live_url' => 'https://example.org',
        'is_real_client' => 0,
        'is_featured' => 1,
        'is_published' => 1,
        'sort_order' => 3,
        'image' => UploadedFile::fake()->image('updated-portfolio.png'),
    ])->assertRedirect(route('admin.projects.show', $project));

    $project->refresh();
    $currentMediaId = $project->getFirstMedia('project-image')->id;
    $this->assertDatabaseHas('projects', [
        'id' => $project->id,
        'title' => 'Updated Portfolio Project',
        'slug' => 'updated-portfolio-project',
        'is_real_client' => false,
        'is_featured' => true,
    ]);
    expect($project->getMedia('project-image'))->toHaveCount(1);
    expect($project->getFirstMedia('project-image')->id)->not->toBe($firstMediaId);

    $this->delete(route('admin.projects.destroy', $project))
        ->assertRedirect(route('admin.projects.index'));

    $this->assertModelMissing($project);
    $this->assertDatabaseMissing('media', ['id' => $currentMediaId]);
});

test('project pages render the fallback image when no image has been uploaded', function () {
    $project = Project::factory()->create();

    $this->get(route('admin.projects.index'))
        ->assertOk()
        ->assertSee($project->title);

    $this->get(route('admin.projects.create'))->assertOk();
    $this->get(route('admin.projects.edit', $project))->assertOk();
    $this->get(route('admin.projects.show', $project))
        ->assertOk()
        ->assertSee(asset('assets/admin/images/default-fallback-image.png'));
});
