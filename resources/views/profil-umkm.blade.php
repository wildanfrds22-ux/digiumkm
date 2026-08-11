@extends('layouts.app')

@section('title', 'Lengkapi Profil UMKM - DigiUMKM')

@section('content')
<div class="max-w-3xl mx-auto">

    <div class="mb-6 text-center">
        <span class="inline-flex items-center gap-2 bg-white border border-brand-100 text-brand-700 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
            🎯 Langkah 1 dari 2
        </span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-4">Profil Usaha Anda</h1>
        <p class="text-gray-500 mt-2 max-w-lg mx-auto">Isi data di bawah ini agar AI kami dapat menganalisis dan memberikan rekomendasi strategi digitalisasi yang tepat.</p>
    </div>

    @if ($errors->any())
        <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-5 py-3 rounded-2xl text-sm">
            <p class="font-bold mb-1">Mohon periksa kembali isian Anda:</p>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('rekomendasi.generate') }}" method="POST" class="p-6 sm:p-8 space-y-8">
            @csrf

            <!-- Grup: Data Usaha -->
            <div>
                <h2 class="text-sm font-bold text-brand-600 uppercase tracking-wide mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-brand-50 flex items-center justify-center text-xs">🏪</span>
                    Data Usaha
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Usaha</label>
                        <select name="business_type" required class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 bg-white shadow-sm @error('business_type') border-red-400 @enderror">
                            <option value="">Pilih Kategori...</option>
                            <option value="Kuliner / Makanan & Minuman" @selected(old('business_type') == 'Kuliner / Makanan & Minuman')>Kuliner (Makanan & Minuman)</option>
                            <option value="Fashion & Pakaian" @selected(old('business_type') == 'Fashion & Pakaian')>Fashion & Pakaian</option>
                            <option value="Kriya & Kerajinan" @selected(old('business_type') == 'Kriya & Kerajinan')>Kriya & Kerajinan</option>
                            <option value="Jasa" @selected(old('business_type') == 'Jasa')>Jasa / Layanan</option>
                            <option value="Ritel/Toko Kelontong" @selected(old('business_type') == 'Ritel/Toko Kelontong')>Ritel / Toko Kelontong</option>
                            <option value="Lainnya" @selected(old('business_type') == 'Lainnya')>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Skala Usaha</label>
                        <select name="business_scale" required class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 bg-white shadow-sm @error('business_scale') border-red-400 @enderror">
                            <option value="">Pilih Skala...</option>
                            <option value="Mikro" @selected(old('business_scale') == 'Mikro')>Usaha Mikro (Omzet &lt; Rp300 juta/tahun)</option>
                            <option value="Kecil" @selected(old('business_scale') == 'Kecil')>Usaha Kecil (Omzet Rp300 juta - 2,5 miliar/tahun)</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Usaha</label>
                        <input type="text" name="location" required value="{{ old('location') }}" placeholder="Contoh: Jawa Timur" class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 shadow-sm @error('location') border-red-400 @enderror">
                    </div>
                </div>
            </div>

            <!-- Grup: Target & Anggaran -->
            <div class="pt-6 border-t border-gray-100">
                <h2 class="text-sm font-bold text-brand-600 uppercase tracking-wide mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-brand-50 flex items-center justify-center text-xs">🎯</span>
                    Target &amp; Anggaran
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Target Pasar Utama</label>
                        <select name="target_market" required class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 bg-white shadow-sm @error('target_market') border-red-400 @enderror">
                            <option value="">Pilih Target...</option>
                            <option value="Lokal" @selected(old('target_market') == 'Lokal')>Lokal (Kota/Kabupaten)</option>
                            <option value="Nasional" @selected(old('target_market') == 'Nasional')>Nasional (Seluruh Indonesia)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Anggaran Digitalisasi (Per Bulan)</label>
                        <select name="monthly_budget" required class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 bg-white shadow-sm @error('monthly_budget') border-red-400 @enderror">
                            <option value="">Pilih Anggaran...</option>
                            <option value="Rp50.000 - Rp200.000" @selected(old('monthly_budget') == 'Rp50.000 - Rp200.000')>Rp50.000 - Rp200.000</option>
                            <option value="Rp200.000 - Rp500.000" @selected(old('monthly_budget') == 'Rp200.000 - Rp500.000')>Rp200.000 - Rp500.000</option>
                            <option value="> Rp500.000" @selected(old('monthly_budget') == '> Rp500.000')>Lebih dari Rp500.000</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Grup: Tujuan -->
            <div class="pt-6 border-t border-gray-100">
                <h2 class="text-sm font-bold text-brand-600 uppercase tracking-wide mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-brand-50 flex items-center justify-center text-xs">🚀</span>
                    Tujuan Digitalisasi
                </h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tujuan Utama Go Digital</label>
                    <select name="digitalization_goal" required class="w-full rounded-xl border-gray-300 border px-4 py-2.5 focus:ring-brand-500 focus:border-brand-500 bg-white shadow-sm @error('digitalization_goal') border-red-400 @enderror">
                        <option value="">Pilih Tujuan...</option>
                        <option value="Meningkatkan penjualan" @selected(old('digitalization_goal') == 'Meningkatkan penjualan')>Meningkatkan Penjualan</option>
                        <option value="Memperluas Jangkauan" @selected(old('digitalization_goal') == 'Memperluas Jangkauan')>Memperluas Jangkauan Promosi</option>
                        <option value="Mempermudah Pembayaran" @selected(old('digitalization_goal') == 'Mempermudah Pembayaran')>Mempermudah Pembayaran</option>
                    </select>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-brand-600 text-white font-bold rounded-full px-4 py-3.5 hover:bg-brand-700 transition shadow-md shadow-brand-600/20">
                    Analisis Profil Menggunakan AI
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </button>
                <p class="text-center text-xs text-gray-400 mt-3">Rekomendasi biasanya siap dalam &lt; 5 detik.</p>
            </div>
        </form>
    </div>
</div>
@endsection
