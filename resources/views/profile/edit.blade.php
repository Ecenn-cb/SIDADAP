<x-app-layout>

    <div class="py-8">

        <div class="max-w-5xl mx-auto">

            <!-- Header -->

            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800">

                    Profil Saya

                </h1>

                <p class="text-gray-500 mt-2">

                    Kelola informasi akun, password, dan keamanan akun Anda.

                </p>

            </div>

            <!-- Informasi Profil -->

            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">

                @include('profile.partials.update-profile-information-form')

            </div>

            <!-- Password -->

            <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">

                <h2 class="text-2xl font-semibold text-gray-800 mb-2">

                    Ubah Password

                </h2>

                <p class="text-gray-500 mb-6">

                    Gunakan password yang kuat agar akun tetap aman.

                </p>

                @include('profile.partials.update-password-form')

            </div>

            <!-- Delete Account -->

            <div class="bg-white rounded-3xl shadow-lg border border-red-200 p-8">

                <h2 class="text-2xl font-semibold text-red-600 mb-2">

                    Hapus Akun

                </h2>

                <p class="text-gray-500 mb-6">

                    Tindakan ini bersifat permanen dan tidak dapat dibatalkan.

                </p>

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </div>

</x-app-layout>