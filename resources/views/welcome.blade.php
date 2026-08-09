@extends('layouts.app')

@section('title', 'Beranda - DigiUMKM')

@section('content')
    <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100 px-6">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-4">
            Tingkatkan Bisnis Anda dengan <br><span class="text-blue-600">Strategi Digital Cerdas</span>
        </h1>
        <p class="mt-4 text-xl text-gray-500 max-w-2xl mx-auto mb-8">
            Konsultan AI pribadi Anda untuk memilih marketplace, media sosial, dan pembayaran digital yang paling sesuai dengan profil UMKM Anda.
        </p>
        <div class="flex justify-center gap-4">
            <a href="/profil-umkm" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition shadow-md">
                Mulai Analisis Gratis
            </a>
            <a href="#fitur" class="bg-white text-blue-600 border border-blue-600 px-8 py-3 rounded-lg font-bold hover:bg-blue-50 transition shadow-sm">
                Pelajari Fitur
            </a>
        </div>
    </div>

    <!-- Bagian Penjelasan Fitur (Opsional untuk tombol Pelajari Fitur) -->
    <div id="fitur" class="mt-16 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <div class="text-blue-600 text-3xl mb-4">🤖</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Analisis Berbasis AI</h3>
            <p class="text-gray-600 text-sm">Memanfaatkan teknologi Google Gemini untuk mencocokkan platform digital dengan skala dan anggaran UMKM.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <div class="text-blue-600 text-3xl mb-4">📊</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Rekomendasi Akurat</h3>
            <p class="text-gray-600 text-sm">Menyaring pilihan marketplace, media sosial, dan metode pembayaran yang paling efektif.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
            <div class="text-blue-600 text-3xl mb-4">🚀</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Roadmap 30 Hari</h3>
            <p class="text-gray-600 text-sm">Panduan langkah taktis harian yang terstruktur untuk memulai digitalisasi bisnis tanpa bingung.</p>
        </div>
    </div>
@endsection
