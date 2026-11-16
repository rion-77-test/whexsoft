<?php

namespace App\Models;

use Database\Factories\ServiceCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ServiceCategory extends Model implements HasMedia
{
    /** @use HasFactory<ServiceCategoryFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category-image')
            ->singleFile()
            ->useFallbackUrl(asset('assets/admin/images/default-fallback-image.png'));
    }

    public function getImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('category-image')
            ?: asset('assets/admin/images/default-fallback-image.png');
    }
}
