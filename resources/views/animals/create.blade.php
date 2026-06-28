<x-app-layout>

    <div class="py-8">

        <div class="max-w-4xl mx-auto">

            <!-- Header -->

            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800">
                    Tambah Hewan
                </h1>

                <p class="text-gray-500 mt-2">
                    Tambahkan data hewan baru ke dalam sistem Teman Aqiqah.
                </p>

            </div>

            <!-- Card -->

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <form
                    action="{{ route('animals.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="space-y-5">

                        <!-- Nama Hewan -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Nama Hewan
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </div>

                        <!-- Kategori -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Grade -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Grade
                            </label>

                            <select
                                name="grade_id"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                                @foreach($grades as $grade)

                                    <option
                                        value="{{ $grade->id }}"
                                        {{ old('grade_id') == $grade->id ? 'selected' : '' }}>

                                        {{ $grade->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Kandang -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Kandang
                            </label>

                            <select
                                name="cage_id"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                                @foreach($cages as $cage)

                                    <option
                                        value="{{ $cage->id }}"
                                        {{ old('cage_id') == $cage->id ? 'selected' : '' }}>

                                        {{ $cage->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Gender -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Gender
                            </label>

                            <select
                                name="gender"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>

                        </div>

                        <!-- Berat -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Berat (Kg)
                            </label>

                            <input
                                type="number"
                                name="weight"
                                value="{{ old('weight') }}"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                        </div>

                        <!-- Umur -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Umur (Tahun)
                            </label>

                            <input
                                type="number"
                                name="age"
                                value="{{ old('age') }}"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                        </div>

                        <!-- Tanggal Masuk -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Tanggal Masuk
                            </label>

                            <input
                                type="date"
                                name="entry_date"
                                value="{{ old('entry_date') }}"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                        </div>

                        <!-- Status -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">

                                <option value="available">Available</option>
                                <option value="reserved">Reserved</option>
                                <option value="sold">Sold</option>

                            </select>

                        </div>

                        <!-- Foto -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Foto Hewan
                            </label>

                            <input
                                type="file"
                                name="image"
                                class="w-full rounded-xl border-gray-300">

                        </div>

                        <!-- Deskripsi -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">{{ old('description') }}</textarea>

                        </div>

                    </div>

                    <!-- Tombol -->

                    <div class="flex justify-end gap-3 mt-8">

                        <a
                            href="{{ route('animals.index') }}"
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