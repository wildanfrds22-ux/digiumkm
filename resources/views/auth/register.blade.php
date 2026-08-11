<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-extrabold text-gray-900">Buat Akun Baru</h1>
        <p class="text-gray-500 text-sm mt-1">Mulai mendigitalisasi usaha Anda, gratis</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-brand-500 focus:border-brand-500 shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-brand-500 focus:border-brand-500 shadow-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-brand-500 focus:border-brand-500 shadow-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-brand-500 focus:border-brand-500 shadow-sm">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-brand-600 text-white font-bold rounded-lg px-4 py-3 hover:bg-brand-700 transition shadow-md">
                Daftar
            </button>
        </div>

        <div class="text-center mt-4 text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-brand-600 font-bold hover:underline">Masuk di sini</a>
        </div>
    </form>
</x-guest-layout>
