<?php

namespace App\Models;

use Database\Factories\PostCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Concerns\HasLocaleTranslations;

class PostCategory extends Model
{
    /** @use HasFactory<PostCategoryFactory> */
     use HasFactory;
    use HasLocaleTranslations;

    protected array $translatable = ['name', 'description'];
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category', 'name');
    }
}
