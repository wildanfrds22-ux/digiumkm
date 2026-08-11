<section class="space-y-5">
    <header>
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="w-8 h-8 rounded-lg bg-red-50 text-red-600 flex items-center justify-center text-sm">⚠️</span>
            Hapus Akun
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            Setelah akun dihapus, seluruh data Anda (termasuk riwayat analisis) akan dihapus permanen. Unduh data yang ingin Anda simpan sebelum melanjutkan.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Hapus Akun</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-gray-900">
                Yakin ingin menghapus akun Anda?
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Setelah akun dihapus, seluruh data akan dihapus permanen. Masukkan password Anda untuk konfirmasi.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Password" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Password"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Batal
                </x-secondary-button>

                <x-danger-button>
                    Hapus Akun
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
