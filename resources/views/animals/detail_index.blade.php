<x-app-layout>

    <div class="py-8">

        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Detail Hewan
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Informasi lengkap mengenai data hewan.
                    </p>
                </div>

                <a href="{{ route('animals.index') }}"
                    class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 transition">

                    ← Kembali

                </a>

            </div>

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                <!-- Gambar -->

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-8">

                    <div>

                        @if($animal->image)

                            <img src="{{ asset('storage/' . $animal->image) }}"
                                class="rounded-2xl shadow w-full h-96 object-cover">

                        @else

                            <div class="h-96 rounded-2xl bg-gray-100 flex items-center justify-center">

                                <span class="text-gray-400">
                                    Tidak ada gambar
                                </span>

                            </div>

                        @endif

                    </div>

                    <!-- Informasi -->

                    <div class="lg:col-span-2">

                        <div class="grid grid-cols-2 gap-6">

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Kode Hewan
                                </label>

                                <p class="font-semibold text-lg">
                                    {{ $animal->animal_code }}
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Nama Hewan
                                </label>

                                <p class="font-semibold text-lg">
                                    {{ $animal->name }}
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Kategori
                                </label>

                                <p class="font-semibold">
                                    {{ $animal->category->name }}
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Grade
                                </label>

                                <p class="font-semibold">
                                    {{ $animal->grade->name }}
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Kandang
                                </label>

                                <p class="font-semibold">
                                    {{ $animal->cage->name }}
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Jenis Kelamin
                                </label>

                                <p class="font-semibold">
                                    {{ ucfirst($animal->gender) }}
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Berat
                                </label>

                                <p class="font-semibold">
                                    {{ $animal->weight }} Kg
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Umur
                                </label>

                                <p class="font-semibold">
                                    {{ $animal->age }} Tahun
                                </p>
                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Status
                                </label>

                                <span
                                    class="inline-flex px-3 py-1 rounded-full text-sm
                                    {{ $animal->status == 'Tersedia'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700' }}">

                                    {{ $animal->status }}

                                </span>

                            </div>

                            <div>
                                <label class="text-gray-500 text-sm">
                                    Tanggal Masuk
                                </label>

                                <p class="font-semibold">
                                    {{ \Carbon\Carbon::parse($animal->entry_date)->format('d M Y') }}
                                </p>
                            </div>

                            <div class="col-span-2">

                                <label class="text-gray-500 text-sm">

                                    Deskripsi

                                </label>

                                <div class="mt-2 p-4 rounded-xl bg-gray-50 border">

                                    {{ $animal->description }}

                                </div>

                            </div>

                            <div class="col-span-2">

                                <label class="text-gray-500 text-sm">

                                    QR Code

                                </label>

                                <div class="mt-4">

                                    @if($animal->qr_code)

                                        <img src="{{ asset('storage/'.$animal->qr_code) }}"
                                            class="w-44">

                                    @endif

                                </div>

                            </div>

                            <div>

                                <label class="text-gray-500 text-sm">

                                    Dibuat Oleh

                                </label>

                                <p class="font-semibold">

                                    {{ $animal->user->full_name }}

                                </p>

                            </div>

                            <div>

                                <label class="text-gray-500 text-sm">

                                    Dibuat Pada

                                </label>

                                <p class="font-semibold">

                                    {{ $animal->created_at->format('d M Y H:i') }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>