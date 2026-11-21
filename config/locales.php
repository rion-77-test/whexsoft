<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Last-resort fallback locale
    |--------------------------------------------------------------------------
    |
    | Used when the admin setting is missing or invalid.
    |
    */

    'default' => 'bn',

    /*
    |--------------------------------------------------------------------------
    | Content language
    |--------------------------------------------------------------------------
    |
    | The language of the ORIGINAL database columns. Never changes.
    |
    */

    'content' => 'bn',

    /*
    |--------------------------------------------------------------------------
    | Supported locales
    |--------------------------------------------------------------------------
    */

    'supported' => [
        'bn' => ['label' => 'Bangla', 'short' => 'BN', 'html' => 'bn'],
        'en' => ['label' => 'English', 'short' => 'EN', 'html' => 'en'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Geo-location language routing
    |--------------------------------------------------------------------------
    */

    'geo' => [
        'enabled_default' => false, // starts OFF so deployment is safe before translations are ready
        'bangladesh_country_code' => 'BD',
        'bangladesh_locale' => 'bn',
        'foreign_locale' => 'en',

        // Trusted server/proxy headers checked in order
        'country_headers' => [
            'HTTP_CF_IPCOUNTRY',   // Cloudflare
            'HTTP_X_COUNTRY_CODE', // Reverse proxy / load balancer
            'GEOIP_COUNTRY_CODE',  // Nginx / Apache GeoIP module
        ],
        // Only trust country headers when the request comes from a trusted proxy (set TRUSTED_PROXIES below).
        'require_trusted_proxy' => env('GEO_REQUIRE_TRUSTED_PROXY', env('APP_ENV') === 'production'),
    ],

];
