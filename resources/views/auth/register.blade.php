@extends('layouts.auth')

@section('title', 'Create account')

@section('content')
    <p class="login-box-msg">Create an account</p>
    <p class="text-body-secondary small">Creating an account does not grant administrator access.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" autocomplete="name" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" autocomplete="username" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror"
                autocomplete="new-password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="form-control" autocomplete="new-password" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Create account</button>
        </div>
    </form>

    <p class="mb-0 mt-3 text-center">
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
    </p>
@endsection
