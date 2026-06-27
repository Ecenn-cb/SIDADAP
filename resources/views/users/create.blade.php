<x-app-layout>

<div class="py-6 px-6">

    <div class="mb-6">

        <h1 class="text-3xl font-bold text-gray-800">

            Tambah User

        </h1>

        <p class="text-gray-500 mt-2">

            Tambahkan akun baru beserta role yang akan digunakan.

        </p>

    </div>

    <div class="bg-white rounded-3xl shadow p-8">

        <form
            action="{{ route('users.store') }}"
            method="POST">

            @csrf

            <!-- Nama -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Nama Lengkap

                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500">

                @error('name')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <!-- Username -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Username

                </label>

                <input
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500">

                @error('username')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <!-- Email -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500">

                @error('email')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <!-- Password -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500">

                @error('password')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <!-- Konfirmasi Password -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Konfirmasi Password

                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500">

            </div>

            <!-- Role -->

            <div class="mb-8">

                <label class="block mb-2 font-medium">

                    Role

                </label>

                <select
                    name="role"
                    class="w-full rounded-xl border-gray-300 focus:border-green-500 focus:ring-green-500">

                    <option value="">

                        -- Pilih Role --

                    </option>

                    @foreach($roles as $role)

                        <option
                            value="{{ $role->name }}"
                            {{ old('role') == $role->name ? 'selected' : '' }}>

                            {{ $role->name }}

                        </option>

                    @endforeach

                </select>

                @error('role')

                    <p class="text-red-500 text-sm mt-1">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <div class="flex gap-3">

                <a
                    href="{{ route('users.index') }}"
                    class="px-5 py-3 rounded-xl bg-gray-300 hover:bg-gray-400">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white">

                    Simpan User

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>
