<?php

if (! function_exists('bn_digits')) {
    /** Convert 0-9 to Bengali digits. */
    function bn_digits(string|int|float|null $value): string
    {
        return strtr((string) $value, [
            '0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪',
            '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯',
        ]);
    }
}

if (! function_exists('format_date')) {
    /** Format a date in the current language (Bengali month names and digits in bn). */
    function format_date(?\Carbon\CarbonInterface $date, string $format = 'd M Y'): string
    {
        if (! $date) {
            return '';
        }

        $text = $date->copy()->locale(app()->getLocale())->translatedFormat($format);

        return app()->getLocale() === 'bn' ? bn_digits($text) : $text;
    }
}