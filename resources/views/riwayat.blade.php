@extends('layouts.app')

@section('title', 'Riwayat Analisis - DigiUMKM')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Riwayat Analisis UMKM 📁</h2>
        <p class="text-gray-600 mb-6">Daftar laporan strategi digitalisasi yang pernah Anda buat sebelumnya.</p>

        @if($histories->isEmpty())
            <div class="text-center py-12 text-gray-500">
                Belum ada riwayat analisis. Silakan lakukan analisis baru melalui menu Profil UMKM.
            </div>
        @else
            <div class="space-y-4">
                @foreach($histories as $item)
                <div class="border border-gray-200 rounded-xl p-5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:bg-gray-50 transition">
                    <div>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded font-medium">
                            {{ $item->business_type }}
                        </span>
                        <h4 class="text-md font-bold text-gray-900 mt-2">Skala: {{ $item->business_scale }} | Target: {{ $item->target_market }}</h4>
                        <p class="text-xs text-gray-500 mt-1">Dibuat pada: {{ $item->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <a href="{{ route('riwayat.show', $item->id) }}" class="bg-blue-600 text-white text-sm font-bold px-4 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm">
                        Lihat Laporan
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
