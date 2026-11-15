@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h1 class="mb-0 fs-3">Edit User</h1>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <x-admin.form-fields.input name="name" label="Name"
                                :value="$user->name" class="col-md-6" required />
                            <x-admin.form-fields.input name="email" label="Email" type="email"
                                :value="$user->email" class="col-md-6" required />
                            <div class="col-md-6">
                                <label for="password" class="form-label">New Password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    autocomplete="new-password">
                                <div class="form-text">Leave blank to keep the current password.</div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control" autocomplete="new-password">
                            </div>
                            <div class="col-12">
                                <x-admin.form-fields.checkbox name="is_admin" label="Administrator access"
                                    :checked="$user->is_admin" />
                                <div class="form-text">At least one account must retain administrator access.</div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.users.show', $user) }}"
                                class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
