<x-app-layout>

    <div class="py-8 px-6">

        <div class="max-w-3xl mx-auto">

            <!-- Header -->
            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800">
                    Tambah Pengumuman
                </h1>

                <p class="text-gray-500 mt-2">
                    Tambahkan berita atau informasi terbaru untuk ditampilkan kepada masyarakat.
                </p>

            </div>


            <!-- Card -->
            <div class="bg-white rounded-3xl shadow-lg p-8">

                <form
                    action="{{ route('announcements.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf


                    <div class="space-y-6">


                        <!-- Judul -->
                        <div>

                            <label
                                for="title"
                                class="block mb-2 font-semibold text-gray-700">

                                Judul Pengumuman

                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="Masukkan judul pengumuman..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]"
                                required>

                            @error('title')

                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <!-- Deskripsi -->
                        <div>

                            <label
                                for="description"
                                class="block mb-2 font-semibold text-gray-700">

                                Deskripsi

                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="7"
                                placeholder="Masukkan isi pengumuman..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]"
                                required>{{ old('description') }}</textarea>

                            @error('description')

                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <!-- Gambar -->
                        <div>

                            <label
                                for="image"
                                class="block mb-2 font-semibold text-gray-700">

                                Gambar Pengumuman

                            </label>

                            <input
                                type="file"
                                id="image"
                                name="image"
                                accept="image/jpeg,image/png,image/jpg"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3
                                       focus:border-[#0FA958] focus:ring-[#0FA958]">

                            <p class="text-sm text-gray-500 mt-2">
                                Format: JPG, JPEG, PNG. Maksimal 2 MB.
                            </p>

                            @error('image')

                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <!-- Status -->
                        <div>

                            <label
                                for="status"
                                class="block mb-2 font-semibold text-gray-700">

                                Status

                            </label>

                            <select
                                id="status"
                                name="status"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]"
                                required>

                                <option
                                    value="Active"
                                    {{ old('status', 'Active') == 'Active' ? 'selected' : '' }}>

                                    Active

                                </option>

                                <option
                                    value="Inactive"
                                    {{ old('status') == 'Inactive' ? 'selected' : '' }}>

                                    Inactive

                                </option>

                            </select>

                            @error('status')

                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>


                    <!-- Tombol -->
                    <div class="flex justify-end gap-3 mt-8">

                        <a
                            href="{{ route('announcements.index') }}"
                            class="px-6 py-3 rounded-xl border border-gray-300
                                   text-gray-700 hover:bg-gray-100 transition">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-xl bg-[#0FA958]
                                   hover:bg-[#0d944f] text-white
                                   font-semibold transition">

                            Simpan Pengumuman

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>