<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>CUG Admissions Portal | Catholic University of Ghana Admissions</title>
    <meta name="description" content="Login or register to access the Catholic University of Ghana Admissions Portal. Powered by Priority Solutions Agency.">
    <meta name="keywords" content="Catholic University of Ghana, CUG Portal, CUG Login, Admissions Portal, PSA Ghana">
    <meta name="author" content="Priority Solutions Agency">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="CUG Portal | Catholic University of Ghana Admissions">
    <meta property="og:description" content="Access your admissions dashboard and apply to the Catholic University of Ghana. Trusted and secured.">
    <meta property="og:image" content="{{ asset('assets/logos/school-logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    
    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
@php
    use Illuminate\Support\Facades\Auth;
@endphp

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
