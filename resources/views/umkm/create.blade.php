@extends('layouts.app-dashboard')

@section('content')

<div class="max-w-5xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">
        Tambah UMKM
    </h2>

    <form action="{{ route('umkm.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label>Nama UMKM</label>
                <input type="text" name="nama_umkm" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Pemilik</label>
                <input type="text" name="pemilik" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Kategori</label>
                <input type="text" name="kategori" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Telepon</label>
                <input type="text" name="telepon" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" class="w-full border rounded p-2">
            </div>

            <div>
                <label>Omzet</label>
                <input type="number" name="omzet" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Jumlah Karyawan</label>
                <input type="number" name="jumlah_karyawan" class="w-full border rounded p-2" value="1">
            </div>

            <div>
                <label>Status Digital</label>

                <select name="status_digital" class="w-full border rounded p-2">
                    <option value="Belum">Belum</option>
                    <option value="Sebagian">Sebagian</option>
                    <option value="Sudah">Sudah</option>
                </select>

            </div>

        </div>

        <div class="mt-4">

            <label>Alamat</label>

            <textarea
                name="alamat"
                rows="4"
                class="w-full border rounded p-2"
                required></textarea>

        </div>

        <div class="mt-8 flex gap-3">

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">

                Simpan Data

            </button>

            <a
                href="{{ route('umkm.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection
