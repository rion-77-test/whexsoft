<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => fake()->boolean(75) ? Service::factory() : null,
            'name' => fake()->randomElement(['Basic', 'Standard', 'Premium']),
            'tagline' => fake()->sentence(),
            'price_label' => 'Starts at '.fake()->randomElement(['$99', '$199', '$499', '$999']),
            'features' => collect(range(1, 5))->map(fn (): array => [
                'text' => fake()->sentence(4),
                'included' => fake()->boolean(80),
            ])->all(),
            'is_popular' => fake()->boolean(25),
            'sort_order' => fake()->numberBetween(0, 100),
            'is_active' => true,
        ];
    }
}
