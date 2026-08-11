<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-extrabold text-gray-900">Verifikasi Email Anda</h1>
        <p class="text-gray-500 text-sm mt-1">Terima kasih sudah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan. Belum menerima emailnya? Kami akan kirimkan lagi.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-brand-700 bg-brand-50 border border-brand-100 rounded-lg px-4 py-3">
            Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.
        </div>
    @endif

    <div class="flex items-center justify-between gap-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                Kirim Ulang Email Verifikasi
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-500 hover:text-brand-600 transition font-medium">
                Keluar
            </button>
        </form>
    </div>
</x-guest-layout>
