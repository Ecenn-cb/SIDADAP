<x-app-layout>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            <!-- Header -->

            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800">

                    Edit User

                </h1>

                <p class="text-gray-500 mt-2">

                    Perbarui informasi akun pengguna.

                </p>

            </div>

            <!-- Card -->

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <form
                    action="{{ route('users.update', $user->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="space-y-5">

                        <!-- Nama Lengkap -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Nama Lengkap

                            </label>

                            <input
                                type="text"
                                name="full_name"
                                value="{{ old('full_name', $user->full_name) }}"
                                placeholder="Masukkan nama lengkap..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                            @error('full_name')

                                <p class="text-red-500 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Username -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Username

                            </label>

                            <input
                                type="text"
                                name="username"
                                value="{{ old('username', $user->username) }}"
                                placeholder="Masukkan username..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                            @error('username')

                                <p class="text-red-500 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Email -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                placeholder="Masukkan email..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                            @error('email')

                                <p class="text-red-500 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Password -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Password Baru

                            </label>

                            <input
                                type="password"
                                name="password"
                                placeholder="Kosongkan jika tidak diubah..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                            <p class="text-sm text-gray-500 mt-2">

                                Kosongkan apabila password tidak ingin diubah.

                            </p>

                            @error('password')

                                <p class="text-red-500 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Konfirmasi Password -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Konfirmasi Password Baru

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                placeholder="Ulangi password..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                        </div>

                        <!-- Role -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Role

                            </label>

                            <select
                                name="role"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                                @foreach($roles as $role)

                                    <option
                                        value="{{ $role->name }}"
                                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>

                                        {{ $role->name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('role')

                                <p class="text-red-500 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <!-- Tombol -->

                    <div class="flex justify-end gap-3 mt-8">

                        <a
                            href="{{ route('users.index') }}"
                            class="px-6 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-semibold transition">

                            Update User

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>