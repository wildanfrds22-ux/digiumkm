<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Artisan; // <-- Tambahkan ini untuk memanggil perintah server

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profil-umkm', function () {
        return view('profil-umkm');
    })->name('profil.umkm');

    Route::post('/generate-rekomendasi', [RecommendationController::class, 'generate'])->name('rekomendasi.generate');

    // Rute Riwayat Analisis
    Route::get('/riwayat', [RecommendationController::class, 'history'])->name('riwayat.index');
    Route::get('/riwayat/{id}', [RecommendationController::class, 'show'])->name('riwayat.show');

    // Rute Profil Akun (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute Data UMKM (direktori/manajemen data UMKM)
    Route::resource('umkm', UmkmController::class);
});

// --- RUTE RAHASIA UNTUK MEMBERSIHKAN CACHE SERVER ---
Route::get('/bersihkan-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    return 'Cache server berhasil dibersihkan total! Silakan hapus /bersihkan-cache dari URL dan tekan Enter.';
});

require __DIR__.'/auth.php';
