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
        $response->setVary('Cookie', false); // caches must keep one copy per language cookie

        return $response;
    }
}
