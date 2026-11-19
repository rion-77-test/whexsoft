<?php

namespace App\Support;

class TranslationPayload
{
    /**
     * @param  array<string|int, mixed>  $data
     * @return array<string|int, mixed>|null
     */
    public static function clean(array $data): ?array
    {
        $clean = self::prune($data);

        return $clean === [] ? null : $clean;
    }

    /**
     * @param  array<string|int, mixed>  $data
     * @return array<string|int, mixed>
     */
    private static function prune(array $data, ?string $parentKey = null): array
    {
        $out = [];

        foreach ($data as $key => $value) {
            $value = is_array($value)
                ? self::prune($value, (string) $key)
                : (is_string($value) ? trim($value) : $value);

            if ($value === '' || $value === [] || $value === null) {
                continue;
            }

            $out[$key] = $value;
        }

        if ($parentKey !== 'feature_texts' && is_int(array_key_first($out) ?? null)) {
            return array_values($out);
        }

        return $out;
    }
}
