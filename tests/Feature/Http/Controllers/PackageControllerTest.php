<?php

use App\Models\Package;
use App\Models\Service;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('packages can be created updated and deleted', function () {
    $this->actingAsAdmin();

    $service = Service::factory()->create();

    $this->post(route('admin.packages.store'), [
        'service_id' => $service->id,
        'name' => 'Standard',
        'tagline' => 'For growing businesses',
        'price_label' => 'Starts at $199',
        'features' => [
            ['text' => 'Five pages', 'included' => 1],
            ['text' => 'Priority support', 'included' => 0],
            ['text' => '', 'included' => 1],
        ],
        'is_popular' => 1,
        'sort_order' => 2,
        'is_active' => 1,
    ])->assertRedirect(route('admin.packages.index'));

    $package = Package::query()->where('name', 'Standard')->firstOrFail();
    $this->assertModelExists($package);
    expect($package->service->is($service))->toBeTrue();
    expect($package->features)->toHaveCount(2);
    expect($package->features[0])->toBe(['text' => 'Five pages', 'included' => true]);
    expect($package->features[1])->toBe(['text' => 'Priority support', 'included' => false]);

    $this->put(route('admin.packages.update', $package), [
        'service_id' => null,
        'name' => 'Updated Standard',
        'tagline' => null,
        'price_label' => 'Starts at $249',
        'features' => [],
        'is_popular' => 0,
        'sort_order' => 3,
        'is_active' => 0,
    ])->assertRedirect(route('admin.packages.show', $package));

    $package->refresh();
    $this->assertDatabaseHas('packages', [
        'id' => $package->id,
        'name' => 'Updated Standard',
        'service_id' => null,
        'is_popular' => false,
        'is_active' => false,
    ]);
    expect($package->features)->toBe([]);

    $this->get(route('admin.packages.index'))
        ->assertOk()
        ->assertSee('Updated Standard');
    $this->get(route('admin.packages.create'))->assertOk();
    $this->get(route('admin.packages.edit', $package))->assertOk();
    $this->get(route('admin.packages.show', $package))->assertOk();

    $this->delete(route('admin.packages.destroy', $package))
        ->assertRedirect(route('admin.packages.index'));

    $this->assertModelMissing($package);
});
