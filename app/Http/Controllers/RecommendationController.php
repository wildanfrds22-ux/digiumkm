<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Recommendation;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function generate(Request $request)
    {
        // Validasi input — memastikan seluruh data profil UMKM terisi
        // sebelum dikirim ke AI. Jika gagal, Laravel otomatis redirect
        // kembali ke form dengan pesan error dan mengembalikan input lama.
        $profil = $request->validate([
            'business_type' => 'required|string|max:100',
            'business_scale' => 'required|string|max:50',
            'location' => 'required|string|max:100',
            'target_market' => 'required|string|max:50',
            'monthly_budget' => 'required|string|max:50',
            'digitalization_goal' => 'required|string|max:100',
        ], [
            'required' => 'Kolom ini wajib diisi.',
        ]);

        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            Log::error('DigiUMKM: GEMINI_API_KEY belum diatur di environment.');
            return back()->withInput()->with('error', 'Sistem AI belum dikonfigurasi (API Key belum diatur). Silakan hubungi admin.');
        }

        $prompt = "Anda adalah konsultan digitalisasi UMKM Indonesia.
        Tugas Anda memberikan rekomendasi platform digital HANYA dari daftar berikut:
        - Marketplace: Tokopedia, Shopee, Lazada, TikTok Shop
        - Media Sosial: Instagram, Facebook, WhatsApp Business
        - Pembayaran Digital: GoPay, OVO, DANA, QRIS

        Berikut adalah data UMKM klien:
        - Jenis Usaha: " . $profil['business_type'] . "
        - Skala Usaha: " . $profil['business_scale'] . "
        - Lokasi: " . $profil['location'] . "
        - Target Pasar: " . $profil['target_market'] . "
        - Anggaran per bulan: " . $profil['monthly_budget'] . "
        - Tujuan Digitalisasi: " . $profil['digitalization_goal'] . "

        Berikan estimasi biaya yang masuk akal dan TIDAK melebihi anggaran per bulan.

        KEMBALIKAN HANYA FORMAT JSON YANG VALID sesuai skema di bawah ini, tanpa awalan/akhiran apapun (tanpa markdown backtick):
        {
            \"rekomendasi_utama\": [
                {
                    \"platform\": \"Nama Platform\",
                    \"kategori\": \"Kategori Platform\",
                    \"match_score\": 95,
                    \"alasan\": \"Alasan spesifik sesuai profil\",
                    \"estimasi_biaya\": \"Rp...\"
                }
            ],
            \"strategi\": \"Penjelasan strategi keseluruhan yang harus dilakukan...\",
            \"roadmap\": [
                {
                    \"hari\": \"1-7\",
                    \"judul\": \"Judul Langkah\",
                    \"deskripsi\": \"Deskripsi detail langkah eksekusi\"
                }
            ]
        }";

        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key=' . $apiKey;

        try {
            $response = Http::timeout(30)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'contents' => [['parts' => [['text' => $prompt]]]],
                'generationConfig' => [
                    'temperature' => 0.2,
                    'responseMimeType' => 'application/json',
                ]
            ]);

            if (!$response->successful()) {
                Log::error('DigiUMKM: Gemini API request gagal.', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return back()->withInput()->with('error', 'Gagal menghubungi server AI (status ' . $response->status() . '). Silakan coba lagi dalam beberapa saat.');
            }

            $hasil = $response->json();
            $teksAI = $hasil['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$teksAI) {
                Log::error('DigiUMKM: Respons Gemini tidak memiliki teks konten.', ['response' => $hasil]);
                return back()->withInput()->with('error', 'AI tidak memberikan respons yang valid. Kemungkinan permintaan diblokir filter keamanan AI. Silakan coba ubah data profil dan kirim ulang.');
            }

            $dataRekomendasi = json_decode($teksAI, true);

            if (json_last_error() !== JSON_ERROR_NONE || !isset($dataRekomendasi['rekomendasi_utama'])) {
                Log::error('DigiUMKM: Gagal parsing JSON dari respons Gemini.', ['raw' => $teksAI]);
                return back()->withInput()->with('error', 'Format hasil dari AI tidak sesuai. Silakan coba kirim ulang analisis Anda.');
            }

            // Simpan ke Database (Riwayat)
            Recommendation::create([
                'user_id' => Auth::id(),
                'business_type' => $profil['business_type'],
                'business_scale' => $profil['business_scale'],
                'location' => $profil['location'],
                'target_market' => $profil['target_market'],
                'monthly_budget' => $profil['monthly_budget'],
                'digitalization_goal' => $profil['digitalization_goal'],
                'recommendation_result' => $dataRekomendasi,
            ]);

            return view('hasil-rekomendasi', [
                'profil' => $profil,
                'rekomendasi' => $dataRekomendasi
            ]);

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('DigiUMKM: Koneksi ke Gemini API timeout/gagal.', ['message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Koneksi ke server AI gagal atau terlalu lama. Periksa koneksi internet Anda dan coba lagi.');
        } catch (\Exception $e) {
            Log::error('DigiUMKM: Kesalahan sistem tak terduga.', ['message' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi. Jika masalah berlanjut, hubungi admin.');
        }
    }

    public function history()
    {
        $histories = Recommendation::where('user_id', Auth::id())->latest()->get();
        return view('riwayat', compact('histories'));
    }

    public function show($id)
    {
        $recommendation = Recommendation::where('user_id', Auth::id())->findOrFail($id);
        return view('hasil-rekomendasi', [
            'profil' => [
                'business_type' => $recommendation->business_type,
                'business_scale' => $recommendation->business_scale,
                'location' => $recommendation->location,
                'target_market' => $recommendation->target_market,
                'monthly_budget' => $recommendation->monthly_budget,
                'digitalization_goal' => $recommendation->digitalization_goal,
            ],
            'rekomendasi' => $recommendation->recommendation_result
        ]);
    }
}
