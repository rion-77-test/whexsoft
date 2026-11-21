<?php

namespace App\Services;

use Illuminate\Http\Request;

class GeoCountryResolver
{
    public function resolveCountryCode(Request $request): ?string
    {
        // Headers are only read when the request really came through the proxy/CDN
        $trusted = ! config('locales.geo.require_trusted_proxy') || $request->isFromTrustedProxy();

        if ($trusted) {
            foreach (config('locales.geo.country_headers', []) as $serverKey) {
                $code = strtoupper(trim((string) $request->server($serverKey, '')));
                if (preg_match('/^[A-Z]{2}$/', $code) && ! in_array($code, ['XX', 'T1'], true)) {
                    return $code;
                }
            }
        }

        // Local development helper (only when APP_ENV=local): ?__country=US
        if (app()->isLocal() && $request->filled('__country')) {
            $override = strtoupper(trim((string) $request->query('__country')));
            if (preg_match('/^[A-Z]{2}$/', $override)) {
                return $override;
            }
        }

        return null;
    }

    /**
     * Read a country value configured either as an HTTP header
     * (HTTP_CF_IPCOUNTRY) or as a raw server variable (GEOIP_COUNTRY_CODE).
     */
    private function headerValue(Request $request, string $key): ?string
    {
        if (str_starts_with($key, 'HTTP_')) {
            $header = str_replace('_', '-', substr($key, 5));
            $value = $request->headers->get($header);

            if (filled($value)) {
                return (string) $value;
            }
        }

        return $request->server($key);
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
