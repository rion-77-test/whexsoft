<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the home page lists published projects', function () {
    $project = Project::factory()->create(['is_published' => true]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee($project->title);
});
