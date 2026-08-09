<x-guest-layout>
    <div class="mb-6 text-center">
        <a href="/" class="text-3xl font-extrabold text-blue-600 tracking-tight">DigiUMKM</a>
        <p class="text-gray-500 text-sm mt-1">Masuk untuk mengelola strategi digital usaha Anda</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full rounded-lg border-gray-300 border px-4 py-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between text-sm">
            <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                <span class="ms-2 text-gray-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                    Lupa password?
                </a>
            @endif
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-blue-600 text-white font-bold rounded-lg px-4 py-3 hover:bg-blue-700 transition shadow-md">
                Masuk
            </button>
        </div>

        <div class="text-center mt-4 text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Daftar sekarang</a>
        </div>
    </form>
</x-guest-layout>
