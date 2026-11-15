<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

test('administrators can sign in and are redirected to the admin dashboard', function () {
    $admin = User::factory()->admin()->create();

    $this->post(route('login'), [
        'email' => strtoupper($admin->email),
        'password' => 'password',
    ])->assertRedirect(route('admin.dashboard'));

    $this->assertAuthenticatedAs($admin);
});

test('regular users can sign in and are redirected to the public site', function () {
    $user = User::factory()->create();

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertRedirect(route('home'));

    $this->assertAuthenticatedAs($user);
});

test('invalid credentials return an email error without authenticating', function () {
    $user = User::factory()->create();

    $this->from(route('login'))
        ->post(route('login'), [
            'email' => $user->email,
            'password' => 'incorrect-password',
        ])
        ->assertRedirect(route('login'))
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

test('authenticated users can sign out', function () {
    $this->actingAsAdmin();

    $this->post(route('logout'))
        ->assertRedirect(route('login'));

    $this->assertGuest();
});

test('the login page is available to guests', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertSee('Sign in to the admin panel');
});
