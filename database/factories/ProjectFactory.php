<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
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
            'project_category_id' => ProjectCategory::factory(),
            'service_id' => null,
            'summary' => fake()->sentence(),
            'description' => fake()->paragraphs(3, true),
            'live_url' => fake()->optional()->url(),
            'project_walkthrough_url' => null,
            'is_real_client' => true,
            'is_featured' => false,
            'is_published' => true,
            'sort_order' => fake()->numberBetween(0, 100),
        ];
    }
}
