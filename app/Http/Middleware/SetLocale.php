<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use App\Services\GeoCountryResolver;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Resolve the public request locale:
     * 1) visitor locale cookie, 2) geo-location rule (when enabled),
     * 3) admin default locale, 4) config fallback.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supported = array_keys(config('locales.supported'));
        $cookieLocale = $request->cookie('locale');

        if (is_string($cookieLocale) && in_array($cookieLocale, $supported, true)) {
            $locale = $cookieLocale; // 1. Visitor's explicit switcher choice
        } else {
            $geoLocale = null;

            if (Setting::geoEnabled()) {
                $resolver = app(GeoCountryResolver::class);
                $country = $resolver->resolveCountryCode($request);
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

        // Caches must keep one copy per language cookie.
        $vary = array_merge($response->headers->all('Vary'), ['Cookie']);

        if (Setting::geoEnabled()) {
            foreach (config('locales.geo.country_headers', []) as $serverKey) {
                if (str_starts_with($serverKey, 'HTTP_')) {
                    // HTTP_CF_IPCOUNTRY -> CF-IPCOUNTRY
                    $vary[] = str_replace('_', '-', substr($serverKey, 5));
                }
            }
        }

        // One combined header line (rather than several) so every proxy reads all values.
        $response->headers->set('Vary', implode(', ', array_unique(array_filter($vary))));

        return $response;
    }
}
