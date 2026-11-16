<!DOCTYPE html>
<html lang="bn">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'WhexSoft - Dhaka Studio | ডিজিটাল ও ওয়েব ডেভেলপমেন্ট এজেন্সি')</title>
        <meta name="description" content="@yield('description', 'আপনার ব্যবসার জন্য এমন ওয়েবসাইট, যা ফলাফল এনে দেয়।')" />
        <meta name="theme-color" content="#67768E" />
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('title', 'WhexSoft - Dhaka Studio')" />
        <meta property="og:description" content="@yield('description', 'আপনার ব্যবসার জন্য এমন ওয়েবসাইট, যা ফলাফল এনে দেয়।')" />
        <meta property="og:image" content="@yield('og_image', asset('assets/frontend/images/hero.jpg'))" />
        <link rel="icon" type="image/jpg" href="{{ asset('assets/frontend/images/whexsoft-logo.jpg') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" /> @vite('resources/css/frontend/frontend.css') @stack('head')
    </head>
    <body class="site-type-font-sans site-type-antialiased min-vh-100 site-state-selection-surface-bg-arbitrary-hex-b9f516 site-state-selection-color-text-arbitrary-hex-070400 bg-ambient site-page" data-page="@yield('page', 'home')"> @include('frontend.partials.header') @yield('content') @include('frontend.partials.footer') @include('frontend.partials.floating')
        <script src="{{ asset('assets/frontend/js/main.js') }}" defer></script> @stack('scripts')
    </body>
</html>
