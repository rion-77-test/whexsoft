<?php

namespace App\Models;

use Database\Factories\TestimonialFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model implements HasMedia
{
    /** @use HasFactory<TestimonialFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'service_id',
        'client_name',
        'business_name',
        'quote',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile()
            ->useFallbackUrl(asset('assets/admin/images/default-fallback-image.png'));
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->performOnCollections('photo')
            ->fit(Fit::Crop, 160, 160) // square crop, 2x the 40px display size for sharp retina screens
            ->nonQueued();
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function getPhotoUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('photo', 'thumb')
            ?: asset('assets/admin/images/default-fallback-image.png');
    }
}