<section>

    <form
        method="POST"
        action="{{ route('password.update') }}"
        class="space-y-6">

        @csrf
        @method('PUT')

        <!-- Password Lama -->

        <div>

            <label
                for="update_password_current_password"
                class="block mb-2 font-semibold text-gray-700">

                Password Lama

            </label>

            <input
                id="update_password_current_password"
                type="password"
                name="current_password"
                autocomplete="current-password"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white text-gray-800
                focus:border-[#0FA958] focus:ring-2 focus:ring-[#0FA958] focus:outline-none">

            @error('current_password','updatePassword')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror

        </div>

        <!-- Password Baru -->

        <div>

            <label
                for="update_password_password"
                class="block mb-2 font-semibold text-gray-700">

                Password Baru

            </label>

            <input
                id="update_password_password"
                type="password"
                name="password"
                autocomplete="new-password"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white text-gray-800
                focus:border-[#0FA958] focus:ring-2 focus:ring-[#0FA958] focus:outline-none">

            @error('password','updatePassword')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror

        </div>

        <!-- Konfirmasi Password -->

        <div>

            <label
                for="update_password_password_confirmation"
                class="block mb-2 font-semibold text-gray-700">

                Konfirmasi Password Baru

            </label>

            <input
                id="update_password_password_confirmation"
                type="password"
                name="password_confirmation"
                autocomplete="new-password"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white text-gray-800
                focus:border-[#0FA958] focus:ring-2 focus:ring-[#0FA958] focus:outline-none">

            @error('password_confirmation','updatePassword')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror

        </div>

        <div class="flex justify-end gap-3">

            @if (session('status') === 'password-updated')

                <span class="self-center text-green-600 font-medium">

                    Password berhasil diperbarui.

                </span>

            @endif

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-[#0FA958] hover:bg-[#0d944f] text-white font-semibold transition">

                Simpan Perubahan

            </button>

        </div>

    </form>

</section>