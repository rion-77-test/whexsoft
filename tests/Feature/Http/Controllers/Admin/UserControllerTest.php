<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(LazilyRefreshDatabase::class);

test('guests are redirected to sign in before accessing admin user pages', function () {
    $this->get(route('admin.users.index'))
        ->assertRedirect(route('login'));
});

test('regular users are forbidden from admin user pages', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.users.index'))
        ->assertForbidden();
});

test('administrators can create update view and delete users', function () {
    $this->actingAsAdmin();

    $this->get(route('admin.users.index'))->assertOk();
    $this->get(route('admin.users.create'))->assertOk();

    $response = $this->post(route('admin.users.store'), [
        'name' => 'Taylor Reed',
        'email' => 'Taylor@Example.test',
        'password' => 'Stronger-password-123!',
        'password_confirmation' => 'Stronger-password-123!',
        'is_admin' => '0',
    ]);

    $user = User::query()->where('email', 'taylor@example.test')->firstOrFail();
    $response->assertRedirect(route('admin.users.show', $user));
    $this->assertModelExists($user);
    expect(Hash::check('Stronger-password-123!', $user->password))->toBeTrue();
    expect($user->is_admin)->toBeFalse();

    $this->get(route('admin.users.show', $user))->assertOk()->assertSee($user->name);
    $this->get(route('admin.users.edit', $user))->assertOk();

    $this->put(route('admin.users.update', $user), [
        'name' => 'Taylor Morgan',
        'email' => 'Taylor.Morgan@Example.test',
        'password' => '',
        'password_confirmation' => '',
        'is_admin' => '1',
    ])->assertRedirect(route('admin.users.show', $user));

    $user->refresh();
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Taylor Morgan',
        'email' => 'taylor.morgan@example.test',
        'is_admin' => true,
    ]);
    expect(Hash::check('Stronger-password-123!', $user->password))->toBeTrue();

    $this->delete(route('admin.users.destroy', $user))
        ->assertRedirect(route('admin.users.index'));

    $this->assertModelMissing($user);
});

test('administrator creation rejects incomplete user data', function () {
    $this->actingAsAdmin();

    $this->from(route('admin.users.create'))
        ->post(route('admin.users.store'), [])
        ->assertRedirect(route('admin.users.create'))
        ->assertSessionHasErrors(['name', 'email', 'password', 'is_admin']);

    $this->assertDatabaseCount('users', 1);
});

test('administrators cannot demote or delete their own account', function () {
    $admin = $this->actingAsAdmin();

    $this->from(route('admin.users.edit', $admin))
        ->put(route('admin.users.update', $admin), [
            'name' => $admin->name,
            'email' => $admin->email,
            'password' => '',
            'password_confirmation' => '',
            'is_admin' => '0',
        ])
        ->assertRedirect(route('admin.users.edit', $admin))
        ->assertSessionHasErrors('is_admin');

    $this->from(route('admin.users.show', $admin))
        ->delete(route('admin.users.destroy', $admin))
        ->assertRedirect(route('admin.users.show', $admin))
        ->assertSessionHas('error', 'You cannot delete the account currently signed in.');

    $this->get(route('admin.users.show', $admin))
        ->assertOk()
        ->assertSee('You cannot delete the account currently signed in.');

    $this->assertDatabaseHas('users', [
        'id' => $admin->id,
        'is_admin' => true,
    ]);
});
