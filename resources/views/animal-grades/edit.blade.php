<x-app-layout>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            <!-- Header -->

            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800">

                    Edit Grade Hewan

                </h1>

                <p class="text-gray-500 mt-2">

                    Perbarui informasi grade hewan.

                </p>

            </div>

            <!-- Card -->

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <form
                    action="{{ route('animal-grades.update', $animal_grade->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="space-y-5">

                        <!-- Nama Grade -->

                        <div>

                            <label class="block mb-2 font-semibold text-gray-700">

                                Nama Grade

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $animal_grade->name) }}"
                                placeholder="Masukkan nama grade..."
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
                                placeholder="Masukkan deskripsi grade..."
                                class="w-full rounded-xl border-gray-300 focus:border-[#0FA958] focus:ring-[#0FA958]">{{ old('description', $animal_grade->description) }}</textarea>

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
                            href="{{ route('animal-grades.index') }}"
                            class="px-6 py-3 rounded-xl border border-gray-300 hover:bg-gray-100 transition">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-semibold transition">

                            Update Data

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>