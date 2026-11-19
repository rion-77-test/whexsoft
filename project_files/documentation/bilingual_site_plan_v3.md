# Bilingual Site Plan v3: Bengali + English

**Same URLs for both languages, automatic country-based initial language (Bangladesh → Bengali, Other Countries → English), visitor cookie override, and full admin control**

- **Audience:** Any developer or AI model implementing the feature.
- **Execution Order:** Every step is numbered and should be executed in order.
- **Version Note:** Updates Plan v2 with country-based initial language routing and admin toggle controls while preserving identical URLs, visitor switcher cookie priority, and fixed Bengali content columns.

---

## 1. What Changed from Plan v2

| Topic | Plan v2 | Modified Plan v3 (Geo + Admin Control) |
| :--- | :--- | :--- |
| **URLs** | Identical URLs. No prefix, no route changes. | Unchanged: Identical URLs for both languages. No prefix, no redirects. |
| **First-visit language** | Admin default setting (`bn` or `en`), else `bn`. | **When Admin Geo-Routing is ON:** Visitor from Bangladesh (`BD`) gets Bengali (`bn`); visitor from any other country gets English (`en`). |
| **Manual switcher** | Visitor cookie `locale` overrides admin default. | Unchanged: Visitor cookie `locale` still has highest priority and overrides geo-detection anytime. |
| **Admin controls** | Default language selector (`bn` / `en`) only. | **Geo-Location Language Routing** toggle (ON/OFF) *plus* **Fallback / Default Language** selector (used when geo-routing is OFF or country cannot be resolved). |
| **Country detection** | Browser/IP detection disallowed. | Server-side trusted proxy/CDN country header check (`CF-IPCountry`, `GEOIP_COUNTRY_CODE`, etc.) in middleware—no URL redirects. |
| **SEO & crawlers** | Crawlers receive admin default language. | Same URLs, no `hreflang` or URL redirects. Bots without country/cookie get the admin fallback/default language; bots from non-BD IPs get English when geo-routing is ON. |

> **SEO & Caching Note:** Because the same URL serves Bengali to visitors in Bangladesh and English to visitors outside Bangladesh (or based on the `locale` cookie), the application sends `Vary: Cookie` and edge caches/CDNs must segment cache keys by country header and `locale` cookie. Finish English translations before enabling geo-routing or setting English as fallback so foreign visitors and crawlers do not see untranslated Bengali fallback text.

---

## 2. Final Architectural Decisions

| Topic | Decision |
| :--- | :--- |
| **Supported languages** | Bengali (`bn`) and English (`en`). Defined in `config/locales.php` so additional languages can be added later. |
| **URLs** | Identical URLs for all languages. No `/en` prefix and no automatic URL redirects. |
| **Language priority order** | 1) Explicit visitor cookie `locale` > 2) Geo-location rule when enabled in Admin (`BD` → `bn`, other countries → `en`) > 3) Admin fallback/default setting > 4) Config fallback (`bn`). |
| **Admin settings** | Stored in `settings` table and edited at **Admin > Site Settings > Language**: `geo_language_enabled` (starts `0` / disabled until translations are ready) and `default_locale` (starts `bn`). |
| **Content language** | Original database columns are always Bengali (`bn`). English translations live in `translations.en`. This never changes regardless of geo or default settings. |
| **Bengali mode** | Everything renders directly from the original database columns and `lang/bn/*.php`. |
| **English mode** | Static strings load from `lang/en/*.php`; database fields load from `translations.en` with automatic per-field fallback to Bengali if empty. |
| **Database storage** | Nullable JSON column `translations` on each translatable table. Shape: `{"en": {"title": "...", ...}}`. No third-party package. |
| **Slugs** | English ASCII letters, one slug per record, shared across both languages. |
| **Admin panel** | Always English UI, always edits original (Bengali) columns plus the English section, completely unaffected by visitor cookies or visitor country. |

---

## 3. How Language Resolution Works

One value governs the entire public request: `app()->getLocale()`. The `SetLocale` middleware resolves it once per request on public routes, and two independent layers consume it: Laravel translation files (`__('...')`) for static UI text and the `$record->tr('field')` helper for database records.

1. **Incoming Public Request:** Visitor opens any URL (e.g., `/services/web-design`). `SetLocale` middleware runs on public routes only.
2. **Priority 1 (Visitor Cookie):** Check `$request->cookie('locale')`. If valid (`bn` or `en`), use it immediately.
3. **Priority 2 (Admin Geo-Routing):** If no cookie and `Setting::geoEnabled()` is `true`, inspect trusted country headers via `GeoCountryResolver`. If country is `BD` → `bn`; if another valid 2-letter ISO country → `en`.
4. **Priority 3 & 4 (Fallback):** If geo-routing is OFF or country is unknown (e.g., localhost/unmapped IP), use `Setting::defaultLocale()`, else `config('locales.default')` (`bn`).
5. **Render Output:** `app()->setLocale($locale)` & `Carbon::setLocale($locale)` drive `lang/{locale}/*.php`, `$model->tr()`, and `<html lang="...">`. Response sends `Vary: Cookie`.

### 3.1 Database Field Resolution (`tr()`)

When `$record->tr('title')` is called:
- If current locale is `bn` (the fixed content language), it returns `$record->title` directly.
- If current locale is `en`, it checks `translations.en.title`; if filled, it returns the English text, otherwise it falls back to `$record->title` (Bengali) so no record ever breaks or returns a 404.

### 3.2 Language Switcher Behavior

Clicking **EN** or **BN** navigates to `GET /language/{locale}`, which validates the locale, sets an encrypted 1-year `locale` cookie, and redirects back to the previous same-host URL (preserving query strings, pagination, and AJAX filter parameters). Once set, the cookie overrides geo-location for all future visits by that user.

### 3.3 Behavior Matrix

| Visitor / Admin Scenario | Resulting Language & Behavior |
| :--- | :--- |
| First visit from **Bangladesh (BD)**, no cookie, geo-routing ON | **Bengali (`bn`)** automatically on the same URL. |
| First visit from **outside Bangladesh (e.g., US, UK, IN)**, no cookie, geo-routing ON | **English (`en`)** automatically on the same URL. |
| Visitor in Bangladesh clicks **EN** (sets `locale=en` cookie) | **English (`en`)** on every page and across browser restarts until switched back. |
| Visitor outside Bangladesh clicks **BN** (sets `locale=bn` cookie) | **Bengali (`bn`)** on every page and across browser restarts until switched back. |
| Admin turns **Geo-Routing OFF** and sets Default = `bn` (or `en`) | All new visitors without a cookie receive the Admin Default language regardless of country; existing cookied visitors keep their choice. |
| Local development (`127.0.0.1`) or request with no country header & no cookie | Gracefully falls back to **Admin Default Language** (no errors). |
| Record lacks English text while visitor is in English mode | Shows Bengali text for missing fields inside the English layout (no 404, no hidden items). |
| Admin panel (`/admin/*`) | Always English UI and original Bengali columns; ignores visitor cookie and visitor country. |

---

## 4. Implementation Guide

- **Prerequisites:** Laravel 11 or newer, Blade views, public routes in `routes/web.php`, admin routes under `/admin`, AJAX filters on services and portfolio.
- **Before Phase 3:** Confirm the blog table name and columns. Never rename or convert existing Bengali columns.
- **After Config/Route Changes:** Run `php artisan optimize:clear`.

### Phase 1 — Foundation: Settings, Geo Resolver, Middleware & Switcher

#### Step 1: Add Locale and Geo Configuration

Create `config/locales.php` and set `locale = bn` and `fallback_locale = bn` in `config/app.php` (or `.env`).

```php
<?php // config/locales.php
return [
    'default' => 'bn', // last-resort fallback if the admin setting is missing
    'content' => 'bn', // language of the ORIGINAL database columns (never changes)
    'supported' => [
        'bn' => ['label' => 'Bangla',  'short' => 'BN', 'html' => 'bn'],
        'en' => ['label' => 'English', 'short' => 'EN', 'html' => 'en'],
    ],
    'geo' => [
        'enabled_default'         => false, // starts OFF so deployment is safe before translations are ready
        'bangladesh_country_code' => 'BD',
        'bangladesh_locale'       => 'bn',
        'foreign_locale'          => 'en',
        // Trusted server/proxy headers checked in order
        'country_headers' => [
            'HTTP_CF_IPCOUNTRY',   // Cloudflare
            'HTTP_X_COUNTRY_CODE', // Reverse proxy / load balancer
            'GEOIP_COUNTRY_CODE',  // Nginx / Apache GeoIP module
        ],
    ],
];
```

#### Step 2: Create the `settings` Table and `Setting` Model

**Goal:** Stores the admin-controlled geo-routing toggle and default fallback language. First run `php artisan make:model Setting -m`, edit the generated migration and model files below, and then run `php artisan migrate`. The value is cached forever and cleared on save, so the middleware adds no database query per request.

1. **Migration file** (`database/migrations/xxxx_create_settings_table.php`):

```php
Schema::create('settings', function (Blueprint $t) {
    $t->id();
    $t->string('key')->unique();
    $t->text('value')->nullable();
    $t->timestamps();
});

DB::table('settings')->insert([
    ['key' => 'default_locale',       'value' => 'bn', 'created_at' => now(), 'updated_at' => now()],
    ['key' => 'geo_language_enabled', 'value' => config('locales.geo.enabled_default', false) ? '1' : '0', 'created_at' => now(), 'updated_at' => now()],
]);
```

2. **Model file** (`app/Models/Setting.php`):

```php
class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("setting.$key", fn () => static::where('key', $key)->value('value')) ?? $default;
    }

    public static function put(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting.$key");
    }

    public static function defaultLocale(): string
    {
        $locale = static::get('default_locale');
        return array_key_exists((string) $locale, config('locales.supported')) ? $locale : config('locales.default');
    }

    public static function geoEnabled(): bool
    {
        $raw = static::get('geo_language_enabled', config('locales.geo.enabled_default', false) ? '1' : '0');
        return filter_var($raw, FILTER_VALIDATE_BOOLEAN);
    }
}
```

3. **Run migration:** After saving both files above, execute `php artisan migrate`.

#### Step 2B: Create the `GeoCountryResolver` Service

**Goal:** Detect the visitor's 2-letter ISO country code from trusted reverse-proxy/CDN headers and map `BD` to Bengali (`bn`) and any other country to English (`en`).

```php
<?php // app/Services/GeoCountryResolver.php
namespace App\Services;

use Illuminate\Http\Request;

class GeoCountryResolver
{
    public function resolveCountryCode(Request $request): ?string
    {
        foreach (config('locales.geo.country_headers', []) as $serverKey) {
            $code = strtoupper(trim((string) $request->server($serverKey, '')));
            if (preg_match('/^[A-Z]{2}$/', $code) && ! in_array($code, ['XX', 'T1'], true)) {
                return $code;
            }
        }

        // Local development helper (only active when APP_ENV=local)
        if (app()->isLocal() && $request->filled('__country')) {
            $override = strtoupper(trim((string) $request->query('__country')));
            if (preg_match('/^[A-Z]{2}$/', $override)) {
                return $override;
            }
        }

        return null;
    }

    public function localeForCountry(?string $countryCode): ?string
    {
        if (! $countryCode) {
            return null;
        }

        $bdCode = strtoupper((string) config('locales.geo.bangladesh_country_code', 'BD'));

        return $countryCode === $bdCode
            ? config('locales.geo.bangladesh_locale', 'bn')
            : config('locales.geo.foreign_locale', 'en');
    }
}
```

#### Step 3: Create the `SetLocale` and `AdminLocale` Middleware

**Goal:** Resolve the language for each public request using priority order: 1) visitor `locale` cookie, 2) geo-location rule if enabled in Admin (`BD` → `bn`, others → `en`), 3) Admin default locale. Run `php artisan make:middleware SetLocale`.

```php
// app/Http/Middleware/SetLocale.php
class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $supported    = array_keys(config('locales.supported'));
        $cookieLocale = $request->cookie('locale');

        if (is_string($cookieLocale) && in_array($cookieLocale, $supported, true)) {
            $locale = $cookieLocale; // 1. Visitor's explicit switcher choice
        } else {
            $geoLocale = null;
            if (Setting::geoEnabled()) {
                $resolver  = app(GeoCountryResolver::class);
                $country   = $resolver->resolveCountryCode($request);
                $geoLocale = $resolver->localeForCountry($country);
            }

            // 2. Geo-location locale if resolved, else 3. Admin default locale
            $locale = (is_string($geoLocale) && in_array($geoLocale, $supported, true))
                ? $geoLocale
                : Setting::defaultLocale();
        }

        app()->setLocale($locale);
        Carbon::setLocale($locale);

        $response = $next($request);
        $response->setVary('Cookie', false); // caches must keep one copy per language cookie
        return $response;
    }
}
```

Apply `SetLocale` ONLY to public routes by wrapping them in a middleware group. No prefix and no route parameters are added:

```php
Route::get('/language/{locale}', LanguageController::class)
    ->whereIn('locale', ['bn', 'en'])->name('language.switch');

Route::middleware(\App\Http\Middleware\SetLocale::class)->group(function () {
    // all existing public routes (home, services, portfolio, blog, contact...) unchanged
});
```

Admin routes must NOT use `SetLocale`. Give the admin group a tiny middleware that forces English so admin validation messages are never affected by a visitor cookie or country:

```php
// app/Http/Middleware/AdminLocale.php
public function handle(Request $request, Closure $next)
{
    app()->setLocale('en'); // admin UI and validation messages are always English
    return $next($request);
}
// apply to existing admin group: ->middleware(['auth', AdminLocale::class])
```

#### Step 4: Create the Language Switch Route and Controller

**Goal:** Save the visitor's explicit language preference in an encrypted 1-year cookie and return them to the exact same URL.

```php
// app/Http/Controllers/LanguageController.php
class LanguageController extends Controller
{
    public function __invoke(Request $request, string $locale): RedirectResponse
    {
        abort_unless(array_key_exists($locale, config('locales.supported')), 404);

        Cookie::queue(Cookie::make('locale', $locale, 60 * 24 * 365, '/', null,
            $request->isSecure(), true, false, 'Lax'));

        // Return to the page the visitor was on (same host only, never back to /language)
        $previous = url()->previous();
        $safe = parse_url($previous, PHP_URL_HOST) === $request->getHost()
            && ! str_contains($previous, '/language/');

        return redirect()->to($safe ? $previous : route('home'));
    }
}
```

- The `Referer` header preserves query strings and AJAX filter state. Do not set a site-wide `no-referrer` policy.
- Add `Disallow: /language/` to `robots.txt` so bots do not crawl switch links.

#### Step 5: Build the Language Switcher Component

Create `resources/views/components/frontend/language-switcher.blade.php` and include `<x-frontend.language-switcher />` in both the desktop header and mobile menu (plain links, no JavaScript):

```blade
<div class="d-inline-flex align-items-center gap-1 rounded-pill border border-white border-opacity-25 p-1"
     role="group" aria-label="Language">
    @foreach (config('locales.supported') as $code => $meta)
        <a href="{{ route('language.switch', $code) }}" rel="nofollow" lang="{{ $meta['html'] }}"
           @class(['px-3 py-1 rounded-pill site-type-text-xs fw-semibold text-decoration-none',
                   'site-accent-component' => app()->getLocale() === $code,
                   'text-white' => app()->getLocale() !== $code])
           @if (app()->getLocale() === $code) aria-current="true" @endif>{{ $meta['short'] }}</a>
    @endforeach
</div>
```

#### Step 6: Update the Layout Head

```blade
<html lang="{{ config('locales.supported.' . app()->getLocale() . '.html') }}">
```

Keep the existing canonical URL; no `hreflang` tags are needed. **Phase 1 Acceptance Test:** Verify that private windows from Bangladesh (or `?__country=BD` locally) receive Bengali, non-Bangladesh requests (or `?__country=US`) receive English when geo-routing is enabled, clicking BN/EN overrides geo-detection via cookie, and the admin panel stays English.

---

### Phase 2 — Static Text into Language Files

#### Step 7: Publish the `lang` Folder and Set File Structure

Run `php artisan lang:publish` and create `lang/bn` and `lang/en` if missing:

| File | Contents |
| :--- | :--- |
| `site.php` | Shared words: buttons (start project, view details, read more), labels, breadcrumbs |
| `nav.php`, `footer.php` | Header, mobile menu, footer headings, address block, copyright, legal links |
| `home.php` | Hero, stats, why-us cards, partners, testimonials, blog teaser headings |
| `services.php`, `portfolio.php`, `blog.php` | Page headings, filter labels, empty states, side-box titles |
| `about.php`, `process.php`, `faq.php`, `contact.php` | Page text and form labels |
| `validation.php`, `messages.php` | Validation and flash messages (`bn` needs its own validation file) |

Use `lower_snake_case` keys grouped by section (e.g., `home.hero.cta_primary`). Copy Bengali values character-for-character from existing Blade files so Bengali mode looks identical to today.

#### Step 8: Convert Header and Footer First

- Replace each hard-coded Bengali string with `{{ __('nav.home') }}`.
- Convert footer quick-link component usage, services column, address block, and copyright line.
- Strings with markup (such as `nubmer-1-fixer`) are output with `{!! __("key") !!}` and exist only in `lang/bn`; English uses plain digits.
- Convert `@section` title and description values on every page.

#### Step 9: Convert Pages One at a Time

**Order:** home, services index, services show, portfolio index, portfolio show, blog index, blog show, about, process, faq, contact, privacy, terms. For each Blade file:

- Move every Bengali literal into the lang files (Bengali exact, English translated).
- Convert inline Blade arrays (why-us cards, process steps, stat labels) into lang arrays: `@foreach (__('home.why_us') as $card)`.
- Use `:name` placeholders, e.g. `__("services.cta_title", ["service" => $service->tr("title")])`, and translate image `alt` text and `aria-label` attributes.
- Do not translate brand name, phone format, URLs, icon names, or CSS classes.

#### Step 10: Validation and Flash Messages

- Create `lang/bn/validation.php` (translated messages and attribute names) and keep `lang/en/validation.php`.
- Contact form labels and validation errors use `validation.attributes` in both languages.
- Replace hard-coded controller flash messages with `__("messages.contact_sent")`.

---

### Phase 3 — Database Content Translations

#### Step 11: Add the `translations` Column

**Goal:** Add a nullable JSON column; existing Bengali rows remain untouched. Run `php artisan make:migration add_translations_to_content_tables` and `php artisan migrate`.

```php
public function up(): void
{
    foreach (['services', 'service_categories', 'projects', 'project_categories',
              'testimonials', 'packages', 'posts' /* blog table: confirm */] as $table) {
        Schema::table($table, fn (Blueprint $t) => $t->json('translations')->nullable());
    }
}
// down(): dropColumn('translations') on the same tables
```

**Stored JSON shape (English only; Bengali stays in the original columns):**

```json
{
  "en": {
    "title": "Web Design",
    "short_description": "...",
    "intro": "...",
    "content": "<p>sanitized HTML</p>",
    "features": [{"title": "...", "text": "..."}],
    "steps": [{"title": "...", "text": "..."}],
    "faqs": [{"question": "...", "answer": "..."}],
    "meta_title": "...",
    "meta_description": "..."
  }
}
```

#### Step 12: Create the Translation Trait

**Goal:** The content language is fixed to Bengali, so geo-routing or default-language settings never affect column storage.

```php
namespace App\Models\Concerns;

trait HasLocaleTranslations
{
    // each model declares: protected array $translatable = ['title', 'summary', ...]; (first = main field)

    public function initializeHasLocaleTranslations(): void
    {
        $this->mergeCasts(['translations' => 'array']);
        $this->fillable[] = 'translations';
    }

    public function tr(string $field): mixed
    {
        $original = $this->getAttribute($field);
        $locale   = app()->getLocale();

        if ($locale === config('locales.content')) { // bn: always the original column
            return $original;
        }

        $value = data_get($this->translations, "$locale.$field");
        return filled($value) ? $value : $original; // per-field fallback to Bengali
    }

    public function hasTranslation(string $locale = 'en'): bool
    {
        return filled(data_get($this->translations, $locale . '.' . ($this->translatable[0] ?? 'title')));
    }
}
```

#### Step 13: Attach the Trait to Every Translatable Model

| Model | `$translatable` (first item = main field) |
| :--- | :--- |
| `Service` | `title`, `short_description`, `intro`, `content`, `features`, `steps`, `faqs`, `meta_title`, `meta_description` |
| `ServiceCategory` / `ProjectCategory` | `name` |
| `Project` | `title`, `summary`, `description` |
| `Testimonial` | `quote`, `business_name` (`client_name` stays original unless translated names are wanted) |
| `Package` | `name`, `tagline`, `price_label`, `features` (translate only each item `text`; keep `included`) |
| `Post` (blog) | `title`, `excerpt`, `content`, `meta_title`, `meta_description` (confirm real column names) |

```php
class Service extends Model implements HasMedia
{
    use HasLocaleTranslations;

    protected array $translatable = ['title', 'short_description', 'intro', 'content',
        'features', 'steps', 'faqs', 'meta_title', 'meta_description'];
}
```

#### Step 14: Use `tr()` in Every Public Blade View

```blade
{{-- before --}}
{{ $service->title }}  {{ $project->summary }}  @foreach ($service->faqs ?? [] as $faq)

{{-- after --}}
{{ $service->tr('title') }}  {{ $project->tr('summary') }}  @foreach ($service->tr('faqs') ?? [] as $faq)
```

- Apply in: cards, show pages, related sections, footer service list, home sections, meta tags, image alt text, packages, and package features.
- The services show page PHP block that builds `$features`, `$steps`, and `$faqs` must start from `tr("features")`, `tr("steps")`, and `tr("faqs")`.
- Do NOT use `tr()` in admin views, slugs, route parameters, or query conditions.
- Find leftovers: `grep -rn -- "->title\|->summary\|->name\|->quote" resources/views/frontend resources/views/components/frontend`

#### Step 15: Controllers, Composers and Caching

- Sort and category filters use original columns (`sort_order`, `created_at`, `slug`, category slug). In English mode, blog search also matches `translations.en.title`, `translations.en.excerpt`, and `translations.en.content`; Bengali-mode search remains on original columns.
- The AJAX JSON endpoints (services and portfolio filters) render the same partials; the cookie and country headers travel with the request, so they return the right language automatically with no JavaScript changes.
- Any cached fragment or data must include the locale in its key: `cache()->remember("nav.services." . app()->getLocale(), ...)`.
- Keep the existing `Vary: X-Requested-With` header on JSON responses (the middleware adds `Vary: Cookie`).

---

### Phase 4 — Admin Panel

#### Step 16: Add an English Section to Every Content Form

**Goal:** Input names use `translations[en][field]`.

```blade
<div class="col-12"><hr><h2 class="h5">English translation
    <small class="text-secondary">(leave a field empty to show the Bengali text)</small></h2></div>
<x-admin.form-fields.input name="translations[en][title]" label="Title (EN)"
    :value="old('translations.en.title', $service->translations['en']['title'] ?? '')" class="col-md-6" />
<x-admin.form-fields.textarea name="translations[en][intro]" label="Intro (EN)"
    :value="old('translations.en.intro', $service->translations['en']['intro'] ?? '')" class="col-12" rows="3" />
<x-admin.form-fields.wysiwyg name="translations[en][content]" label="Content (EN)"
    :value="old('translations.en.content', $service->translations['en']['content'] ?? '')"
    :upload-url="route('admin.services.content-images.store')" class="col-12" />
<x-admin.form-fields.repeater name="translations[en][features]" label="Features (EN)"
    :fields="$featureFields" :value="$service->translations['en']['features'] ?? []" class="col-12" />
{{-- repeat for steps, faqs, meta_title, meta_description. On create pages use old() only. --}}
```

**Component check:** Form-field components must accept bracket names and convert them to dot notation for `old()` and `@error`: `$dot = str_replace(['[', ']'], ['.', ''], $name);`. The English repeater must post `translations[en][features][0][title]` just like the Bengali repeater posts `features[0][title]`.

#### Step 17: Validate and Save Translations in Each Admin Controller

```php
// Validation rules example (ServiceRequest / controller)
'translations'                      => ['nullable', 'array'],
'translations.en.title'             => ['nullable', 'string', 'max:255'],
'translations.en.short_description' => ['nullable', 'string'],
'translations.en.intro'             => ['nullable', 'string'],
'translations.en.content'           => ['nullable', 'string'],
'translations.en.features.*.title'  => ['nullable', 'string', 'max:255'],
'translations.en.features.*.text'   => ['nullable', 'string'],
'translations.en.faqs.*.question'   => ['nullable', 'string', 'max:255'],
'translations.en.faqs.*.answer'     => ['nullable', 'string'],
'translations.en.meta_title'        => ['nullable', 'string', 'max:70'],
'translations.en.meta_description'  => ['nullable', 'string', 'max:180'],

// app/Support/TranslationPayload.php
class TranslationPayload
{
    public static function clean(array $data): ?array
    {
        $clean = self::prune($data);
        return $clean === [] ? null : $clean;
    }

    private static function prune(array $data): array
    {
        $out = [];
        foreach ($data as $k => $v) {
            $v = is_array($v) ? self::prune($v) : (is_string($v) ? trim($v) : $v);
            if ($v === '' || $v === [] || $v === null) continue;
            $out[$k] = $v;
        }
        return is_int(array_key_first($out) ?? 0) ? array_values($out) : $out;
    }
}
// store()/update(): $validated['translations'] = TranslationPayload::clean($validated['translations'] ?? []);
```

- **Services:** Run `translations.en.content` through the same `RichTextSanitizer` as the Bengali content. Extend `RichTextSanitizer::deleteUnusedContentImages()` to also scan `translations.en.content` so English-only images are not deleted.
- Repeat for `ServiceCategory`, `Project`, `ProjectCategory`, `Testimonial`, `Package`, and `Post` controllers with their own field lists.

#### Step 18: Show Translation Status in Admin Lists

```blade
<span class="badge {{ $service->hasTranslation() ? 'text-bg-success' : 'text-bg-warning' }}">
    EN: {{ $service->hasTranslation() ? 'ready' : 'missing' }}
</span>
```

#### Step 19: Admin Page: `Site Settings > Language` (Geo + Default Controls)

**Goal:** The admin can enable/disable automatic country-based language routing (`BD` → Bengali, others → English) and control the fallback/default language of the site.

```php
// routes (admin group)
Route::get('settings/language', [SettingController::class, 'edit'])->name('admin.settings.language');
Route::put('settings/language', [SettingController::class, 'update'])->name('admin.settings.language.update');

class SettingController extends Controller
{
    public function edit(): View
    {
        $models = [
            Service::class     => ['Services', 'title'],
            Project::class     => ['Projects', 'title'],
            Testimonial::class => ['Testimonials', 'quote'],
            Post::class        => ['Blog posts', 'title'],
        ];
        $stats = collect($models)->map(fn ($m, $class) => [
            'label'      => $m[0],
            'total'      => $class::count(),
            'translated' => $class::whereNotNull("translations->en->{$m[1]}")->count(),
        ])->values();

        return view('admin.settings.language', [
            'geoEnabled' => Setting::geoEnabled(),
            'current'    => Setting::defaultLocale(),
            'stats'      => $stats,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'geo_language_enabled' => ['required', 'boolean'],
            'default_locale'       => ['required', Rule::in(array_keys(config('locales.supported')))],
        ]);

        Setting::put('geo_language_enabled', $data['geo_language_enabled'] ? '1' : '0');
        Setting::put('default_locale', $data['default_locale']);

        return back()->with('success', 'Language settings updated.');
    }
}
```

- **View:** A card with: (1) a toggle/select for **Country-Based Auto Language** (`Enabled`: Bangladesh sees Bangla, other countries see English; `Disabled`: uses Default Language below), (2) a select for **Default / Fallback Language** (Bangla / English), (3) a Save button, and (4) a table of translation progress per content type (`translated / total`).
- Show a warning whenever **Country-Based Auto Language is Enabled** OR **Default Language is English** and any type is below 100%: *"Untranslated records will show Bengali text to English visitors and search engines."*
- Add a **Settings > Language** link to the admin sidebar. Visitors who already chose a language via the switcher keep their cookie preference regardless of admin changes.

---

### Phase 5 — SEO and Caching

#### Step 20: SEO Rules for Same-URL Geo-Routed Languages

- No `hreflang`, no `/en` URLs, no language sitemap alternates, and no URL redirects. Sitemap stays a single list of URLs.
- Crawlers without a country header or cookie receive the Admin Default Language; crawlers from non-BD IPs receive English when Geo-Routing is enabled. Translate core content before enabling Geo-Routing or switching the default to English.

#### Step 21: Meta Tags per Language

```blade
@section('title', ($service->tr('meta_title') ?: $service->tr('title')) . ' - WhexSoft')
@section('description', $service->tr('meta_description') ?: \Illuminate\Support\Str::limit(
    strip_tags($service->tr('short_description') ?: $service->tr('intro') ?: ''), 180))
```

Static pages take title and description from lang files. `og:image` is the same for both languages.

#### Step 22: Full-Page Cache, Trusted Proxies & CDN Rules

- **Trusted Proxies:** Configure Laravel's `TrustProxies` middleware so Cloudflare (`CF-IPCountry`) or Nginx GeoIP (`GEOIP_COUNTRY_CODE`) headers are accepted only from your reverse proxy and cannot be spoofed by untrusted clients.
- **Cache Variation:** The same URL returns different HTML depending on the `locale` cookie and visitor country. Configure Cloudflare, Nginx `fastcgi_cache`, or any response cache to vary on both the `locale` cookie and country code (or bypass cache when `locale` cookie is present) so Bangladesh and international visitors never receive each other's cached HTML.

---

### Phase 6 — Polish and Testing

#### Step 23: Digits and Dates

- Static Bengali digits (phone, address, stats) live inside `lang/bn` strings; `lang/en` uses Latin digits.
- Dynamic dates use Carbon's locale set by the middleware: `$post->published_at->translatedFormat("d F Y")`.
- Keep the `nubmer-1-fixer` span only in Bengali strings.

#### Step 24: Typography and Layout for English

- Body font is `Inter` with `Hind Siliguri` as the Bengali fallback, so English renders cleanly with the current CSS.
- Check nav width, buttons, hero heading wrapping, filter chips, footer columns, and testimonial cards at `360px`, `768px`, and `1280px`.
- Images containing Bengali text cannot be translated automatically; swap them per locale only if needed.

#### Step 25: Caching Commands

```bash
php artisan optimize:clear
php artisan route:cache && php artisan config:cache && php artisan view:cache
```

#### Step 26: Test Checklist

| # | Test | Expected |
| :- | :--- | :--- |
| 1 | Private window from **Bangladesh (`BD`)**, no cookie, Geo-Routing ON | Bengali (`bn`) |
| 2 | Private window from **non-`BD` country (e.g., `US`)**, no cookie, Geo-Routing ON | English (`en`) |
| 3 | Visitor in `BD` clicks **EN** on `/services?category=x&page=2` | Same URL, English; `locale=en` cookie set |
| 4 | Visitor in `US` clicks **BN**, then closes and reopens browser | Still Bengali; `locale=bn` cookie overrides geo-detection |
| 5 | Admin disables Geo-Routing and sets Default = `bn` (or `en`); open private window | New visitors from any country get Admin Default; cookied visitors keep their choice |
| 6 | Localhost / missing country header with no cookie | Gracefully falls back to Admin Default language without error |
| 7 | Translated record in English | All fields English including FAQs, features, and steps |
| 8 | Untranslated record in English | Bengali text, page works (no 404) |
| 9 | Title-only translation | English title, other fields fall back to Bengali |
| 10 | Bengali mode, any record | Exactly the original data |
| 11 | AJAX category chip and pagination in English | English results, URL unchanged in pattern |
| 12 | Contact form in English | English labels, errors, and success message |
| 13 | Admin panel with an English or Bengali visitor cookie / foreign IP | English UI, original columns, unchanged |
| 14 | Switch with no `Referer` header | Redirects to home, no error |
| 15 | View source & mobile menu at `360px` | `<html lang>` matches language; `Vary: Cookie` in headers; switcher usable |

#### Step 27: Rollout and Definition of Done

- Deploy Phase 1 first with **Geo-Routing OFF** and **Default Language = Bengali**. Hide the switcher until home, services, portfolio, and contact are converted.
- Translate content gradually; untranslated records automatically fall back to Bengali.
- Enable **Geo-Routing** in **Admin > Site Settings > Language** once all important content has English text.
- **Done when:** all 15 checklist items pass, no hard-coded Bengali remains in public Blade files (search the range `[\u0980-\u09FF]` in `resources/views/frontend`), and each translatable model has the migration, trait, admin English section, and `tr()` usage.

---

## 5. File Change Map

| Area | Files |
| :--- | :--- |
| **New** | `config/locales.php`, `Setting` model + migration, `GeoCountryResolver` service, `SetLocale` and `AdminLocale` middleware, `LanguageController`, `language-switcher` component, `HasLocaleTranslations` trait, `TranslationPayload`, `SettingController` + admin view, `lang/bn/*.php`, `lang/en/*.php`, `add_translations` migration |
| **Edited** | `routes/web.php` (one switch route plus middleware group), admin route group (`AdminLocale`), `layouts/frontend.blade.php` (`html lang`), header, footer, every public Blade view and component, translatable models, admin controllers/forms/lists, `RichTextSanitizer`, `robots.txt` |
| **Unchanged** | All URLs and route names, slugs, Bengali data and columns, media collections, CSS and JS |

---

## 6. Risks and Mitigations

| Risk | Handling |
| :--- | :--- |
| Foreign visitors or crawlers see incomplete English while translations are in progress | Keep Geo-Routing OFF and Default = Bengali until core pages/records are translated; per-field fallback prevents broken pages (Step 19, Step 27). |
| Cached pages served in the wrong language across countries or cookies | Send `Vary: Cookie` and configure CDN/page cache rules to key on both `locale` cookie and country header (Step 22). |
| Spoofed country headers from untrusted clients | Configure Laravel `TrustProxies` so country headers are trusted only from Cloudflare / reverse proxy (Step 22). |
| Switch link without `Referer` header | Safely falls back to the home page (Step 4). |
| English-only images deleted by sanitizer | Extend `RichTextSanitizer::deleteUnusedContentImages()` to scan `translations.en.content` (Step 17). |
| Hard-coded Bengali left in public views | Search for the Bengali Unicode range `[\u0980-\u09FF]` before release (Step 27). |
| Admin validation messages in the wrong language | `AdminLocale` middleware forces English on all `/admin` routes (Step 3). |