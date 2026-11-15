<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Seed demo packages for the active services.
     */
    public function run(): void
    {
        Package::factory(2)->create(['service_id' => null]);

        $services = Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        foreach ($services as $service) {
            Package::factory(3)->create(['service_id' => $service->id]);
        }
    }
}
