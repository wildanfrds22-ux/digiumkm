@extends('layouts.app')

@section('title', 'Lengkapi Profil UMKM - DigiUMKM')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-8 border-b border-gray-200 bg-blue-50">
            <h2 class="text-2xl font-bold text-gray-800">Profil Usaha Anda</h2>
            <p class="text-gray-600 mt-1">Isi data di bawah ini agar AI kami dapat menganalisis dan memberikan rekomendasi strategi digitalisasi yang tepat[cite: 1].</p>
        </div>

        <form action="{{ route('rekomendasi.generate') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Jenis Usaha -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Usaha</label>
                    <select name="business_type" class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-sm">
                        <option value="">Pilih Kategori...</option>
                        <option value="Kuliner / Makanan & Minuman">Kuliner (Makanan & Minuman)</option>
                        <option value="Fashion & Pakaian">Fashion & Pakaian</option>
                        <option value="Kriya & Kerajinan">Kriya & Kerajinan</option>
                        <option value="Jasa">Jasa / Layanan</option>
                        <option value="Ritel/Toko Kelontong">Ritel / Toko Kelontong</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Skala Usaha -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Skala Usaha</label>
                    <select name="business_scale" class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-sm">
                        <option value="">Pilih Skala...</option>
                        <option value="Mikro">Usaha Mikro (Omzet < Rp300 juta/tahun)</option>
                        <option value="Kecil">Usaha Kecil (Omzet Rp300 juta - 2,5 miliar/tahun)</option>
                    </select>
                </div>

                <!-- Lokasi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Usaha</label>
                    <input type="text" name="location" placeholder="Contoh: Jawa Timur" class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                </div>

                <!-- Target Pasar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Target Pasar Utama</label>
                    <select name="target_market" class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-sm">
                        <option value="">Pilih Target...</option>
                        <option value="Lokal">Lokal (Kota/Kabupaten)</option>
                        <option value="Nasional">Nasional (Seluruh Indonesia)</option>
                    </select>
                </div>

                <!-- Anggaran Digitalisasi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Anggaran Digitalisasi (Per Bulan)</label>
                    <select name="monthly_budget" class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-sm">
                        <option value="">Pilih Anggaran...</option>
                        <option value="Rp50.000 - Rp200.000">Rp50.000 - Rp200.000</option>
                        <option value="Rp200.000 - Rp500.000">Rp200.000 - Rp500.000</option>
                        <option value="> Rp500.000">Lebih dari Rp500.000</option>
                    </select>
                </div>

                <!-- Tujuan Utama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tujuan Utama Go Digital</label>
                    <select name="digitalization_goal" class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-sm">
                        <option value="">Pilih Tujuan...</option>
                        <option value="Meningkatkan penjualan">Meningkatkan Penjualan</option>
                        <option value="Memperluas Jangkauan">Memperluas Jangkauan Promosi</option>
                        <option value="Mempermudah Pembayaran">Mempermudah Pembayaran</option>
                    </select>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-200">
                <button type="submit" class="w-full bg-blue-600 text-white font-bold rounded-lg px-4 py-3 hover:bg-blue-700 transition shadow-md">
                    Analisis Profil Menggunakan AI
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
