<section
    id="home"
    class="relative pt-40 pb-24 overflow-hidden">

    <!-- Background -->

    <div class="absolute inset-0 -z-10">

        <div
            class="absolute top-10 left-0 w-[450px] h-[450px] bg-green-200 rounded-full blur-[180px] opacity-50">
        </div>

        <div
            class="absolute bottom-0 right-0 w-[450px] h-[450px] bg-yellow-200 rounded-full blur-[180px] opacity-40">
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- ================= LEFT ================= -->

            <div>

                <span
                    class="inline-flex bg-green-100 text-[#0FA958] font-semibold px-5 py-2 rounded-full">

                    🐐 Teman Aqiqah Terpercaya

                </span>

                <h1
                    class="mt-8 text-6xl font-black leading-tight text-gray-800">

                    Layanan Aqiqah
                    <span class="text-[#0FA958]">

                        Mudah,

                    </span>

                    Aman &
                    Sesuai Syariat.

                </h1>

                <p
                    class="mt-8 text-lg text-gray-600 leading-9">

                    Teman Aqiqah hadir untuk membantu keluarga
                    Indonesia memperoleh layanan aqiqah
                    berkualitas dengan hewan pilihan,
                    proses penyembelihan sesuai syariat,
                    serta pelayanan yang profesional.

                </p>

                <div class="flex gap-5 mt-10">

                    <a
                        href="#package"
                        class="bg-[#0FA958] hover:bg-green-700 text-white px-8 py-4 rounded-2xl shadow-xl transition hover:scale-105">

                        Lihat Paket

                    </a>

                    <a
                        href="#contact"
                        class="border border-[#0FA958] text-[#0FA958] hover:bg-green-50 px-8 py-4 rounded-2xl transition">

                        Hubungi Kami

                    </a>

                </div>

                <!-- Statistik -->

                <div
                    class="grid grid-cols-3 gap-8 mt-16">

                    <div>

                        <h2
                            class="text-4xl font-bold text-[#0FA958]">

                            {{ $animals->count() }}+

                        </h2>

                        <p
                            class="text-gray-500 mt-2">

                            Hewan

                        </p>

                    </div>

                    <div>

                        <h2
                            class="text-4xl font-bold text-[#0FA958]">

                            {{ $packages->count() }}

                        </h2>

                        <p
                            class="text-gray-500 mt-2">

                            Paket

                        </p>

                    </div>

                    <div>

                        <h2
                            class="text-4xl font-bold text-[#0FA958]">

                            {{ $cages->count() }}

                        </h2>

                        <p
                            class="text-gray-500 mt-2">

                            Kandang

                        </p>

                    </div>

                </div>

            </div>

            <!-- ================= RIGHT ================= -->

            <div class="relative">

                <div
                    class="bg-white rounded-[40px] shadow-2xl overflow-hidden">

                    @if($featuredAnimal)

                        <img
                            src="{{ asset('storage/'.$featuredAnimal->image) }}"
                            class="h-[550px] w-full object-cover">

                    @else

                        <img
                            src="{{ asset('assets/images/TemanAqiqah.png') }}"
                            class="h-[550px] w-full object-contain p-20">

                    @endif

                </div>

                @if($featuredAnimal)

                <!-- Floating Card -->

                <div
                    class="absolute -bottom-10 -left-10 bg-white rounded-3xl shadow-xl p-6 w-80">

                    <div
                        class="flex justify-between items-center">

                        <div>

                            <h3
                                class="text-xl font-bold">

                                {{ $featuredAnimal->name }}

                            </h3>

                            <p
                                class="text-gray-500">

                                {{ $featuredAnimal->category->name }}

                            </p>

                        </div>

                        <span
                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                            {{ $featuredAnimal->status }}

                        </span>

                    </div>

                    <div
                        class="grid grid-cols-3 gap-4 mt-6 text-center">

                        <div>

                            <h4
                                class="font-bold">

                                {{ $featuredAnimal->weight }} Kg

                            </h4>

                            <small
                                class="text-gray-500">

                                Berat

                            </small>

                        </div>

                        <div>

                            <h4
                                class="font-bold">

                                {{ $featuredAnimal->grade->name }}

                            </h4>

                            <small
                                class="text-gray-500">

                                Grade

                            </small>

                        </div>

                        <div>

                            <h4
                                class="font-bold">

                                {{ $featuredAnimal->cage->name }}

                            </h4>

                            <small
                                class="text-gray-500">

                                Kandang

                            </small>

                        </div>

                    </div>

                </div>

                @endif

            </div>

        </div>

    </div>

</section>