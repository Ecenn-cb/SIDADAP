<section>

    <header class="mb-8">

        <h2 class="text-2xl font-semibold text-gray-800">

            Informasi Profil

        </h2>

        <p class="mt-2 text-gray-500">

            Perbarui informasi akun Anda.

        </p>

    </header>

    <form
        id="send-verification"
        method="POST"
        action="{{ route('verification.send') }}">

        @csrf

    </form>

    <form
        method="POST"
        action="{{ route('profile.update') }}"
        class="space-y-6">

        @csrf
        @method('PATCH')

        <!-- Nama -->

        <div>

            <label class="block mb-2 font-semibold text-gray-700">

                Nama Lengkap

            </label>

            <input
                type="text"
                name="full_name"
                value="{{ old('full_name', $user->full_name) }}"
                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

            @error('full_name')

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
                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

            @error('email')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

            @enderror

        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div class="rounded-xl bg-yellow-50 border border-yellow-200 p-4">

                <p class="text-sm text-yellow-700">

                    Email Anda belum diverifikasi.

                </p>

                <button
                    form="send-verification"
                    class="mt-3 text-[#0FA958] font-semibold hover:underline">

                    Kirim Ulang Email Verifikasi

                </button>

                @if (session('status') === 'verification-link-sent')

                    <p class="mt-3 text-green-600 font-medium">

                        Link verifikasi berhasil dikirim.

                    </p>

                @endif

            </div>

        @endif

        <div class="flex justify-end gap-3">

            @if(session('status') === 'profile-updated')

                <span class="self-center text-green-600">

                    Berhasil disimpan.

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