@extends('layouts.app')

@section('title', 'Edit UMKM - DigiUMKM')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="mb-6">
        <a href="{{ route('umkm.index') }}" class="text-sm text-gray-500 hover:text-brand-600 transition inline-flex items-center gap-1">
            &larr; Kembali ke Data UMKM
        </a>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-3">Edit Data UMKM</h1>
        <p class="text-gray-500 mt-1">Perbarui data {{ $umkm->nama_umkm }}.</p>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('umkm.update',$umkm->id) }}" method="POST" class="p-6 sm:p-8 space-y-8">
            @csrf
            @method('PUT')

            <div>
                <h2 class="text-sm font-bold text-brand-600 uppercase tracking-wide mb-4">Data Umum</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama UMKM</label>
                        <input type="text" name="nama_umkm" value="{{ old('nama_umkm', $umkm->nama_umkm) }}" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pemilik</label>
                        <input type="text" name="pemilik" value="{{ old('pemilik', $umkm->pemilik) }}" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori', $umkm->kategori) }}" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $umkm->telepon) }}" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $umkm->email) }}" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm" required>{{ old('alamat', $umkm->alamat) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <h2 class="text-sm font-bold text-brand-600 uppercase tracking-wide mb-4">Skala Usaha</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Omzet (Rp/tahun)</label>
                        <input type="number" name="omzet" value="{{ old('omzet', $umkm->omzet) }}" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Karyawan</label>
                        <input type="number" name="jumlah_karyawan" value="{{ old('jumlah_karyawan', $umkm->jumlah_karyawan) }}" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm" required>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <h2 class="text-sm font-bold text-brand-600 uppercase tracking-wide mb-4">Status Digitalisasi</h2>
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Digital Saat Ini</label>
                    <select name="status_digital" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 bg-white shadow-sm">
                        @foreach(['Belum', 'Sebagian', 'Sudah'] as $status)
                            <option value="{{ $status }}" @selected(old('status_digital', $umkm->status_digital) == $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <label class="flex items-center gap-3 rounded-xl border border-gray-200 px-4 py-3 cursor-pointer hover:border-brand-200 hover:bg-brand-50/40 transition">
                        <input type="checkbox" name="punya_website" value="1" @checked($umkm->punya_website) class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-sm font-medium text-gray-700">Punya Website</span>
                    </label>
                    <label class="flex items-center gap-3 rounded-xl border border-gray-200 px-4 py-3 cursor-pointer hover:border-brand-200 hover:bg-brand-50/40 transition">
                        <input type="checkbox" name="punya_marketplace" value="1" @checked($umkm->punya_marketplace) class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-sm font-medium text-gray-700">Punya Marketplace</span>
                    </label>
                    <label class="flex items-center gap-3 rounded-xl border border-gray-200 px-4 py-3 cursor-pointer hover:border-brand-200 hover:bg-brand-50/40 transition">
                        <input type="checkbox" name="punya_media_sosial" value="1" @checked($umkm->punya_media_sosial) class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-sm font-medium text-gray-700">Punya Media Sosial</span>
                    </label>
                    <label class="flex items-center gap-3 rounded-xl border border-gray-200 px-4 py-3 cursor-pointer hover:border-brand-200 hover:bg-brand-50/40 transition">
                        <input type="checkbox" name="digital_payment" value="1" @checked($umkm->digital_payment) class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-sm font-medium text-gray-700">Pembayaran Digital</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex flex-wrap gap-3">
                <button type="submit" class="inline-flex items-center gap-2 bg-brand-600 text-white font-bold rounded-full px-6 py-3 hover:bg-brand-700 transition shadow-md shadow-brand-600/20">
                    Simpan Perubahan
                </button>
                <a href="{{ route('umkm.index') }}" class="inline-flex items-center gap-2 bg-white text-gray-600 border border-gray-300 font-bold rounded-full px-6 py-3 hover:bg-gray-50 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
