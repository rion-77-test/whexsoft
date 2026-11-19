<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

        return array_key_exists((string) $locale, config('locales.supported'))
            ? (string) $locale
            : config('locales.default');
    }

    public static function geoEnabled(): bool
    {
        $raw = static::get('geo_language_enabled', config('locales.geo.enabled_default', false) ? '1' : '0');

        return filter_var($raw, FILTER_VALIDATE_BOOLEAN);
    }
}
