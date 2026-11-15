<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(LazilyRefreshDatabase::class);

test('registrations create regular accounts even when admin access is submitted', function () {
    $this->get(route('register'))
        ->assertOk()
        ->assertSee('Create an account');

    $this->post(route('register'), [
        'name' => 'New Member',
        'email' => 'member@example.test',
        'password' => 'Strong-password-123!',
        'password_confirmation' => 'Strong-password-123!',
        'is_admin' => true,
    ])->assertRedirect(route('home'))
        ->assertSessionHas('status');

    $user = User::query()->where('email', 'member@example.test')->firstOrFail();
    $this->assertModelExists($user);
    $this->assertAuthenticatedAs($user);
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'is_admin' => false,
    ]);
    expect(Hash::check('Strong-password-123!', $user->password))->toBeTrue();
});

test('registration rejects an email address that is already in use', function () {
    User::factory()->create(['email' => 'existing@example.test']);

    $this->from(route('register'))
        ->post(route('register'), [
            'name' => 'Duplicate User',
            'email' => 'existing@example.test',
            'password' => 'Strong-password-123!',
            'password_confirmation' => 'Strong-password-123!',
        ])
        ->assertRedirect(route('register'))
        ->assertSessionHasErrors('email');

    $this->assertGuest();
    $this->assertDatabaseCount('users', 1);
});
