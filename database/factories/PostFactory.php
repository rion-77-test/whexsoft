<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'category' => fake()->word(),
            'excerpt' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'featured_image' => null,
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'meta_title' => fake()->sentence(),
            'meta_description' => fake()->sentence(),
        ];
    }
}
