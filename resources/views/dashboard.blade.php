@extends('layouts.app')

@section('title', 'Dashboard - DigiUMKM')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
        <p class="text-gray-600 mb-6">Anda telah berhasil masuk ke sistem DigiUMKM. Mulai analisis strategi digitalisasi atau lihat laporan riwayat Anda.</p>

        <div class="flex flex-wrap gap-4">
            <a href="/profil-umkm" class="bg-blue-600 text-white font-bold rounded-lg px-6 py-3 hover:bg-blue-700 transition shadow-md">
                Mulai Analisis UMKM
            </a>
            <a href="{{ route('riwayat.index') }}" class="bg-white text-blue-600 border border-blue-600 font-bold rounded-lg px-6 py-3 hover:bg-blue-50 transition shadow-sm">
                Riwayat Analisis
            </a>
        </div>
    </div>
</div>
@endsection
