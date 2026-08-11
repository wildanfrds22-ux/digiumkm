@extends('layouts.app')

@section('title', 'Dashboard - DigiUMKM')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-10 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-brand-50 rounded-full"></div>
        <div class="relative">
            <p class="text-sm font-bold text-brand-600 uppercase tracking-wide mb-1">Selamat datang kembali</p>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3">Halo, {{ Auth::user()->name }} 👋</h1>
            <p class="text-gray-500 max-w-xl mb-7">Anda telah masuk ke sistem DigiUMKM. Mulai analisis strategi digitalisasi baru, atau tinjau kembali laporan yang pernah Anda buat sebelumnya.</p>

            <div class="flex flex-wrap gap-3">
                <a href="/profil-umkm" class="inline-flex items-center gap-2 bg-brand-600 text-white font-bold rounded-full px-6 py-3 hover:bg-brand-700 transition shadow-md shadow-brand-600/20">
                    Mulai Analisis UMKM
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('riwayat.index') }}" class="inline-flex items-center gap-2 bg-white text-brand-700 border border-brand-200 font-bold rounded-full px-6 py-3 hover:bg-brand-50 transition shadow-sm">
                    Riwayat Analisis
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <span class="w-11 h-11 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl mb-4">📝</span>
            <h3 class="font-bold text-gray-900 mb-1">1. Isi Profil</h3>
            <p class="text-sm text-gray-500">Lengkapi data usaha Anda untuk dianalisis oleh AI.</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <span class="w-11 h-11 rounded-xl bg-gold-50 text-gold-600 flex items-center justify-center text-xl mb-4">🤖</span>
            <h3 class="font-bold text-gray-900 mb-1">2. AI Menganalisis</h3>
            <p class="text-sm text-gray-500">Dapatkan rekomendasi platform &amp; strategi dalam hitungan detik.</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <span class="w-11 h-11 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl mb-4">🗺️</span>
            <h3 class="font-bold text-gray-900 mb-1">3. Ikuti Roadmap</h3>
            <p class="text-sm text-gray-500">Jalankan roadmap 30 hari dan pantau progres Anda.</p>
        </div>
    </div>

</div>
@endsection
