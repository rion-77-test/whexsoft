<?php

use App\Models\Project;
use App\Models\Service;
use Database\Seeders\ServiceCategorySeeder;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('lists and renders every service detail page from the template', function () {
    $this->seed([
        ServiceCategorySeeder::class,
        ServiceSeeder::class,
    ]);

    $services = [
        'ecommerce-website' => 'ই-কমার্স ওয়েবসাইট ডেভেলপমেন্ট',
        'landing-page' => 'ল্যান্ডিং পেজ ডিজাইন',
        'corporate-portfolio-website' => 'কর্পোরেট ও পোর্টফোলিও ওয়েবসাইট',
        'dynamic-website' => 'ডাইনামিক ওয়েবসাইট ডেভেলপমেন্ট',
        'ui-ux-design' => 'UI/UX ডিজাইন',
        'website-maintenance' => 'ওয়েবসাইট মেইনটেন্যান্স',
    ];

    $listing = $this->get(route('services.index'))
        ->assertOk();

    foreach ($services as $slug => $title) {
        $listing->assertSee($title);

        $this->get(route('services.show', ['service' => $slug]))
            ->assertOk()
            ->assertSeeText($title);
    }
});

it('shows published projects linked to a service', function () {
    $service = Service::factory()->create([
        'is_active' => true,
        'title' => 'ওয়েবসাইট ডেভেলপমেন্ট',
        'slug' => 'website-development',
    ]);

    $project = Project::factory()->create([
        'service_id' => $service->id,
        'title' => 'অনলাইন স্টোর',
        'is_published' => true,
    ]);

    $unpublishedProject = Project::factory()->create([
        'service_id' => $service->id,
        'title' => 'ড্রাফট প্রজেক্ট',
        'is_published' => false,
    ]);

    $this->get(route('services.show', $service))
        ->assertOk()
        ->assertSeeText('এই সার্ভিসের প্রজেক্টসমূহ')
        ->assertSeeText($project->title)
        ->assertDontSeeText($unpublishedProject->title);
});

it('shows a single published project page and hides unpublished projects', function () {
    $project = Project::factory()->create([
        'title' => 'ব্যবসায়িক ওয়েবসাইট',
        'slug' => 'business-website',
        'is_published' => true,
    ]);

    $this->get(route('portfolio.show', $project))
        ->assertOk()
        ->assertSeeText($project->title)
        ->assertSeeText('প্রজেক্টের বিবরণ');

    $unpublishedProject = Project::factory()->create([
        'is_published' => false,
    ]);

    $this->get(route('portfolio.show', $unpublishedProject))
        ->assertNotFound();
});
