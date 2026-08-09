<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'nama_umkm',
        'pemilik',
        'kategori',
        'alamat',
        'telepon',
        'email',

        'omzet',
        'jumlah_karyawan',

        'status_digital',
        'punya_website',
        'punya_marketplace',
        'punya_media_sosial',
        'digital_payment',

        'skor_ai',
        'rekomendasi_ai',
    ];
}
