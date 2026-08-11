{{-- Membungkus layouts.app supaya bisa dipakai dengan sintaks komponen <x-app-layout>,
     dipakai oleh halaman yang butuh slot "header" seperti Profil Akun. --}}
@extends('layouts.app')

@section('content')
    @isset($header)
        <div class="mb-6">
            {{ $header }}
        </div>
    @endisset

    {{ $slot }}
@endsection
