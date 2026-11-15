@extends('layouts.auth')

@section('title', 'Sign in')

@section('content')
    <p class="login-box-msg">Sign in to the admin panel</p>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            <input id="email" name="email" type="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') ?? "test@example.com" }}" placeholder="Email address"
                autocomplete="username" aria-label="Email address" required autofocus>
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input id="password" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Password" autocomplete="current-password"
                value = "password"
                aria-label="Password" required>
            <div class="input-group-text"><span class="bi bi-lock"></span></div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row align-items-center">
            <div class="col-7">
                <div class="form-check">
                    <input id="remember" name="remember" type="checkbox" value="1"
                        class="form-check-input" @checked(old('remember'))>
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
            </div>
            <div class="col-5">
                <button type="submit" class="btn btn-success w-100">Sign in</button>
            </div>
        </div>
    </form>

    <p class="mb-0 mt-3 text-center">
        <a href="{{ route('register') }}">Create an account</a>
    </p>
@endsection
