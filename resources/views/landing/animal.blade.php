<section
    id="animal"
    class="py-28 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Heading -->

        <div class="text-center max-w-3xl mx-auto">

            <span
                class="bg-green-100 text-[#0FA958] px-5 py-2 rounded-full font-semibold">

                Hewan Tersedia

            </span>

            <h2
                class="text-5xl font-black mt-8 text-gray-800">

                Pilih Hewan
                Terbaik Anda

            </h2>

            <p
                class="mt-6 text-gray-500 leading-8">

                Seluruh hewan dirawat dengan baik,
                dipantau kesehatannya,
                dan siap digunakan
                untuk kebutuhan aqiqah.

            </p>

        </div>

        <!-- Card -->

        <div
            class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 mt-20">

            @forelse($animals as $animal)

            <div
                class="bg-white rounded-[35px] shadow-lg overflow-hidden hover:-translate-y-2 duration-300">

                <!-- Foto -->

                <div class="h-72 overflow-hidden">

                    @if($animal->image)

                        <img
                            src="{{ asset('storage/'.$animal->image) }}"
                            class="w-full h-full object-cover hover:scale-110 duration-500">

                    @else

                        <img
                            src="{{ asset('assets/images/no-image.png') }}"
                            class="w-full h-full object-cover">

                    @endif

                </div>

                <!-- Body -->

                <div class="p-7">

                    <div
                        class="flex justify-between items-center">

                        <div>

                            <h3
                                class="text-2xl font-bold">

                                {{ $animal->name }}

                            </h3>

                            <p
                                class="text-gray-500">

                                {{ $animal->category->name }}

                            </p>

                        </div>

                        @if($animal->status == 'Available')

                            <span
                                class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">

                                Tersedia

                            </span>

                        @else

                            <span
                                class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm">

                                Tidak Tersedia

                            </span>

                        @endif

                    </div>

                    <!-- Informasi -->

                    <div
                        class="grid grid-cols-2 gap-4 mt-8">

                        <div
                            class="bg-gray-50 rounded-2xl p-4">

                            <p
                                class="text-sm text-gray-500">

                                Berat

                            </p>

                            <h4
                                class="font-bold mt-2">

                                {{ $animal->weight }} Kg

                            </h4>

                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-4">

                            <p
                                class="text-sm text-gray-500">

                                Umur

                            </p>

                            <h4
                                class="font-bold mt-2">

                                {{ $animal->age }} Bulan

                            </h4>

                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-4">

                            <p
                                class="text-sm text-gray-500">

                                Grade

                            </p>

                            <h4
                                class="font-bold mt-2">

                                {{ $animal->grade->name }}

                            </h4>

                        </div>

                        <div
                            class="bg-gray-50 rounded-2xl p-4">

                            <p
                                class="text-sm text-gray-500">

                                Kandang

                            </p>

                            <h4
                                class="font-bold mt-2">

                                {{ $animal->cage->name }}

                            </h4>

                        </div>

                    </div>

                    <!-- Button -->

                    <div
                        class="mt-8">

                        <button
                            class="w-full bg-[#0FA958] hover:bg-green-700 text-white py-4 rounded-2xl transition">

                            Lihat Detail

                        </button>

                    </div>

                </div>

            </div>

            @empty

                <div class="col-span-3 text-center py-20">

                    <h3
                        class="text-2xl font-bold text-gray-500">

                        Belum Ada Hewan

                    </h3>

                </div>

            @endforelse

        </div>

    </div>

</section>