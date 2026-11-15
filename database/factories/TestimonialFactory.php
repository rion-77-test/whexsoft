<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => null,
            'client_name' => fake()->name(),
            'business_name' => fake()->company(),
            'quote' => fake()->paragraphs(2, true),
            'is_published' => true,
            'sort_order' => fake()->numberBetween(0, 100),
        ];
    }
}
