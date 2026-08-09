@extends('layouts.app-dashboard')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Data UMKM
        </h2>

        <a href="{{ route('umkm.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah UMKM
        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>

    @endif

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama UMKM</th>
                    <th class="p-3 text-left">Pemilik</th>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left">Omzet</th>
                    <th class="p-3 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($umkms as $index => $umkm)

                    <tr class="border-t">

                        <td class="p-3">{{ $index + 1 }}</td>

                        <td class="p-3">{{ $umkm->nama_umkm }}</td>

                        <td class="p-3">{{ $umkm->pemilik }}</td>

                        <td class="p-3">{{ $umkm->kategori }}</td>

                        <td class="p-3">
                            Rp {{ number_format($umkm->omzet,0,',','.') }}
                        </td>

                        <td class="p-3">

                            <div class="flex gap-2 justify-center">

                                <a href="{{ route('umkm.edit',$umkm->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('umkm.destroy',$umkm->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Hapus data ini?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center p-6 text-gray-500">

                            Belum ada data UMKM

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
