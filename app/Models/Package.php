<?php

namespace App\Models;

use App\Models\Concerns\HasLocaleTranslations;
use Database\Factories\PackageFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    /** @use HasFactory<PackageFactory> */
    use HasFactory;
    use HasLocaleTranslations;

    /** Features are handled separately: translations.en.feature_texts (see localizedFeatures()). */
    protected array $translatable = ['name', 'tagline', 'price_label'];

    protected $fillable = [
        'service_id',
        'name',
        'tagline',
        'price_label',
        'features',
        'is_popular',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public static function lowestPricedActive(): ?self
    {
        $packages = static::query()
            ->active()
            ->orderBy('id')
            ->get(['id', 'price_label', 'translations']);

        return static::lowestPricedIn($packages);
    }

    /**
     * @param  iterable<self>  $packages
     */
    public static function lowestPricedIn(iterable $packages): ?self
    {
        return collect($packages)
            ->filter(fn (self $package): bool => $package->numericPrice() !== null)
            ->sortBy(fn (self $package): float => $package->numericPrice() ?? PHP_FLOAT_MAX)
            ->first();
    }

    /** Price text for display, in the current language. */
    public function priceAmount(): string
    {
        return $this->stripPricePrefix((string) $this->tr('price_label'));
    }

    /** Always parsed from the ORIGINAL label, so ordering never depends on the language. */
    public function numericPrice(): ?float
    {
        $priceAmount = strtr($this->stripPricePrefix((string) $this->price_label), [
            '০' => '0',
            '১' => '1',
            '২' => '2',
            '৩' => '3',
            '৪' => '4',
            '৫' => '5',
            '৬' => '6',
            '৭' => '7',
            '৮' => '8',
            '৯' => '9',
        ]);

        if (preg_match('/^(?:USD|BDT|Tk|টাকা|৳|\$|€|£)?\s*([0-9][0-9,]*(?:\.[0-9]+)?)/iu', $priceAmount, $matches) !== 1) {
            return null;
        }

        return (float) str_replace(',', '', $matches[1]);
    }

    /**
     * Features for display. Bengali: the original list.
     * Other languages: same list and same "included" flags, with translated texts matched by position.
     *
     * @return array<int, array{text: string, included: bool}>
     */
    public function localizedFeatures(): array
    {
        $original = $this->features ?? [];
        $locale = app()->getLocale();

        if ($locale === config('locales.content')) {
            return $original;
        }

        $texts = data_get($this->translations, "{$locale}.feature_texts", []);

        return collect($original)
            ->map(fn (array $feature, int $i): array => [
                'text' => filled($texts[$i] ?? null) ? $texts[$i] : ($feature['text'] ?? ''),
                'included' => $feature['included'] ?? true,
            ])
            ->all();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    private function stripPricePrefix(string $label): string
    {
        $label = trim($label);

        return trim(preg_replace(
            '/^(?:starting\s+(?:at|from)|starts?\s+(?:at|from)|from)\s*/iu',
            '',
            $label,
        ) ?? $label);
    }
}