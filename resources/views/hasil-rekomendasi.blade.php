@extends('layouts.app')

@section('title', 'Hasil Analisis AI - DigiUMKM')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white shadow-lg">
        <h1 class="text-3xl font-extrabold mb-2">Rekomendasi Digitalisasi UMKM</h1>
        <p class="text-blue-100 text-lg">Strategi personalisasi AI berdasarkan profil usaha Anda.</p>
    </div>

    <!-- Strategi Utama -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
            <span class="text-2xl">💡</span> Strategi Utama
        </h2>
        <p class="text-gray-700 leading-relaxed text-lg">
            {{ $rekomendasi['strategi'] ?? 'Strategi belum tersedia.' }}
        </p>
    </div>

    <!-- Platform Rekomendasi -->
    <div>
        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
            <span class="text-2xl">📱</span> Platform yang Direkomendasikan
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if(isset($rekomendasi['rekomendasi_utama']))
                @foreach($rekomendasi['rekomendasi_utama'] as $item)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">{{ $item['platform'] }}</h3>
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mt-1 font-medium">
                                {{ $item['kategori'] }}
                            </span>
                        </div>
                        <div class="bg-green-100 text-green-800 font-bold px-3 py-1 rounded-full text-sm">
                            Skor: {{ $item['match_score'] }}/100
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ $item['alasan'] }}
                    </p>
                    <div class="pt-4 border-t border-gray-100">
                        <p class="text-sm font-semibold text-gray-800">
                            Estimasi Biaya: <span class="text-blue-600">{{ $item['estimasi_biaya'] }}</span>
                        </p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Roadmap Eksekusi -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <span class="text-2xl">🚀</span> Roadmap Eksekusi 30 Hari
        </h2>

        <div class="space-y-6">
            @if(isset($rekomendasi['roadmap']))
                @foreach($rekomendasi['roadmap'] as $langkah)
                <div class="flex gap-4">
                    <div class="flex flex-col items-center">
                        <div class="bg-blue-600 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold shadow-sm">
                            H:{{ explode('-', $langkah['hari'])[0] ?? $langkah['hari'] }}
                        </div>
                        <div class="h-full w-px bg-gray-200 my-2"></div>
                    </div>
                    <div class="pb-6">
                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                            <h4 class="text-md font-bold text-gray-900 mb-1">Hari {{ $langkah['hari'] }}: {{ $langkah['judul'] }}</h4>
                            <p class="text-gray-600 text-sm">{{ $langkah['deskripsi'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Tombol Navigasi & Cetak PDF -->
    <div class="flex flex-wrap justify-center gap-4 pt-4 pb-8 print:hidden">
        <a href="/profil-umkm" class="bg-white text-gray-600 border border-gray-300 px-6 py-2 rounded-lg font-medium hover:bg-gray-50 transition shadow-sm">
            Analisis Baru
        </a>
        <a href="{{ route('riwayat.index') }}" class="bg-gray-800 text-white px-6 py-2 rounded-lg font-medium hover:bg-gray-900 transition shadow-sm">
            Lihat Riwayat
        </a>
        <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition shadow-md">
            🖨️ Cetak / Ekspor PDF
        </button>
    </div>

</div>

@push('styles')
<style>
@media print {
    header, footer, .print\:hidden {
        display: none !important;
    }
    body {
        background-color: white !important;
    }
}
</style>
@endpush
@endsection
