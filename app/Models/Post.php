<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'featured_image',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function postCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category', 'name');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(function (Builder $query): void {
                $query->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function getReadTimeAttribute(): int
    {
        $words = str_word_count(strip_tags((string) $this->content));

        return max(1, (int) ceil($words / 200));
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured-image')
            ->singleFile()
            ->useFallbackUrl(asset('assets/admin/images/default-fallback-image.png'));

        $this->addMediaCollection('content-images')
            ->useFallbackUrl(asset('assets/admin/images/default-fallback-image.png'));
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('featured-image')
            ?: ($this->featured_image ?: asset('assets/admin/images/default-fallback-image.png'));
    }
}
