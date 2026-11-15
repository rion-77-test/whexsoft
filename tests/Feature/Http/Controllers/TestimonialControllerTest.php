<?php

use App\Models\Testimonial;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

test('testimonials can be created updated and deleted with media', function () {
    $this->actingAsAdmin();

    Storage::fake('public');

    $this->post(route('admin.testimonials.store'), [
        'client_name' => 'Jane Doe',
        'business_name' => 'Doe Studio',
        'quote' => 'They did an excellent job.',
        'is_published' => 1,
        'sort_order' => 1,
        'photo' => UploadedFile::fake()->image('jane.png'),
    ])->assertRedirect(route('admin.testimonials.index'));

    $testimonial = Testimonial::query()->where('client_name', 'Jane Doe')->firstOrFail();
    $this->assertModelExists($testimonial);
    expect($testimonial->getMedia('photo'))->toHaveCount(1);

    $this->put(route('admin.testimonials.update', $testimonial), [
        'client_name' => 'Jane Smith',
        'business_name' => 'Smith Studio',
        'quote' => 'Updated quote.',
        'is_published' => 0,
        'sort_order' => 2,
        'remove_photo' => 1,
    ])->assertRedirect(route('admin.testimonials.show', $testimonial));

    $testimonial->refresh();
    $this->assertDatabaseHas('testimonials', [
        'id' => $testimonial->id,
        'client_name' => 'Jane Smith',
        'is_published' => false,
    ]);
    expect($testimonial->getMedia('photo'))->toHaveCount(0);

    $this->get(route('admin.testimonials.index'))
        ->assertOk()
        ->assertSee('Jane Smith');
    $this->get(route('admin.testimonials.create'))->assertOk();
    $this->get(route('admin.testimonials.edit', $testimonial))->assertOk();
    $this->get(route('admin.testimonials.show', $testimonial))->assertOk();

    $this->delete(route('admin.testimonials.destroy', $testimonial))
        ->assertRedirect(route('admin.testimonials.index'));

    $this->assertModelMissing($testimonial);
});

test('testimonial pages render the fallback photo when none has been uploaded', function () {
    $this->actingAsAdmin();

    $testimonial = Testimonial::factory()->create();

    $this->get(route('admin.testimonials.show', $testimonial))
        ->assertOk()
        ->assertSee(asset('assets/admin/images/default-fallback-image.png'));
});
