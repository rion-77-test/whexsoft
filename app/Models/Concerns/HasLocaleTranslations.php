<?php

namespace App\Models\Concerns;

trait HasLocaleTranslations
{
    // Each model declares: protected array $translatable = ['title', 'summary', ...];
    // The FIRST item is the main field used to decide whether a translation exists.

    public function initializeHasLocaleTranslations(): void
    {
        $this->mergeCasts(['translations' => 'array']);
        $this->fillable[] = 'translations';
    }

    /**
     * Bengali (content language): the original column.
     * Other languages: the translated value, falling back to the original when empty.
     */
    public function tr(string $field): mixed
    {
        $original = $this->getAttribute($field);
        $locale = app()->getLocale();

        if ($locale === config('locales.content')) {
            return $original;
        }

        $value = data_get($this->translations, "{$locale}.{$field}");

        return filled($value) ? $value : $original;
    }

    public function hasTranslation(string $locale = 'en'): bool
    {
        $main = $this->translatable[0] ?? 'title';

        return filled(data_get($this->translations, "{$locale}.{$main}"));
    }
}