<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-extrabold text-gray-900">Konfirmasi Password</h1>
        <p class="text-gray-500 text-sm mt-1">Ini adalah area aman aplikasi. Mohon konfirmasi password Anda sebelum melanjutkan.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" class="block w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center">
                Konfirmasi
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
