<?php

use App\Models\Package;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

test('services can be created updated and deleted with media and json sections', function () {
    $this->actingAsAdmin();

    Storage::fake('public');
    $category = ServiceCategory::factory()->create();

    $this->post(route('admin.services.store'), [
        'title' => 'Ecommerce Development',
        'slug' => 'ecommerce-development',
        'service_category_id' => $category->id,
        'short_description' => 'Online stores',
        'intro' => 'An introduction.',
        'content' => 'The service content.',
        'features' => [
            ['title' => 'Responsive', 'text' => 'Works on all screens.'],
            ['title' => '', 'text' => ''],
        ],
        'steps' => [
            ['title' => 'Discover', 'text' => 'We learn about your business.'],
        ],
        'faqs' => [
            ['question' => 'How long?', 'answer' => 'It depends.'],
        ],
        'meta_title' => 'Ecommerce Development',
        'meta_description' => 'Build an online store.',
        'sort_order' => 1,
        'is_active' => 1,
        'image' => UploadedFile::fake()->image('ecommerce.png'),
    ])->assertRedirect(route('admin.services.index'));

    $service = Service::query()->where('slug', 'ecommerce-development')->firstOrFail();
    $this->assertModelExists($service);
    expect($service->serviceCategory->is($category))->toBeTrue();
    expect($service->getMedia('service-image'))->toHaveCount(1);
    expect($service->features)->toHaveCount(1);
    expect($service->steps)->toHaveCount(1);
    expect($service->faqs)->toHaveCount(1);

    $this->put(route('admin.services.update', $service), [
        'title' => 'Updated Ecommerce Development',
        'slug' => 'updated-ecommerce-development',
        'service_category_id' => $category->id,
        'short_description' => 'Updated stores',
        'intro' => 'Updated introduction.',
        'content' => 'Updated content.',
        'features' => [],
        'steps' => [],
        'faqs' => [],
        'sort_order' => 2,
        'is_active' => 0,
    ])->assertRedirect(route('admin.services.show', $service));

    $service->refresh();
    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'title' => 'Updated Ecommerce Development',
        'is_active' => false,
    ]);
    expect($service->features)->toBe([]);
    expect($service->getMedia('service-image'))->toHaveCount(1);

    $this->get(route('admin.services.index'))
        ->assertOk()
        ->assertSee('Updated Ecommerce Development');
    $this->get(route('admin.services.create'))->assertOk();
    $this->get(route('admin.services.edit', $service))->assertOk();
    $this->get(route('admin.services.show', $service))->assertOk();

    $this->delete(route('admin.services.destroy', $service))
        ->assertRedirect(route('admin.services.index'));

    $this->assertModelMissing($service);
});

test('service content images are uploaded and attached to the service', function () {
    $this->actingAsAdmin();

    Storage::fake('public');
    $category = ServiceCategory::factory()->create();

    $uploadResponse = $this->postJson(route('admin.services.content-images.store'), [
        'image' => UploadedFile::fake()->image('content.png'),
    ])->assertOk()
        ->assertJsonStructure(['url']);

    $imageUrl = $uploadResponse->json('url');
    expect(Storage::disk('public')->allFiles('services/content/tmp'))->toHaveCount(1);

    $this->post(route('admin.services.store'), [
        'title' => 'Formatted Service',
        'slug' => 'formatted-service',
        'service_category_id' => $category->id,
        'content' => '<p>Safe <strong>formatted</strong> content</p><script>alert(1)</script><img src="'.$imageUrl.'" onerror="alert(1)">',
        'features' => [],
        'steps' => [],
        'faqs' => [],
        'sort_order' => 0,
        'is_active' => 1,
    ])->assertRedirect(route('admin.services.index'));

    $service = Service::query()->where('slug', 'formatted-service')->firstOrFail();
    $service->refresh();

    expect($service->getMedia('content-images'))->toHaveCount(1)
        ->and($service->content)->toContain('<strong>formatted</strong>')
        ->and($service->content)->not->toContain('<script')
        ->and($service->content)->not->toContain('onerror')
        ->and($service->content)->not->toContain('services/content/tmp');

    $this->get(route('admin.services.show', $service))
        ->assertOk()
        ->assertSee('<strong>formatted</strong>', false)
        ->assertDontSee('<script');
});

test('service pages render the fallback image when no image has been uploaded', function () {
    $this->actingAsAdmin();

    $service = Service::factory()->create();

    $this->get(route('admin.services.show', $service))
        ->assertOk()
        ->assertSee(asset('assets/admin/images/default-fallback-image.png'));
});

test('services cannot be deleted while packages use them', function () {
    $this->actingAsAdmin();

    $service = Service::factory()->create();
    Package::factory()->for($service, 'service')->create();

    $this->delete(route('admin.services.destroy', $service))
        ->assertRedirect(route('admin.services.index'))
        ->assertSessionHas('error', 'This service cannot be deleted while packages use it.');

    $this->assertModelExists($service);
});

test('service show page lists related projects and testimonials', function () {
    $this->actingAsAdmin();

    $service = Service::factory()->create();
    $project = Project::factory()->for($service, 'service')->create();
    $testimonial = Testimonial::factory()->for($service, 'service')->create();

    $this->get(route('admin.services.show', $service))
        ->assertOk()
        ->assertSee($project->title)
        ->assertSee($testimonial->client_name)
        ->assertSee($testimonial->quote);
});

test('projects and testimonials can be linked to a service', function () {
    $this->actingAsAdmin();

    $service = Service::factory()->create();
    $category = ProjectCategory::factory()->create();

    $this->post(route('admin.projects.store'), [
        'title' => 'Linked Project',
        'slug' => 'linked-project',
        'project_category_id' => $category->id,
        'service_id' => $service->id,
        'summary' => 'A linked project',
        'is_real_client' => 1,
        'is_featured' => 0,
        'is_published' => 1,
        'sort_order' => 0,
    ])->assertRedirect(route('admin.projects.index'));

    $this->post(route('admin.testimonials.store'), [
        'service_id' => $service->id,
        'client_name' => 'Linked Client',
        'quote' => 'A linked testimonial.',
        'is_published' => 1,
        'sort_order' => 0,
    ])->assertRedirect(route('admin.testimonials.index'));

    expect($service->projects()->where('slug', 'linked-project')->exists())->toBeTrue();
    expect($service->testimonials()->where('client_name', 'Linked Client')->exists())->toBeTrue();

    $this->get(route('admin.services.show', $service))
        ->assertOk()
        ->assertSee('Linked Project')
        ->assertSee('Linked Client');
});
