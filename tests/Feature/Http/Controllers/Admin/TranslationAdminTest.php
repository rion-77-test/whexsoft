<?php

use App\Models\Package;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Cache;

uses(LazilyRefreshDatabase::class);

beforeEach(function () {
    Cache::forget('setting.default_locale');
    Cache::forget('setting.geo_language_enabled');
});

afterEach(function () {
    Cache::forget('setting.default_locale');
    Cache::forget('setting.geo_language_enabled');
});

test('admins can create each content type with cleaned English translations', function () {
    $this->actingAsAdmin();

    $this->post(route('admin.service-categories.store'), [
        'name' => 'Development',
        'slug' => 'development',
        'description' => 'Service category',
        'sort_order' => 0,
        'is_active' => 1,
        'translations' => ['en' => ['name' => ' Development ', 'description' => ' Web services ']],
    ])->assertRedirect(route('admin.service-categories.index'));
    $serviceCategory = ServiceCategory::query()->where('slug', 'development')->firstOrFail();

    $this->post(route('admin.project-categories.store'), [
        'name' => 'Portfolio',
        'slug' => 'portfolio',
        'description' => 'Project category',
        'is_active' => 1,
        'sort_order' => 0,
        'translations' => ['en' => ['name' => 'Portfolio work', 'description' => 'Selected work']],
    ])->assertRedirect(route('admin.project-categories.index'));
    $projectCategory = ProjectCategory::query()->where('slug', 'portfolio')->firstOrFail();

    $this->post(route('admin.post-categories.store'), [
        'name' => 'News',
        'slug' => 'news',
        'description' => 'Post category',
        'is_active' => 1,
        'translations' => ['en' => ['name' => 'News', 'description' => 'Company news']],
    ])->assertRedirect(route('admin.post-categories.index'));
    $postCategory = PostCategory::query()->where('slug', 'news')->firstOrFail();

    $this->post(route('admin.services.store'), [
        'title' => 'Web Development',
        'slug' => 'web-development',
        'service_category_id' => $serviceCategory->id,
        'short_description' => 'Source description',
        'intro' => 'Source intro',
        'content' => 'Source service content',
        'features' => [['title' => 'Source feature', 'text' => 'Source feature details']],
        'steps' => [],
        'faqs' => [],
        'sort_order' => 0,
        'is_active' => 1,
        'translations' => [
            'en' => [
                'title' => ' Web Development (EN) ',
                'intro' => '   ',
                'content' => '<p>English service content</p><script>bad()</script>',
                'features' => [['title' => ' Feature (EN) ', 'text' => ' Feature details (EN) ']],
            ],
        ],
    ])->assertRedirect(route('admin.services.index'));
    $service = Service::query()->where('slug', 'web-development')->firstOrFail();

    $this->post(route('admin.projects.store'), [
        'title' => 'Portfolio Project',
        'slug' => 'portfolio-project',
        'project_category_id' => $projectCategory->id,
        'summary' => 'Source summary',
        'description' => 'Source description',
        'is_real_client' => 1,
        'is_featured' => 0,
        'is_published' => 1,
        'sort_order' => 0,
        'translations' => [
            'en' => ['title' => 'Portfolio Project (EN)', 'summary' => 'Project summary (EN)'],
        ],
    ])->assertRedirect(route('admin.projects.index'));
    $project = Project::query()->where('slug', 'portfolio-project')->firstOrFail();

    $this->post(route('admin.testimonials.store'), [
        'client_name' => 'A Client',
        'business_name' => 'A Business',
        'quote' => 'Source quote',
        'is_published' => 1,
        'sort_order' => 0,
        'translations' => [
            'en' => ['business_name' => 'A Business (EN)', 'quote' => 'English quote'],
        ],
    ])->assertRedirect(route('admin.testimonials.index'));
    $testimonial = Testimonial::query()->where('client_name', 'A Client')->firstOrFail();

    $this->post(route('admin.packages.store'), [
        'name' => 'Starter',
        'price_label' => 'Starts at $99',
        'features' => [
            ['text' => '', 'included' => 0],
            ['text' => 'Source feature', 'included' => 1],
        ],
        'is_popular' => 0,
        'sort_order' => 0,
        'is_active' => 1,
        'translations' => [
            'en' => [
                'name' => 'Starter (EN)',
                'price_label' => 'Starts at $99',
                'feature_texts' => ['orphaned text', ' English feature '],
            ],
        ],
    ])->assertRedirect(route('admin.packages.index'));
    $package = Package::query()->where('name', 'Starter')->firstOrFail();

    $this->post(route('admin.posts.store'), [
        'title' => 'Source Post',
        'slug' => 'source-post',
        'category' => $postCategory->name,
        'excerpt' => 'Source excerpt',
        'content' => 'Source post content',
        'status' => 'draft',
        'published_at' => '',
        'translations' => [
            'en' => [
                'title' => 'Source Post (EN)',
                'excerpt' => 'English excerpt',
                'content' => '<p>English post content</p><script>bad()</script>',
            ],
        ],
    ])->assertRedirect(route('admin.posts.index'));
    $post = Post::query()->where('slug', 'source-post')->firstOrFail();

    $service->refresh();
    $project->refresh();
    $testimonial->refresh();
    $package->refresh();
    $post->refresh();

    expect(data_get($serviceCategory->translations, 'en.name'))->toBe('Development')
        ->and(data_get($projectCategory->translations, 'en.description'))->toBe('Selected work')
        ->and(data_get($postCategory->translations, 'en.name'))->toBe('News')
        ->and(data_get($service->translations, 'en.title'))->toBe('Web Development (EN)')
        ->and(data_get($service->translations, 'en.intro'))->toBeNull()
        ->and(data_get($service->translations, 'en.content'))->toContain('<p>English service content</p>')
        ->and(data_get($service->translations, 'en.content'))->not->toContain('<script')
        ->and(data_get($service->translations, 'en.features.0.title'))->toBe('Feature (EN)')
        ->and(data_get($project->translations, 'en.summary'))->toBe('Project summary (EN)')
        ->and(data_get($testimonial->translations, 'en.quote'))->toBe('English quote')
        ->and($package->localizedFeatures()[0]['text'])->toBe('English feature')
        ->and(data_get($post->translations, 'en.content'))->toContain('<p>English post content</p>')
        ->and(data_get($post->translations, 'en.content'))->not->toContain('<script');

    $this->get(route('admin.services.create'))
        ->assertOk()
        ->assertSee('name="translations[en][title]"', false)
        ->assertSee('translations[en][features][__INDEX__][title]', false);

    $this->get(route('admin.services.index'))
        ->assertOk()
        ->assertSee('EN: ready');
});

test('admins can configure visitor language and see incomplete translation warnings', function () {
    $this->actingAsAdmin();
    Service::factory()->create(['title' => 'Untranslated service']);
    Setting::put('geo_language_enabled', '1');
    Setting::put('default_locale', 'en');

    $this->get(route('admin.settings.language'))
        ->assertOk()
        ->assertSee('Untranslated records will show Bengali text to English visitors and search engines.')
        ->assertSee('Services')
        ->assertSee('0 / 1');

    $this->from(route('admin.settings.language'))
        ->put(route('admin.settings.language.update'), [
            'geo_language_enabled' => '0',
            'default_locale' => 'bn',
        ])
        ->assertRedirect(route('admin.settings.language'))
        ->assertSessionHas('success', 'Language settings updated.');

    expect(Setting::geoEnabled())->toBeFalse()
        ->and(Setting::defaultLocale())->toBe('bn');
});

test('language settings remain restricted to administrators', function () {
    $this->get(route('admin.settings.language'))
        ->assertRedirect(route('login'));
});
