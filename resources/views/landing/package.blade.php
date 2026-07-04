<section
    id="package"
    class="py-28 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Heading -->

        <div class="text-center max-w-3xl mx-auto">

            <span
                class="bg-green-100 text-[#0FA958] px-5 py-2 rounded-full font-semibold">

                Paket Aqiqah

            </span>

            <h2
                class="text-5xl font-black mt-8 text-gray-800">

                Pilihan Paket
                Untuk Keluarga Anda

            </h2>

            <p
                class="mt-6 text-gray-500 leading-8">

                Temukan berbagai pilihan paket aqiqah
                dengan harga yang transparan,
                kualitas terbaik,
                serta pelayanan profesional.

            </p>

        </div>

        <!-- Card -->

        <div
            class="grid lg:grid-cols-2 gap-10 mt-20">

            @foreach($packages as $package)

                <div
                    class="bg-white rounded-[35px] shadow-xl overflow-hidden hover:-translate-y-2 duration-300">

                    <!-- Header -->

                    <div
                        class="bg-gradient-to-r from-[#0FA958] to-green-600 p-8 text-white">

                        <h2
                            class="text-3xl font-bold">

                            {{ $package->name }}

                        </h2>

                        <p
                            class="mt-3 text-green-100">

                            {{ $package->description }}

                        </p>

                    </div>

                    <!-- Isi -->

                    <div class="p-8">

                        @foreach($package->prices as $price)

                            <div
                                class="border rounded-2xl p-6 mb-6">

                                <div
                                    class="flex justify-between">

                                    <div>

                                        <h3
                                            class="text-xl font-bold">

                                            {{ $price->box_count }} Box

                                        </h3>

                                        <p
                                            class="text-gray-500">

                                            Paket Aqiqah

                                        </p>

                                    </div>

                                    <div
                                        class="bg-green-100 text-green-700 px-4 py-2 rounded-full h-fit">

                                        Ready

                                    </div>

                                </div>

                                <div
                                    class="grid grid-cols-2 gap-6 mt-8">

                                    <div
                                        class="bg-pink-50 rounded-2xl p-5">

                                        <p
                                            class="text-gray-500">

                                            Anak Perempuan

                                        </p>

                                        <h4
                                            class="font-bold text-xl text-pink-600 mt-2">

                                            Rp {{ number_format($price->female_price,0,',','.') }}

                                        </h4>

                                    </div>

                                    <div
                                        class="bg-blue-50 rounded-2xl p-5">

                                        <p
                                            class="text-gray-500">

                                            Anak Laki-laki

                                        </p>

                                        <h4
                                            class="font-bold text-xl text-blue-600 mt-2">

                                            Rp {{ number_format($price->male_price,0,',','.') }}

                                        </h4>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>