@if($highlightAnnouncement)

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <!-- Heading -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-gray-800">
                Berita & Informasi Terbaru
            </h2>
            <p class="text-gray-500 mt-3">
                Ikuti informasi terbaru, promo, dan kegiatan Teman Aqiqah.
            </p>
        </div>

        <!-- Highlight News -->
        <div class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-[#0FA958] to-[#12B75E] shadow-2xl">

            <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 rounded-full bg-yellow-300/20 blur-3xl"></div>

            <div class="relative grid lg:grid-cols-2 gap-12 items-center p-12">

                <!-- Content -->
                <div>

                    <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/20 text-white">
                        🔥 Berita Terbaru
                    </span>

                    <h2 class="text-4xl font-bold text-white mt-6 leading-tight">
                        {{ $highlightAnnouncement->title }}
                    </h2>

                    <p class="mt-6 text-green-50 leading-8">
                        {{ Str::limit($highlightAnnouncement->description, 180) }}
                    </p>

                    <div class="mt-8 flex items-center gap-5">

                        <a href="{{ route('website.announcement.detail', $highlightAnnouncement->id) }}"
                            class="bg-white text-[#0FA958] px-8 py-4 rounded-2xl font-semibold hover:scale-105 transition">
                            Baca Selengkapnya
                        </a>

                        <span class="text-green-100">
                            {{ $highlightAnnouncement->created_at->format('d M Y') }}
                        </span>

                    </div>

                </div>

                <!-- Image -->
                <div class="flex justify-center">

                    @if($highlightAnnouncement->image)

                        <img src="{{ asset('storage/'.$highlightAnnouncement->image) }}"
                            class="rounded-3xl shadow-2xl h-[340px] w-full object-cover">

                    @else

                        <div class="bg-white/10 backdrop-blur rounded-3xl w-full h-[340px] flex items-center justify-center">

                            <div class="text-center text-white">

                                <div class="text-7xl">📢</div>

                                <p class="mt-4 text-xl font-semibold">
                                    Teman Aqiqah
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

        <!-- Other News -->
        @if($otherAnnouncements->count())

        <div class="mt-16">

            <div class="flex justify-between items-center mb-8">

                <h3 class="text-3xl font-bold text-gray-800">
                    Berita Lainnya
                </h3>

                <a href="{{ route('website.announcements') }}"
                    class="text-[#0FA958] font-semibold hover:underline">
                    Lihat Semua →
                </a>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($otherAnnouncements as $announcement)

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:-translate-y-2 hover:shadow-xl transition duration-300">

                    @if($announcement->image)

                        <img src="{{ asset('storage/'.$announcement->image) }}"
                            class="w-full h-52 object-cover">

                    @else

                        <div class="w-full h-52 bg-gray-100 flex items-center justify-center text-6xl">
                            📢
                        </div>

                    @endif

                    <div class="p-6">

                        <p class="text-sm text-gray-500">
                            {{ $announcement->created_at->format('d M Y') }}
                        </p>

                        <h4 class="text-xl font-bold text-gray-800 mt-2 line-clamp-2">
                            {{ $announcement->title }}
                        </h4>

                        <p class="text-gray-600 mt-3 line-clamp-3">
                            {{ Str::limit($announcement->description, 100) }}
                        </p>

                        <a href="{{ route('website.announcement.detail', $announcement->id) }}"
                            class="inline-flex items-center gap-2 mt-5 text-[#0FA958] font-semibold hover:gap-3 transition-all">
                            Baca Selengkapnya →
                        </a>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endif

    </div>

</section>

@endif