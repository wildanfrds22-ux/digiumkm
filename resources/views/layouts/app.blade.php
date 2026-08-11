<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'DigiUMKM — Konsultan Digitalisasi UMKM Berbasis AI')</title>
    <meta name="description" content="DigiUMKM membantu pelaku UMKM Indonesia memilih platform digital yang tepat dan menyusun roadmap digitalisasi 30 hari, gratis dan berbasis AI.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-cream text-gray-800 antialiased flex flex-col min-h-screen">

    <!-- ===================== NAVBAR ===================== -->
    <header x-data="{ open: false }" class="bg-white/90 backdrop-blur border-b border-brand-100 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-18 py-3 items-center">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2.5 shrink-0">
                    <x-brand-mark class="w-9 h-9" />
                    <span class="text-xl font-extrabold tracking-tight text-brand-700 leading-none">
                        Digi<span class="text-gold-600">UMKM</span>
                    </span>
                </a>

                <!-- Menu Tengah (Desktop) -->
                <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-gray-600">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:text-brand-600 transition">Dashboard</a>
                        <a href="{{ route('umkm.index') }}" class="hover:text-brand-600 transition">Data UMKM</a>
                        <a href="{{ route('riwayat.index') }}" class="hover:text-brand-600 transition">Riwayat</a>
                    @else
                        <a href="/#cara-kerja" class="hover:text-brand-600 transition">Cara Kerja</a>
                        <a href="/#platform" class="hover:text-brand-600 transition">Platform</a>
                        <a href="/#kenapa" class="hover:text-brand-600 transition">Kenapa DigiUMKM</a>
                        <a href="/#kontak" class="hover:text-brand-600 transition">Kontak</a>
                    @endauth
                </nav>

                <!-- Kanan (Desktop) -->
                <div class="hidden md:flex gap-3 items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="/profil-umkm" class="bg-brand-600 text-white px-5 py-2.5 rounded-full font-semibold text-sm hover:bg-brand-700 transition shadow-sm">
                                Mulai Analisis
                            </a>

                            <x-dropdown align="right" width="52">
                                <x-slot name="trigger">
                                    <button class="flex items-center gap-2 pl-1 pr-2 py-1 rounded-full border border-gray-200 hover:border-brand-200 transition">
                                        <span class="w-8 h-8 rounded-full bg-brand-600 text-white flex items-center justify-center text-xs font-bold">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </span>
                                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="px-4 py-2 border-b border-gray-100">
                                        <p class="text-sm font-bold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                    <x-dropdown-link :href="route('profile.edit')">Profil Akun</x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                            Keluar
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-brand-600 px-3 py-2 font-semibold text-sm transition">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-brand-600 text-white px-5 py-2.5 rounded-full font-semibold text-sm hover:bg-brand-700 transition shadow-sm">
                                    Daftar Gratis
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <!-- Hamburger (Mobile) -->
                <button @click="open = !open" class="md:hidden inline-flex items-center justify-center p-2 rounded-lg text-brand-700 hover:bg-brand-50 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menu Mobile -->
            <div x-show="open" x-cloak @click.away="open = false" class="md:hidden pb-4 space-y-1">
                @auth
                    <a href="{{ url('/dashboard') }}" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Dashboard</a>
                    <a href="{{ route('umkm.index') }}" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Data UMKM</a>
                    <a href="{{ route('riwayat.index') }}" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Riwayat</a>
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Profil Akun</a>
                @else
                    <a href="/#cara-kerja" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Cara Kerja</a>
                    <a href="/#platform" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Platform</a>
                    <a href="/#kenapa" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Kenapa DigiUMKM</a>
                    <a href="/#kontak" class="block px-3 py-2 rounded-lg text-gray-600 font-semibold hover:bg-brand-50 hover:text-brand-600">Kontak</a>
                @endauth
                <div class="pt-2 flex flex-col gap-2">
                    @if (Route::has('login'))
                        @auth
                            <a href="/profil-umkm" class="text-center bg-brand-600 text-white px-4 py-2.5 rounded-full font-semibold">Mulai Analisis</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-center px-4 py-2.5 rounded-full font-semibold text-gray-500 border border-gray-200">Keluar</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-center px-4 py-2.5 rounded-full font-semibold text-brand-700 border border-brand-200">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-center bg-brand-600 text-white px-4 py-2.5 rounded-full font-semibold">Daftar Gratis</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- ===================== FLASH MESSAGES ===================== -->
    @if (session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
            <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-3 rounded-2xl text-sm font-medium flex items-start gap-2">
                <span>⚠️</span>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif
    @if (session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
            <div class="bg-brand-50 border border-brand-100 text-brand-700 px-5 py-3 rounded-2xl text-sm font-medium flex items-start gap-2">
                <span>✅</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- ===================== KONTEN ===================== -->
    {{-- Halaman landing (welcome) memakai @section('full') agar section bisa full-width. --}}
    {{-- Halaman lain tetap memakai @section('content') dengan container standar. --}}
    <main class="flex-grow w-full">
        @hasSection('full')
            @yield('full')
        @else
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
                @yield('content')
            </div>
        @endif
    </main>

    <!-- ===================== FOOTER ===================== -->
    <footer id="kontak" class="bg-brand-800 text-brand-100 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 grid grid-cols-2 md:grid-cols-4 gap-10">
            <div class="col-span-2 md:col-span-1">
                <a href="/" class="flex items-center gap-2 mb-3">
                    <x-brand-mark class="w-8 h-8" />
                    <span class="text-lg font-extrabold text-white">Digi<span class="text-gold-500">UMKM</span></span>
                </a>
                <p class="text-sm text-brand-200 leading-relaxed">
                    Konsultan digitalisasi UMKM berbasis AI. Bantu pelaku UMKM Indonesia memilih platform digital yang tepat, gratis.
                </p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-3 text-sm tracking-wide uppercase">Navigasi</h4>
                <ul class="space-y-2 text-sm text-brand-200">
                    <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="/#cara-kerja" class="hover:text-white transition">Cara Kerja</a></li>
                    <li><a href="/#platform" class="hover:text-white transition">Platform</a></li>
                    <li><a href="/#kenapa" class="hover:text-white transition">Kenapa DigiUMKM</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-3 text-sm tracking-wide uppercase">Akun</h4>
                <ul class="space-y-2 text-sm text-brand-200">
                    @auth
                        <li><a href="{{ url('/dashboard') }}" class="hover:text-white transition">Dashboard</a></li>
                        <li><a href="{{ route('umkm.index') }}" class="hover:text-white transition">Data UMKM</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="hover:text-white transition">Profil Akun</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-white transition">Masuk</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-white transition">Daftar</a></li>
                    @endauth
                    <li><a href="/profil-umkm" class="hover:text-white transition">Mulai Analisis</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-3 text-sm tracking-wide uppercase">Kontak</h4>
                <ul class="space-y-2 text-sm text-brand-200">
                    <li>Universitas Nahdlatul Ulama Surabaya</li>
                    <li>Program Studi S1 Sistem Informasi</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-brand-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 text-center text-xs text-brand-300">
                &copy; {{ date('Y') }} DigiUMKM. Sistem Rekomendasi Digitalisasi UMKM Berbasis Kecerdasan Buatan.
            </div>
        </div>
    </footer>

</body>
</html>
