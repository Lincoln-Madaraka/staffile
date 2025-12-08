<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GiftMed') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-gm-bg text-gm-text">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-8 sm:pt-0 px-4">
            <div class="mb-6">
                <a href="/" class="inline-flex items-center gap-3">
                    <x-application-logo class="w-14 h-14 fill-current text-gm-primary" />
                    <span class="text-xl font-semibold tracking-tight text-gm-text">
                        {{ config('app.name', 'GiftMed') }}
                    </span>
                </a>
            </div>

            <div class="w-full sm:max-w-md gm-card px-6 py-6">
                {{ $slot }}
            </div>

            <div class="mt-6 text-xs text-gm-muted">
                © {{ date('Y') }} {{ config('app.name', 'GiftMed') }}. All rights reserved.
            </div>
        </div>
    </body>
</html>
