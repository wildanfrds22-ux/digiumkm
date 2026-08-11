@extends('layouts.app')

@section('title', 'DigiUMKM — Konsultan Digitalisasi UMKM Berbasis AI')

@section('full')

{{-- ===================== HERO ===================== --}}
<section class="bg-gradient-to-b from-brand-50 to-cream overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-20 grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-flex items-center gap-2 bg-white border border-brand-100 text-brand-700 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                🇮🇩 Solusi Digitalisasi UMKM Indonesia
            </span>
            <h1 class="mt-5 text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight tracking-tight">
                Satu Analisis AI,<br>
                Seribu Arah Digitalisasi<br>
                untuk <span class="text-brand-600">UMKM Anda</span>
            </h1>
            <p class="mt-5 text-lg text-gray-600 max-w-xl leading-relaxed">
                DigiUMKM menganalisis profil usaha Anda dan merekomendasikan platform digital, strategi, serta roadmap 30 hari yang paling sesuai — tanpa perlu trial and error.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="/profil-umkm" class="inline-flex items-center gap-2 bg-brand-600 text-white px-7 py-3.5 rounded-full font-bold hover:bg-brand-700 transition shadow-md shadow-brand-600/20">
                    Mulai Analisis Gratis
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#cara-kerja" class="inline-flex items-center gap-2 bg-white text-brand-700 border border-brand-200 px-7 py-3.5 rounded-full font-bold hover:bg-brand-50 transition shadow-sm">
                    Lihat Cara Kerja
                </a>
            </div>

            <div class="mt-10 flex flex-wrap gap-x-8 gap-y-3">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 text-base">✓</span>
                    100% Gratis Digunakan
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 text-base">✓</span>
                    Rekomendasi Personal
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center text-brand-600 text-base">✓</span>
                    Didukung Google Gemini AI
                </div>
            </div>
        </div>

        {{-- Hero visual: mockup kartu hasil rekomendasi (bukan foto, murni UI) --}}
        <div class="relative">
            <div class="absolute -top-6 -right-6 w-40 h-40 bg-gold-100 rounded-full blur-2xl opacity-70"></div>
            <div class="relative bg-white rounded-3xl shadow-xl border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide">Hasil Rekomendasi</p>
                        <p class="text-lg font-bold text-gray-900">Kuliner · Skala Mikro</p>
                    </div>
                    <span class="text-2xl">🍜</span>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center justify-between bg-brand-50 rounded-xl p-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-lg bg-brand-600 text-white flex items-center justify-center font-bold">S</span>
                            <div>
                                <p class="font-bold text-gray-800 text-sm">Shopee &amp; WhatsApp Business</p>
                                <p class="text-xs text-gray-500">Rekomendasi utama</p>
                            </div>
                        </div>
                        <span class="text-brand-600 font-extrabold text-sm">92%</span>
                    </div>
                    <div class="flex items-center justify-between border border-gray-100 rounded-xl p-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-lg bg-gold-100 text-gold-600 flex items-center justify-center font-bold">I</span>
                            <div>
                                <p class="font-bold text-gray-800 text-sm">Instagram Business</p>
                                <p class="text-xs text-gray-500">Alternatif branding</p>
                            </div>
                        </div>
                        <span class="text-gray-400 font-bold text-sm">76%</span>
                    </div>
                </div>

                <div class="mt-5 pt-5 border-t border-gray-100">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Roadmap 30 Hari</p>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div class="bg-brand-600 h-2 rounded-full" style="width: 35%"></div>
                    </div>
                    <p class="text-xs text-gray-400 mt-1.5">Langkah 3 dari 8 selesai</p>
                </div>
            </div>

            <div class="absolute -bottom-5 -left-5 bg-white rounded-2xl shadow-lg border border-gray-100 px-4 py-3 flex items-center gap-2">
                <span class="w-8 h-8 rounded-full bg-gold-500 flex items-center justify-center text-white text-sm">⚡</span>
                <div class="leading-tight">
                    <p class="text-xs font-bold text-gray-800">Rekomendasi dalam</p>
                    <p class="text-xs text-gray-500">&lt; 5 detik</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===================== PLATFORM ===================== --}}
<section id="platform" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="flex items-end justify-between mb-8 flex-wrap gap-4">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Cakupan Platform Digital</h2>
            <p class="text-gray-500 mt-1">DigiUMKM merekomendasikan dari tiga kategori platform berikut, disesuaikan profil usaha Anda.</p>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition p-7">
            <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-2xl mb-5">🛒</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Marketplace</h3>
            <p class="text-sm text-gray-500 mb-4">Kanal jual-beli untuk memperluas jangkauan pasar usaha Anda.</p>
            <div class="flex flex-wrap gap-2">
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">Tokopedia</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">Shopee</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">Lazada</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">TikTok Shop</span>
            </div>
        </div>
        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition p-7">
            <div class="w-14 h-14 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center text-2xl mb-5">📱</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Media Sosial Bisnis</h3>
            <p class="text-sm text-gray-500 mb-4">Kanal promosi dan komunikasi langsung dengan pelanggan.</p>
            <div class="flex flex-wrap gap-2">
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">Instagram</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">Facebook</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">WhatsApp Business</span>
            </div>
        </div>
        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition p-7">
            <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center text-2xl mb-5">💳</div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Pembayaran Digital</h3>
            <p class="text-sm text-gray-500 mb-4">Kemudahan transaksi non-tunai bagi pelanggan Anda.</p>
            <div class="flex flex-wrap gap-2">
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">GoPay</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">OVO</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">DANA</span>
                <span class="text-xs font-semibold bg-gray-50 text-gray-600 px-2.5 py-1 rounded-full">QRIS</span>
            </div>
        </div>
    </div>
</section>

{{-- ===================== CARA KERJA ===================== --}}
<section id="cara-kerja" class="bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex items-end justify-between mb-10 flex-wrap gap-4">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Cara Kerja DigiUMKM</h2>
                <p class="text-gray-500 mt-1">Empat langkah sederhana dari isi profil sampai eksekusi strategi.</p>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="relative bg-cream rounded-2xl p-6">
                <span class="text-4xl font-extrabold text-brand-100">01</span>
                <h3 class="text-base font-bold text-gray-900 mt-3 mb-1.5">Isi Profil UMKM</h3>
                <p class="text-sm text-gray-500">Jenis usaha, skala, lokasi, target pasar, anggaran, dan tujuan digitalisasi.</p>
            </div>
            <div class="relative bg-cream rounded-2xl p-6">
                <span class="text-4xl font-extrabold text-brand-100">02</span>
                <h3 class="text-base font-bold text-gray-900 mt-3 mb-1.5">AI Menganalisis</h3>
                <p class="text-sm text-gray-500">Google Gemini API memproses profil usaha melalui prompt terstruktur.</p>
            </div>
            <div class="relative bg-cream rounded-2xl p-6">
                <span class="text-4xl font-extrabold text-brand-100">03</span>
                <h3 class="text-base font-bold text-gray-900 mt-3 mb-1.5">Dapatkan Rekomendasi</h3>
                <p class="text-sm text-gray-500">Platform, alasan, dan estimasi biaya sesuai anggaran Anda.</p>
            </div>
            <div class="relative bg-cream rounded-2xl p-6">
                <span class="text-4xl font-extrabold text-brand-100">04</span>
                <h3 class="text-base font-bold text-gray-900 mt-3 mb-1.5">Ikuti Roadmap 30 Hari</h3>
                <p class="text-sm text-gray-500">Pantau progres langkah digitalisasi Anda di dashboard.</p>
            </div>
        </div>
    </div>
</section>

{{-- ===================== KENAPA DIGIUMKM ===================== --}}
<section id="kenapa" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="grid lg:grid-cols-3 gap-10">
        <div class="lg:col-span-1">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3">Kenapa Memilih DigiUMKM?</h2>
            <p class="text-gray-500 leading-relaxed">Kami fokus membantu Anda mengambil keputusan digitalisasi yang tepat sejak langkah pertama, tanpa biaya konsultan.</p>
        </div>
        <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="flex gap-4">
                <span class="shrink-0 w-11 h-11 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl">🎯</span>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Rekomendasi Personal</h3>
                    <p class="text-sm text-gray-500">Bukan saran generik — disesuaikan profil usaha Anda.</p>
                </div>
            </div>
            <div class="flex gap-4">
                <span class="shrink-0 w-11 h-11 rounded-xl bg-gold-50 text-gold-600 flex items-center justify-center text-xl">💸</span>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Gratis Digunakan</h3>
                    <p class="text-sm text-gray-500">Tanpa biaya konsultasi maupun langganan tersembunyi.</p>
                </div>
            </div>
            <div class="flex gap-4">
                <span class="shrink-0 w-11 h-11 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-xl">🗺️</span>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Roadmap Terstruktur</h3>
                    <p class="text-sm text-gray-500">Langkah 30 hari yang jelas dan dapat dipantau progresnya.</p>
                </div>
            </div>
            <div class="flex gap-4">
                <span class="shrink-0 w-11 h-11 rounded-xl bg-gold-50 text-gold-600 flex items-center justify-center text-xl">🔒</span>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Privasi Terjaga</h3>
                    <p class="text-sm text-gray-500">Hanya data usaha yang relevan dikirim ke sistem AI.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats bar --}}
    <div class="mt-14 bg-brand-800 rounded-3xl px-6 sm:px-10 py-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div>
            <p class="text-3xl font-extrabold text-white">3</p>
            <p class="text-xs text-brand-200 mt-1 font-medium">Kategori Platform</p>
        </div>
        <div>
            <p class="text-3xl font-extrabold text-white">30 Hari</p>
            <p class="text-xs text-brand-200 mt-1 font-medium">Roadmap Terstruktur</p>
        </div>
        <div>
            <p class="text-3xl font-extrabold text-white">100%</p>
            <p class="text-xs text-brand-200 mt-1 font-medium">Gratis Digunakan</p>
        </div>
        <div>
            <p class="text-3xl font-extrabold text-white">1 Klik</p>
            <p class="text-xs text-brand-200 mt-1 font-medium">Ekspor ke PDF</p>
        </div>
    </div>
</section>

{{-- ===================== CTA BANNER ===================== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
    <div class="relative overflow-hidden bg-brand-700 rounded-3xl px-8 sm:px-14 py-14 text-center">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(currentColor 1.5px, transparent 1.5px); background-size: 18px 18px; color: white;"></div>
        <div class="relative">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-3">Siap Digitalisasi Usaha Anda?</h2>
            <p class="text-brand-100 max-w-xl mx-auto mb-8">Isi profil UMKM Anda sekarang dan dapatkan rekomendasi strategi digitalisasi dalam hitungan detik.</p>
            <a href="/profil-umkm" class="inline-flex items-center gap-2 bg-white text-brand-700 px-8 py-3.5 rounded-full font-bold hover:bg-brand-50 transition shadow-lg">
                Mulai Analisis Sekarang
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
