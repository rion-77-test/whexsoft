<?php

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

/*
|--------------------------------------------------------------------------
| Step 26 - Bilingual site test checklist
|--------------------------------------------------------------------------
| Each test below maps to one row of the checklist in
| project_files/documentation/bilingual_site_plan_v3.md
*/

function geoOn(): void
{
    Setting::put('geo_language_enabled', '1');
}

function geoOff(): void
{
    Setting::put('geo_language_enabled', '0');
}

it('1. serves Bengali to a new visitor from Bangladesh when geo-routing is on', function () {
    geoOn();

    $this->withHeader('CF-IPCountry', 'BD')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);
});

it('2. serves English to a new visitor from a non-Bangladesh country when geo-routing is on', function () {
    geoOn();

    $this->withHeader('CF-IPCountry', 'US')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="en">', false);
});

it('3. lets a Bangladesh visitor switch to English and keeps the same URL', function () {
    geoOn();
    Setting::put('default_locale', 'bn');

    ServiceCategory::factory()->create(['slug' => 'web-design']);

    $target = route('services.index', ['category' => 'web-design', 'page' => 2]);

    $this->withHeader('CF-IPCountry', 'BD')
        ->from($target)
        ->get(route('language.switch', 'en'))
        ->assertRedirect($target)
        ->assertCookie('locale', 'en')
        ->assertHeader('X-Robots-Tag', 'noindex, nofollow');

    // Following request carries the new cookie and stays on the same URL.
    $this->withHeader('CF-IPCountry', 'BD')
        ->withCookie('locale', 'en')
        ->get($target)
        ->assertOk()
        ->assertSee('<html lang="en">', false)
        ->assertSee('Digital solutions for your business')
        ->assertDontSee('<html lang="bn">', false);
});

it('4. keeps the visitor choice after a browser restart and overrides geo-detection', function () {
    geoOn();

    // First request: visitor in the US chooses Bengali.
    $this->withHeader('CF-IPCountry', 'US')
        ->withCookie('locale', 'bn')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);

    // "Browser reopened": new request, same cookie, still from a foreign IP.
    $this->withHeader('CF-IPCountry', 'US')
        ->withCookie('locale', 'bn')
        ->get(route('services.index'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);

    // A cookied visitor also overrides the geo rule when geo-routing is switched off.
    geoOff();

    $this->withCookie('locale', 'bn')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);
});

it('5. uses the admin default language when geo-routing is off and respects existing cookies', function () {
    geoOff();
    Setting::put('default_locale', 'bn');

    $this->withHeader('CF-IPCountry', 'US')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);

    Setting::put('default_locale', 'en');

    $this->withHeader('CF-IPCountry', 'BD')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="en">', false);

    // A cookie still wins over the admin default.
    $this->withHeader('CF-IPCountry', 'BD')
        ->withCookie('locale', 'bn')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);
});

it('6. falls back to the admin default without a country header and without errors', function () {
    geoOn();
    Setting::put('default_locale', 'bn');

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);

    Setting::put('default_locale', 'en');

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="en">', false);

    // Unresolvable / private country codes are ignored too.
    $this->withHeader('CF-IPCountry', 'XX')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="en">', false);
});

it('7. renders a fully translated record in English, including features steps and FAQs', function () {
    $category = ServiceCategory::factory()->create([
        'name' => 'বাংলা ক্যাটাগরি',
        'slug' => 'translated-category',
        'translations' => ['en' => ['name' => 'English Category']],
    ]);

    $service = Service::factory()->create([
        'service_category_id' => $category->id,
        'title' => 'বাংলা সেবা',
        'slug' => 'translated-service',
        'short_description' => 'বাংলা সংক্ষিপ্ত বর্ণনা',
        'intro' => 'বাংলা ভূমিকা',
        'content' => '<p>বাংলা কনটেন্ট</p>',
        'features' => [
            ['title' => 'বাংলা ফিচার', 'text' => 'বাংলা ফিচার বিবরণ'],
        ],
        'steps' => [
            ['title' => 'বাংলা ধাপ', 'text' => 'বাংলা ধাপ বিবরণ'],
        ],
        'faqs' => [
            ['question' => 'বাংলা প্রশ্ন?', 'answer' => 'বাংলা উত্তর'],
        ],
        'meta_title' => 'বাংলা মেটা শিরোনাম',
        'meta_description' => 'বাংলা মেটা বর্ণনা',
        'translations' => [
            'en' => [
                'title' => 'English Service',
                'short_description' => 'English short description',
                'intro' => 'English introduction',
                'content' => '<p>English content body</p>',
                'features' => [
                    ['title' => 'English Feature', 'text' => 'English feature description'],
                ],
                'steps' => [
                    ['title' => 'English Step', 'text' => 'English step description'],
                ],
                'faqs' => [
                    ['question' => 'English question?', 'answer' => 'English answer'],
                ],
                'meta_title' => 'English meta title',
                'meta_description' => 'English meta description',
            ],
        ],
    ]);

    $this->withCookie('locale', 'en')
        ->get(route('services.show', $service))
        ->assertOk()
        ->assertSee('<html lang="en">', false)
        ->assertSee('English Service')
        ->assertSee('English short description')
        ->assertSee('English introduction')
        ->assertSee('English content body', false)
        ->assertSee('English Feature')
        ->assertSee('English feature description')
        ->assertSee('English Step')
        ->assertSee('English step description')
        ->assertSee('English question?')
        ->assertSee('English answer')
        ->assertSee('English Category')
        ->assertSee('English meta title')
        ->assertDontSee('বাংলা সেবা')
        ->assertDontSee('বাংলা সংক্ষিপ্ত বর্ণনা')
        ->assertDontSee('বাংলা ফিচার')
        ->assertDontSee('বাংলা প্রশ্ন?');
});

it('8. falls back to Bengali for an untranslated record in English mode without a 404', function () {
    $service = Service::factory()->create([
        'title' => 'অনূদিত নয় এমন সেবা',
        'slug' => 'untranslated-service',
        'intro' => 'অনূদিত নয় এমন ভূমিকা',
        'content' => '<p>অনূদিত নয় এমন কনটেন্ট</p>',
    ]);

    $this->withCookie('locale', 'en')
        ->get(route('services.show', $service))
        ->assertOk()
        ->assertSee('<html lang="en">', false)
        ->assertSee('অনূদিত নয় এমন সেবা')
        ->assertSee('অনূদিত নয় এমন ভূমিকা');
});

it('9. uses the English title but falls back per field when only the title is translated', function () {
    $service = Service::factory()->create([
        'title' => 'শুধু শিরোনাম বাংলা',
        'slug' => 'title-only-service',
        'intro' => 'শুধু বাংলা ভূমিকা',
        'translations' => [
            'en' => ['title' => 'Only Title English'],
        ],
    ]);

    $this->withCookie('locale', 'en')
        ->get(route('services.show', $service))
        ->assertOk()
        ->assertSee('Only Title English')
        ->assertSee('শুধু বাংলা ভূমিকা')
        ->assertDontSee('শুধু শিরোনাম বাংলা');
});

it('10. renders the original data in Bengali mode', function () {
    $service = Service::factory()->create([
        'title' => 'মূল বাংলা শিরোনাম',
        'slug' => 'bengali-mode-service',
        'intro' => 'মূল বাংলা ভূমিকা',
        'content' => '<p>মূল বাংলা কনটেন্ট</p>',
        'translations' => [
            'en' => [
                'title' => 'Translated English Title',
                'intro' => 'Translated English intro',
                'content' => '<p>Translated English content</p>',
            ],
        ],
    ]);

    $this->withCookie('locale', 'bn')
        ->get(route('services.show', $service))
        ->assertOk()
        ->assertSee('<html lang="bn">', false)
        ->assertSee('মূল বাংলা শিরোনাম')
        ->assertSee('মূল বাংলা ভূমিকা')
        ->assertDontSee('Translated English Title')
        ->assertDontSee('Translated English intro');
});

it('11. returns English AJAX results for category chips and pagination without changing the URL pattern', function () {
    $category = ServiceCategory::factory()->create([
        'name' => 'ওয়েব ডিজাইন',
        'slug' => 'web-design',
        'translations' => ['en' => ['name' => 'Web Design']],
    ]);

    $service = Service::factory()->create([
        'service_category_id' => $category->id,
        'title' => 'বাংলা ওয়েব সেবা',
        'slug' => 'ajax-web-service',
        'intro' => 'বাংলা ভূমিকা',
        'translations' => ['en' => ['title' => 'English Web Service', 'intro' => 'English intro']],
    ]);

    $servicesUrl = route('services.index', ['category' => 'web-design']);

    $this->withCookie('locale', 'en')
        ->withCredentials()
        ->getJson($servicesUrl)
        ->assertOk()
        ->assertHeader('Vary', 'X-Requested-With, Cookie')
        ->assertSee('English Web Service')
        ->assertDontSee('বাংলা ওয়েব সেবা');

    // Portfolio pagination: page 2 keeps the same query pattern and English content.
    $projectCategory = ProjectCategory::factory()->create(['slug' => 'ajax-projects', 'name' => 'প্রজেক্ট']);

    foreach (range(1, 10) as $position) {
        Project::factory()->create([
            'project_category_id' => $projectCategory->id,
            'title' => "বাংলা প্রজেক্ট {$position}",
            'slug' => "ajax-project-{$position}",
            'sort_order' => $position,
            'translations' => [
                'en' => ['title' => "English Project {$position}"],
            ],
        ]);
    }

    $portfolioUrl = route('portfolio.index', ['category' => 'ajax-projects', 'page' => 2]);

    $this->withCookie('locale', 'en')
        ->withCredentials()
        ->getJson($portfolioUrl)
        ->assertOk()
        ->assertHeader('Vary', 'X-Requested-With, Cookie')
        ->assertSee('English Project')
        ->assertDontSee('বাংলা প্রজেক্ট');

    expect($portfolioUrl)->toContain('/portfolio?category=ajax-projects&page=2');
});

it('12. renders English contact labels, validation errors and success message', function () {
    $this->withCookie('locale', 'en')
        ->get(route('contact'))
        ->assertOk()
        ->assertSee('<html lang="en">', false)
        ->assertSee('Your name')
        ->assertSee('Send project details')
        ->assertSee('Email address');

    $this->withCookie('locale', 'en')
        ->post(route('contact.store'), [])
        ->assertSessionHasErrors(['name', 'phone'])
        ->assertSessionHas('errors', function ($errors): bool {
            return str_contains((string) $errors->first('name'), 'name field is required');
        });

    $this->withCookie('locale', 'en')
        ->post(route('contact.store'), [
            'name' => 'Test Visitor',
            'phone' => '01700000000',
            'email' => 'visitor@example.com',
            'message' => 'Hello from the English contact form.',
        ])
        ->assertRedirect(route('contact'))
        ->assertSessionHas('success', __('messages.contact_sent', [], 'en'));

    expect(__('messages.contact_sent', [], 'en'))->toContain('Thank you');
});

it('13. keeps the admin panel English and shows original columns regardless of visitor language', function () {
    $admin = $this->actingAsAdmin();

    $service = Service::factory()->create([
        'title' => 'অ্যাডমিন বাংলা শিরোনাম',
        'slug' => 'admin-bengali-service',
        'translations' => ['en' => ['title' => 'Admin English Title']],
    ]);

    $this->withCookie('locale', 'bn')
        ->withHeader('CF-IPCountry', 'BD')
        ->get(route('admin.services.index'))
        ->assertOk()
        ->assertSee('Services')
        ->assertSee('অ্যাডমিন বাংলা শিরোনাম')
        ->assertDontSee('Admin English Title');

    $this->withCookie('locale', 'bn')
        ->withHeader('CF-IPCountry', 'BD')
        ->get(route('admin.settings.language'))
        ->assertOk()
        ->assertSee('Language Settings')
        ->assertSee('Country-Based Auto Language')
        ->assertSee('Default / Fallback Language')
        ->assertSee('English translation progress');

    expect($admin->is_admin)->toBeTrue();
});

it('14. redirects to the home page when the switch has no referer', function () {
    $this->get(route('language.switch', 'en'))
        ->assertRedirect(route('home'))
        ->assertCookie('locale', 'en');
});

it('15. exposes the correct html lang, Vary headers and a usable switcher on mobile too', function () {
    geoOn();

    $response = $this->withHeader('CF-IPCountry', 'BD')
        ->get(route('home'))
        ->assertOk()
        ->assertSee('<html lang="bn">', false);

    $vary = $response->headers->get('Vary');
    expect($vary)->toContain('Cookie')->toContain('CF-IPCOUNTRY');

    // Desktop header + mobile menu each render the switcher.
    $response->assertSee('aria-label="Language"', false);
    $response->assertSee(route('language.switch', 'bn'), false);
    $response->assertSee(route('language.switch', 'en'), false);
    expect(substr_count($response->getContent(), 'role="group" aria-label="Language"'))->toBeGreaterThanOrEqual(2);

    // When geo-routing is off only the cookie variation is advertised.
    geoOff();

    $vary = $this->get(route('home'))->assertOk()->headers->get('Vary');
    expect($vary)->toContain('Cookie')->not->toContain('CF-IPCOUNTRY');
});
