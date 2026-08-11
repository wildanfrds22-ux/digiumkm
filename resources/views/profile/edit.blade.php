<x-app-layout>
    <x-slot name="header">
        <div class="text-center max-w-2xl mx-auto">
            <span class="inline-flex items-center gap-2 bg-white border border-brand-100 text-brand-700 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                ⚙️ Pengaturan Akun
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-4">Profil Akun</h1>
            <p class="text-gray-500 mt-2">Kelola informasi akun dan keamanan akun Anda.</p>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto space-y-6">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-red-100 p-6 sm:p-8">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
