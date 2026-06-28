<section class="space-y-6">

    <div>

        <p class="text-gray-600">

            Setelah akun dihapus, seluruh data akun akan dihapus secara permanen dan tidak dapat dikembalikan.

        </p>

    </div>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-semibold transition">

        Hapus Akun

    </button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable>

        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            class="p-8">

            @csrf
            @method('DELETE')

            <h2 class="text-2xl font-bold text-gray-800">

                Hapus Akun

            </h2>

            <p class="mt-3 text-gray-600">

                Apakah Anda yakin ingin menghapus akun ini?
                Tindakan ini bersifat permanen dan seluruh data akun akan dihapus.

            </p>

            <div class="mt-6">

                <label
                    for="password"
                    class="block mb-2 font-semibold text-gray-700">

                    Password

                </label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Masukkan password..."
                    class="w-full rounded-xl border border-gray-300 bg-white text-gray-800 px-4 py-3
                    focus:border-red-500 focus:ring-2 focus:ring-red-500 focus:outline-none">

                @if($errors->userDeletion->has('password'))

                    <p class="text-red-500 text-sm mt-2">

                        {{ $errors->userDeletion->first('password') }}

                    </p>

                @endif

            </div>

            <div class="mt-8 flex justify-end gap-3">

                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-5 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                    Batal

                </button>

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold transition">

                    Ya, Hapus Akun

                </button>

            </div>

        </form>

    </x-modal>

</section>