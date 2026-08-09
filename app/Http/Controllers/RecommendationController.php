<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Recommendation;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function generate(Request $request)
    {
        $profil = $request->all();
        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            return back()->with('error', 'API Key belum diatur!');
        }

        $prompt = "Anda adalah konsultan digitalisasi UMKM Indonesia.
        Tugas Anda memberikan rekomendasi platform digital HANYA dari daftar berikut:
        - Marketplace: Tokopedia, Shopee, Lazada, TikTok Shop
        - Media Sosial: Instagram, Facebook, WhatsApp Business
        - Pembayaran Digital: GoPay, OVO, DANA, QRIS

        Berikut adalah data UMKM klien:
        - Jenis Usaha: " . ($profil['business_type'] ?? '-') . "
        - Skala Usaha: " . ($profil['business_scale'] ?? '-') . "
        - Lokasi: " . ($profil['location'] ?? '-') . "
        - Target Pasar: " . ($profil['target_market'] ?? '-') . "
        - Anggaran per bulan: " . ($profil['monthly_budget'] ?? '-') . "
        - Tujuan Digitalisasi: " . ($profil['digitalization_goal'] ?? '-') . "

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
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'contents' => [['parts' => [['text' => $prompt]]]],
                'generationConfig' => [
                    'temperature' => 0.2,
                    'responseMimeType' => 'application/json',
                ]
            ]);

            if ($response->successful()) {
                $hasil = $response->json();
                $teksAI = $hasil['candidates'][0]['content']['parts'][0]['text'];
                $dataRekomendasi = json_decode($teksAI, true);

                // Simpan ke Database (Riwayat)
                Recommendation::create([
                    'user_id' => Auth::id(),
                    'business_type' => $profil['business_type'] ?? '-',
                    'business_scale' => $profil['business_scale'] ?? '-',
                    'location' => $profil['location'] ?? '-',
                    'target_market' => $profil['target_market'] ?? '-',
                    'monthly_budget' => $profil['monthly_budget'] ?? '-',
                    'digitalization_goal' => $profil['digitalization_goal'] ?? '-',
                    'recommendation_result' => $dataRekomendasi,
                ]);

                return view('hasil-rekomendasi', [
                    'profil' => $profil,
                    'rekomendasi' => $dataRekomendasi
                ]);
            } else {
                return back()->with('error', 'Gagal menghubungi server AI.');
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
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
