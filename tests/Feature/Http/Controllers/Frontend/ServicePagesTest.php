<?php

use App\Models\Package;
use App\Models\Project;
use App\Models\Service;
use Database\Seeders\ServiceCategorySeeder;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('uses one frontend theme and no longer serves a pricing page', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false)
        ->assertDontSee('data-theme=')
        ->assertDontSee('theme-toggle');

    $this->get('/pricing')
        ->assertNotFound();
});

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
            ->assertSeeText($title)
            ->assertDontSeeText('এই সার্ভিসের প্যাকেজের মূল্য জানতে আমাদের সঙ্গে যোগাযোগ করুন।');
    }
});

it('renders service listing details from stored service data', function () {
    Service::factory()->create([
        'slug' => 'ecommerce-website',
        'title' => 'Dynamic Service',
        'short_description' => null,
        'intro' => 'Stored service introduction.',
        'content' => null,
        'features' => [['title' => 'Stored feature', 'text' => 'Stored feature description.']],
        'steps' => [['title' => 'Stored step', 'text' => 'Stored step description.']],
        'faqs' => [['question' => 'Stored question?', 'answer' => 'Stored answer.']],
    ]);

    $this->get(route('services.index'))
        ->assertOk()
        ->assertSeeText('Dynamic Service')
        ->assertSeeText('Stored service introduction.')
        ->assertSeeText('Stored feature')
        ->assertSeeText('Stored step')
        ->assertSeeText('Stored question?')
        ->assertDontSeeText('পণ্য ও অর্ডার ব্যবস্থাপনা')
        ->assertDontSeeText('বাংলায় যোগাযোগ')
        ->assertDontSeeText('আলোচনা ও পরিকল্পনা')
        ->assertDontSeeText('কোন সার্ভিসটি আমার জন্য উপযুক্ত?')
        ->assertDontSee('project-ecommerce.jpg');
});

it('shows five services and translated fallback descriptions on the public pages', function () {
    foreach (range(1, 6) as $position) {
        Service::factory()->create([
            'title' => 'Homepage service '.$position,
            'slug' => $position === 1 ? 'ecommerce-website' : 'homepage-service-'.$position,
            'short_description' => $position === 1 ? null : 'Stored service summary.',
            'intro' => $position === 1 ? null : 'Stored service introduction.',
            'content' => null,
            'features' => [],
            'sort_order' => $position,
        ]);
    }

    $this->get(route('home'))
        ->assertOk()
        ->assertViewHas('services', fn ($services): bool => $services->count() === 5)
        ->assertSeeText('আধুনিক প্রবৃদ্ধির জন্য ডিজিটাল সমাধান')
        ->assertSeeText('Homepage service 1')
        ->assertSeeText('Homepage service 5')
        ->assertSeeText('বিক্রয় বাড়াতে আগ্রহী অনলাইন বিক্রেতাদের জন্য দ্রুত ও ব্যবহারবান্ধব ই-কমার্স স্টোর।');

    $this->get(route('services.index'))
        ->assertOk()
        ->assertSeeText('বিক্রয় বাড়াতে আগ্রহী অনলাইন বিক্রেতাদের জন্য দ্রুত ও ব্যবহারবান্ধব ই-কমার্স স্টোর।');
});

it('renders only stored features steps and faqs on a service detail page', function () {
    $service = Service::factory()->create([
        'slug' => 'ecommerce-website',
        'title' => 'Dynamic Service',
        'features' => [['title' => 'Stored feature', 'text' => 'Stored feature description.']],
        'steps' => [['title' => 'Stored step', 'text' => 'Stored step description.']],
        'faqs' => [['question' => 'Stored question?', 'answer' => 'Stored answer.']],
    ]);

    $this->get(route('services.show', $service))
        ->assertOk()
        ->assertSeeText('Stored feature')
        ->assertSeeText('Stored step')
        ->assertSeeText('Stored question?')
        ->assertSeeText('Stored answer.')
        ->assertDontSeeText('বিকাশ/নগদ পেমেন্ট')
        ->assertDontSeeText('আলোচনা ও পরিকল্পনা')
        ->assertDontSeeText('এই সার্ভিসে কী কী অন্তর্ভুক্ত?')
        ->assertDontSee('project-ecommerce.jpg');
});

it('shows the lowest active package price in Bengali on the services banner', function () {
    Package::factory()->create([
        'service_id' => null,
        'price_label' => 'Starts at $120',
    ]);
    Package::factory()->create([
        'service_id' => null,
        'price_label' => 'Starts at $99',
    ]);
    Package::factory()->create([
        'service_id' => null,
        'price_label' => 'Starts at $1,200',
    ]);
    Package::factory()->create([
        'service_id' => null,
        'price_label' => 'Starts at $10',
        'is_active' => false,
    ]);

    $this->get(route('services.index'))
        ->assertOk()
        ->assertSeeText('প্যাকেজের মূল্য শুরু $99 থেকে')
        ->assertDontSeeText('Starts at $99')
        ->assertDontSeeText('$10');
});

it('omits the starting-price line when active packages have no numeric price', function () {
    Package::factory()->create([
        'service_id' => null,
        'price_label' => 'যোগাযোগ করুন',
    ]);
    Package::factory()->create([
        'service_id' => null,
        'price_label' => 'Starts at $25',
        'is_active' => false,
    ]);

    $this->get(route('services.index'))
        ->assertOk()
        ->assertDontSeeText('প্যাকেজের মূল্য শুরু');
});

it('does not render a package section on the home page', function () {
    Package::factory()->create([
        'service_id' => null,
        'name' => 'General Starter',
        'tagline' => 'For small businesses',
        'price_label' => '$250',
        'features' => [['text' => 'Five pages', 'included' => true]],
    ]);

    $service = Service::factory()->create();
    Package::factory()->create([
        'service_id' => $service->id,
        'name' => 'Service Package',
    ]);
    Package::factory()->create([
        'service_id' => null,
        'name' => 'Inactive General',
        'is_active' => false,
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertDontSeeText('আমাদের প্যাকেজসমূহ')
        ->assertDontSeeText('General Starter')
        ->assertDontSeeText('$250')
        ->assertDontSeeText('Five pages')
        ->assertDontSeeText('Service Package')
        ->assertDontSeeText('Inactive General');
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

it('keeps the related-projects section visible when a service has no published projects', function () {
    $service = Service::factory()->create([
        'is_active' => true,
        'title' => 'ওয়েবসাইট ডেভেলপমেন্ট',
        'slug' => 'website-development',
    ]);

    $this->get(route('services.show', $service))
        ->assertOk()
        ->assertSeeText('এই সার্ভিসের প্রজেক্টসমূহ')
        ->assertSeeText('এই সার্ভিসের সঙ্গে সম্পর্কিত প্রজেক্টগুলো শিগগিরই এখানে যোগ করা হবে।');
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

it('shows the project walkthrough section only when a YouTube link is set', function () {
    $withWalkthrough = Project::factory()->create([
        'slug' => 'walkthrough-project',
        'project_walkthrough_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        'is_published' => true,
    ]);

    $this->get(route('portfolio.show', $withWalkthrough))
        ->assertOk()
        ->assertSeeText('প্রজেক্ট ওয়াকথ্রু')
        ->assertSee('https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ', false);

    $withoutWalkthrough = Project::factory()->create([
        'slug' => 'no-walkthrough-project',
        'project_walkthrough_url' => null,
        'is_published' => true,
    ]);

    $this->get(route('portfolio.show', $withoutWalkthrough))
        ->assertOk()
        ->assertDontSeeText('প্রজেক্ট ওয়াকথ্রু');
});

it('shows the lowest active package price for the selected service', function () {
    $service = Service::factory()->create([
        'is_active' => true,
        'slug' => 'website-development',
    ]);

    Package::factory()->create([
        'service_id' => $service->id,
        'price_label' => 'Starts at $120',
    ]);
    Package::factory()->create([
        'service_id' => $service->id,
        'price_label' => 'Starts at $99',
    ]);
    Package::factory()->create([
        'service_id' => $service->id,
        'price_label' => 'Starts at $10',
        'is_active' => false,
    ]);
    Package::factory()->create([
        'service_id' => null,
        'price_label' => 'Starts at $5',
    ]);

    $this->get(route('services.show', $service))
        ->assertOk()
        ->assertSeeText('প্যাকেজের মূল্য শুরু $99 থেকে')
        ->assertDontSeeText('Starts at $10')
        ->assertDontSeeText('Starts at $5');
});
