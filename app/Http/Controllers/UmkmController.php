<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::latest()->get();

        return view('umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'pemilik' => 'required',
            'kategori' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'nullable|email',
            'omzet' => 'required|numeric',
            'jumlah_karyawan' => 'required|numeric',
            'status_digital' => 'required',
        ]);

        Umkm::create([
            'nama_umkm' => $request->nama_umkm,
            'pemilik' => $request->pemilik,
            'kategori' => $request->kategori,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'omzet' => $request->omzet,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'status_digital' => $request->status_digital,

            'punya_website' => $request->has('punya_website'),
            'punya_marketplace' => $request->has('punya_marketplace'),
            'punya_media_sosial' => $request->has('punya_media_sosial'),
            'digital_payment' => $request->has('digital_payment'),

            'skor_ai' => 0,
            'rekomendasi_ai' => null,
        ]);

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil ditambahkan.');
    }

    public function show(Umkm $umkm)
    {
        //
    }

    public function edit(Umkm $umkm)
    {
        return view('umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'pemilik' => 'required',
            'kategori' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'nullable|email',
            'omzet' => 'required|numeric',
            'jumlah_karyawan' => 'required|numeric',
            'status_digital' => 'required',
        ]);

        $umkm->update([
            'nama_umkm' => $request->nama_umkm,
            'pemilik' => $request->pemilik,
            'kategori' => $request->kategori,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'omzet' => $request->omzet,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'status_digital' => $request->status_digital,

            'punya_website' => $request->has('punya_website'),
            'punya_marketplace' => $request->has('punya_marketplace'),
            'punya_media_sosial' => $request->has('punya_media_sosial'),
            'digital_payment' => $request->has('digital_payment'),
        ]);

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil diperbarui.');
    }

    public function destroy(Umkm $umkm)
    {
        $umkm->delete();

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil dihapus.');
    }
}
