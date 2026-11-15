<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('the command promotes an existing registered user to administrator', function () {
    $user = User::factory()->create();

    $this->artisan('users:promote-admin', ['email' => $user->email])
        ->assertExitCode(0);

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'is_admin' => true,
    ]);
});

test('the command reports a missing user without changing database records', function () {
    $this->artisan('users:promote-admin', ['email' => 'missing@example.test'])
        ->expectsOutputToContain('No user was found with that email address.')
        ->assertExitCode(1);

    $this->assertDatabaseCount('users', 0);
});
