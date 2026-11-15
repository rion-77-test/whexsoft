<?php

namespace App\Models;

use Database\Factories\PackageFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    /** @use HasFactory<PackageFactory> */
    use HasFactory;

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
            ->get(['id', 'price_label']);

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

    public function priceAmount(): string
    {
        $priceLabel = trim($this->price_label);

        return trim(preg_replace(
            '/^(?:starting\s+(?:at|from)|starts?\s+(?:at|from)|from)\s*/iu',
            '',
            $priceLabel,
        ) ?? $priceLabel);
    }

    public function numericPrice(): ?float
    {
        $priceAmount = strtr($this->priceAmount(), [
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

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
