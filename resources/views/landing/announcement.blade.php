<section
    id="announcement"
    class="py-28 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Heading -->

        <div class="text-center max-w-3xl mx-auto">

            <span
                class="bg-green-100 text-[#0FA958] px-5 py-2 rounded-full font-semibold">

                Berita Terbaru

            </span>

            <h2
                class="text-5xl font-black mt-8 text-gray-800">

                Informasi & Kegiatan
                Teman Aqiqah

            </h2>

            <p
                class="mt-6 text-gray-500 leading-8">

                Ikuti informasi terbaru mengenai promo,
                kegiatan, maupun pengumuman resmi dari
                Teman Aqiqah.

            </p>

        </div>

        <!-- Card -->

        <div
            class="grid lg:grid-cols-3 gap-8 mt-20">

            @forelse($announcements as $announcement)

            <div
                class="bg-white rounded-[35px] overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300">

                <!-- Image -->

                <div class="h-64 overflow-hidden">

                    <img
                        src="{{ asset('storage/'.$announcement->image) }}"
                        class="w-full h-full object-cover hover:scale-110 duration-500">

                </div>

                <!-- Body -->

                <div class="p-8">

                    <span
                        class="text-sm text-gray-400">

                        {{ $announcement->created_at->format('d F Y') }}

                    </span>

                    <h3
                        class="text-2xl font-bold mt-4">

                        {{ $announcement->title }}

                    </h3>

                    <p
                        class="text-gray-500 mt-5 leading-8">

                        {{ Str::limit($announcement->description,120) }}

                    </p>

                    <button
                        class="mt-8 text-[#0FA958] font-semibold hover:underline">

                        Baca Selengkapnya →

                    </button>

                </div>

            </div>

            @empty

            <div class="col-span-3 text-center py-20">

                <h3
                    class="text-2xl font-bold text-gray-500">

                    Belum Ada Berita

                </h3>

            </div>

            @endforelse

        </div>

    </div>

</section>