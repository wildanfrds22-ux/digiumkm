<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {

            $table->id();

            // Data UMKM
            $table->string('nama_umkm');
            $table->string('pemilik');
            $table->string('kategori');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email')->nullable();

            // Data Usaha
            $table->decimal('omzet', 15, 2)->default(0);
            $table->integer('jumlah_karyawan')->default(1);

            // Digitalisasi
            $table->enum('status_digital', [
                'Belum',
                'Sebagian',
                'Sudah'
            ])->default('Belum');

            $table->boolean('punya_website')->default(false);
            $table->boolean('punya_marketplace')->default(false);
            $table->boolean('punya_media_sosial')->default(false);
            $table->boolean('digital_payment')->default(false);

            // AI Recommendation
            $table->integer('skor_ai')->nullable();
            $table->text('rekomendasi_ai')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
