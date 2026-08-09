<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecommendationController;

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
});

require __DIR__.'/auth.php';
