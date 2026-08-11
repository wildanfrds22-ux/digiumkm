@extends('layouts.app')

@section('title', 'Riwayat Analisis - DigiUMKM')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-2">Riwayat Analisis UMKM 📁</h2>
        <p class="text-gray-500 mb-6">Daftar laporan strategi digitalisasi yang pernah Anda buat sebelumnya.</p>

        @if($histories->isEmpty())
            <div class="text-center py-16">
                <span class="inline-flex w-16 h-16 rounded-full bg-brand-50 items-center justify-center text-3xl mb-4">📭</span>
                <p class="text-gray-500 mb-6">Belum ada riwayat analisis.</p>
                <a href="/profil-umkm" class="inline-flex items-center gap-2 bg-brand-600 text-white font-bold rounded-full px-6 py-3 hover:bg-brand-700 transition shadow-md">
                    Mulai Analisis Pertama
                </a>
            </div>
        @else
            <div class="space-y-4">
                @foreach($histories as $item)
                <div class="border border-gray-100 rounded-2xl p-5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:border-brand-200 hover:bg-brand-50/40 transition">
                    <div>
                        <span class="bg-brand-100 text-brand-800 text-xs px-2.5 py-1 rounded-full font-bold">
                            {{ $item->business_type }}
                        </span>
                        <h4 class="text-md font-bold text-gray-900 mt-2">Skala: {{ $item->business_scale }} | Target: {{ $item->target_market }}</h4>
                        <p class="text-xs text-gray-400 mt-1">Dibuat pada: {{ $item->created_at->format('d M Y, H:i') }}</p>
                    </div>
                    <a href="{{ route('riwayat.show', $item->id) }}" class="shrink-0 bg-brand-600 text-white text-sm font-bold px-5 py-2.5 rounded-full hover:bg-brand-700 transition shadow-sm">
                        Lihat Laporan
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
