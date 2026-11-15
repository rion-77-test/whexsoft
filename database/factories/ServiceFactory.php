<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_category_id' => ServiceCategory::factory(),
            'title' => fake()->sentence(3),
            'slug' => fake()->unique()->slug(),
            'short_description' => fake()->sentence(),
            'intro' => fake()->paragraph(),
            'content' => fake()->paragraphs(4, true),
            'features' => collect(range(1, 3))->map(fn (): array => [
                'title' => fake()->words(3, true),
                'text' => fake()->sentence(),
            ])->all(),
            'steps' => collect(range(1, 3))->map(fn (int $step): array => [
                'title' => 'Step '.$step.': '.fake()->words(3, true),
                'text' => fake()->sentence(),
            ])->all(),
            'faqs' => collect(range(1, 3))->map(fn (): array => [
                'question' => rtrim(fake()->sentence(), '.').'?',
                'answer' => fake()->paragraph(),
            ])->all(),
            'meta_title' => fake()->sentence(),
            'meta_description' => fake()->sentence(),
            'sort_order' => fake()->numberBetween(0, 100),
            'is_active' => true,
        ];
    }
}
