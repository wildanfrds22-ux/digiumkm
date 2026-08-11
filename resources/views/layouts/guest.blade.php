<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DigiUMKM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-brand-50 to-cream px-4">
            <div class="mb-2">
                <a href="/" class="flex items-center gap-2.5">
                    <x-brand-mark class="w-11 h-11" />
                    <span class="text-2xl font-extrabold tracking-tight text-brand-700 leading-none">
                        Digi<span class="text-gold-600">UMKM</span>
                    </span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-7 bg-white shadow-xl border border-gray-100 overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>

            <a href="/" class="mt-6 text-sm text-gray-500 hover:text-brand-600 transition">&larr; Kembali ke Beranda</a>
        </div>
    </body>
</html>
