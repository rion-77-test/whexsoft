<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin access') | WhexSoft</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    @vite('resources/css/admin/adminlte.css')
</head>
<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-success shadow-sm">
            <div class="card-header text-center">
                <a class="text-decoration-none text-dark" href="{{ route('home') }}">
                    <img src="{{ asset('assets/frontend/images/whexsoft-logo.jpg') }}"
                        alt="WhexSoft logo" class="rounded" width="42" height="42">
                    <span class="d-block fw-bold fs-4 mt-2">WhexSoft</span>
                </a>
                <p class="mb-0 text-body-secondary">Admin panel</p>
            </div>
            <div class="card-body">
                @yield('content')
            </div>
        </div>
        <p class="text-center mt-3">
            <a href="{{ route('home') }}">Return to website</a>
        </p>
    </div>
</body>
</html>
