<x-app-layout>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            <!-- Header -->

            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800">

                    Tambah Paket

                </h1>

                <p class="text-gray-500 mt-2">

                    Tambahkan paket aqiqah baru ke dalam sistem.

                </p>

            </div>

            <!-- Card -->

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <form
                    action="{{ route('packages.store') }}"
                    method="POST">

                    @csrf

                    <div class="space-y-5">

                        <!-- Nama Paket -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Nama Paket

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Paket A"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                            @error('name')

                                <p class="text-red-500 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Deskripsi -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Deskripsi

                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                placeholder="Masukkan deskripsi paket..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">{{ old('description') }}</textarea>

                            @error('description')

                                <p class="text-red-500 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <!-- Tombol -->

                    <div class="flex justify-end gap-3 mt-8">

                        <a
                            href="{{ route('packages.index') }}"
                            class="px-6 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-xl bg-[#0FA958] hover:bg-[#0d944f] text-white font-semibold transition">

                            Simpan Data

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>