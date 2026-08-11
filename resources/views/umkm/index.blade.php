@extends('layouts.app')

@section('title', 'Data UMKM - DigiUMKM')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <div class="flex flex-wrap justify-between items-center gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Data UMKM</h1>
            <p class="text-gray-500 mt-1">Direktori data UMKM yang tercatat dalam sistem.</p>
        </div>
        <a href="{{ route('umkm.create') }}" class="inline-flex items-center gap-2 bg-brand-600 text-white font-bold rounded-full px-5 py-2.5 hover:bg-brand-700 transition shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah UMKM
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-brand-50">
                    <tr>
                        <th class="p-4 text-left font-bold text-brand-700">No</th>
                        <th class="p-4 text-left font-bold text-brand-700">Nama UMKM</th>
                        <th class="p-4 text-left font-bold text-brand-700">Pemilik</th>
                        <th class="p-4 text-left font-bold text-brand-700">Kategori</th>
                        <th class="p-4 text-left font-bold text-brand-700">Status Digital</th>
                        <th class="p-4 text-left font-bold text-brand-700">Omzet</th>
                        <th class="p-4 text-center font-bold text-brand-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($umkms as $index => $umkm)
                        <tr class="hover:bg-brand-50/40 transition">
                            <td class="p-4 text-gray-500">{{ $index + 1 }}</td>
                            <td class="p-4 font-semibold text-gray-900">{{ $umkm->nama_umkm }}</td>
                            <td class="p-4 text-gray-600">{{ $umkm->pemilik }}</td>
                            <td class="p-4 text-gray-600">{{ $umkm->kategori }}</td>
                            <td class="p-4">
                                @php
                                    $badge = match($umkm->status_digital) {
                                        'Sudah' => 'bg-brand-100 text-brand-800',
                                        'Sebagian' => 'bg-gold-100 text-gold-600',
                                        default => 'bg-gray-100 text-gray-500',
                                    };
                                @endphp
                                <span class="inline-block text-xs px-2.5 py-1 rounded-full font-bold {{ $badge }}">
                                    {{ $umkm->status_digital }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-600">Rp {{ number_format($umkm->omzet,0,',','.') }}</td>
                            <td class="p-4">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('umkm.edit',$umkm->id) }}"
                                       class="bg-gold-50 text-gold-600 hover:bg-gold-100 px-3 py-1.5 rounded-full font-semibold text-xs transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('umkm.destroy',$umkm->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1.5 rounded-full font-semibold text-xs transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-12">
                                <span class="inline-flex w-14 h-14 rounded-full bg-brand-50 items-center justify-center text-2xl mb-3">🏪</span>
                                <p class="text-gray-500">Belum ada data UMKM.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
