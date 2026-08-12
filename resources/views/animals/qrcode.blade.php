<x-app-layout>

    <div class="py-10">

        <div class="max-w-4xl mx-auto">

            <div class="bg-white rounded-3xl shadow-xl p-10">

                <!-- Judul -->

                <div class="text-center">

                    <h1 class="text-3xl font-bold text-gray-800">

                        QR Code Hewan

                    </h1>

                    <p class="text-gray-500 mt-2">

                        Scan QR Code untuk melihat profil lengkap hewan.

                    </p>

                </div>

                <!-- Card -->

                <div class="mt-10 grid md:grid-cols-2 gap-10 items-center">

                    <!-- Informasi Hewan -->

                    <div>

                        <img
                            src="{{ asset('storage/'.$animal->image) }}"
                            class="w-full rounded-2xl shadow-lg">

                        <div class="mt-6 space-y-3">

                            <h2 class="text-2xl font-bold">

                                {{ $animal->category->name }}

                            </h2>

                            <p>

                                <strong>Grade :</strong>

                                {{ $animal->grade->name }}

                            </p>

                            <p>

                                <strong>Berat :</strong>

                                {{ $animal->weight }} Kg

                            </p>

                            <p>

                                <strong>Umur :</strong>

                                {{ $animal->age }}

                            </p>

                            <p>

                                <strong>Kandang :</strong>

                                {{ $animal->cage->name }}

                            </p>

                        </div>

                    </div>

                    <!-- QR -->

                    <div class="text-center">

                        <div class="bg-gray-50 rounded-3xl p-8 inline-block shadow">

                            {!! QrCode::size(250)->generate(
                                route('website.animal.detail', $animal->id)
                            ) !!}
                        </div>

                        <p class="mt-6 text-gray-500">

                            Scan QR menggunakan kamera HP.

                        </p>

                        <p class="text-sm text-gray-400 mt-2">

                            {{ route('website.animal.detail', $animal->id) }}

                        </p>

                    </div>

                </div>

                <!-- Tombol -->

                <div class="mt-10 flex justify-center gap-4">

                    <a
                        href="{{ route('animals.index') }}"
                        class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>