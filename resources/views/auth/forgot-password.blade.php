<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-extrabold text-gray-900">Lupa Password?</h1>
        <p class="text-gray-500 text-sm mt-1">Masukkan email Anda, kami akan kirimkan tautan untuk membuat password baru.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center">
                Kirim Tautan Reset Password
            </x-primary-button>
        </div>

        <div class="text-center mt-2 text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-brand-600 font-bold hover:underline">&larr; Kembali ke halaman masuk</a>
        </div>
    </form>
</x-guest-layout>
