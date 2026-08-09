@extends('layouts.app-dashboard')

@section('content')

<h1 class="text-3xl font-bold mb-6">

Edit Data UMKM

</h1>

<form action="{{ route('umkm.update',$umkm->id) }}" method="POST">

@csrf
@method('PUT')

<div class="grid grid-cols-2 gap-5">

<div>
<label>Nama UMKM</label>

<input
type="text"
name="nama_umkm"
value="{{ $umkm->nama_umkm }}"
class="w-full border rounded p-2">
</div>

<div>
<label>Pemilik</label>

<input
type="text"
name="pemilik"
value="{{ $umkm->pemilik }}"
class="w-full border rounded p-2">
</div>

<div>
<label>Kategori</label>

<input
type="text"
name="kategori"
value="{{ $umkm->kategori }}"
class="w-full border rounded p-2">
</div>

<div>
<label>Telepon</label>

<input
type="text"
name="telepon"
value="{{ $umkm->telepon }}"
class="w-full border rounded p-2">
</div>

<div class="col-span-2">

<label>Alamat</label>

<textarea
name="alamat"
class="w-full border rounded p-2">{{ $umkm->alamat }}</textarea>

</div>

<div>

<label>Email</label>

<input
type="email"
name="email"
value="{{ $umkm->email }}"
class="w-full border rounded p-2">

</div>

<div>

<label>Omzet</label>

<input
type="number"
name="omzet"
value="{{ $umkm->omzet }}"
class="w-full border rounded p-2">

</div>

<div>

<label>Jumlah Karyawan</label>

<input
type="number"
name="jumlah_karyawan"
value="{{ $umkm->jumlah_karyawan }}"
class="w-full border rounded p-2">

</div>

</div>

<button
class="mt-6 bg-green-600 text-white px-5 py-2 rounded">

Update

</button>

<a href="{{ route('umkm.index') }}"
class="ml-3">

Kembali

</a>

</form>

@endsection
