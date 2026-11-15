<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Seed demo testimonials.
     */
    public function run(): void
    {
        Testimonial::factory(6)->create();
    }
}
