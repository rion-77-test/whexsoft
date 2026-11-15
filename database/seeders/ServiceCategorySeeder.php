<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Seed the service categories used on the Services overview page.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'ওয়েবসাইট ডিজাইন ও ডেভেলপমেন্ট', 'slug' => 'website', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'ডিজিটাল মার্কেটিং', 'slug' => 'digital-marketing', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'সফটওয়্যার ডেভেলপমেন্ট', 'slug' => 'software', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'অন্যান্য সেবা', 'slug' => 'others', 'sort_order' => 4, 'is_active' => true],
        ];

        foreach ($categories as $category) {
            ServiceCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category,
            );
        }
    }
}
