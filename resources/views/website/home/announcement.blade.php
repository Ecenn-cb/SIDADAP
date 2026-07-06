@if($highlightAnnouncement)

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div
            class="relative overflow-hidden rounded-[35px] bg-gradient-to-r from-[#0FA958] to-[#12B75E] shadow-2xl">

            <!-- Background Decoration -->

            <div
                class="absolute -top-20 -left-20 w-72 h-72 rounded-full bg-white/10 blur-3xl">
            </div>

            <div
                class="absolute bottom-0 right-0 w-72 h-72 rounded-full bg-yellow-300/20 blur-3xl">
            </div>

            <div
                class="relative grid lg:grid-cols-2 gap-12 items-center p-12">

                <!-- Left -->

                <div>

                    <span
                        class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/20 text-white">

                        🔥 Promo / Berita Terbaru

                    </span>

                    <h2
                        class="text-4xl font-bold text-white mt-8 leading-tight">

                        {{ $highlightAnnouncement->title }}

                    </h2>

                    <p
                        class="mt-6 text-green-50 leading-8">

                        {{ Str::limit($highlightAnnouncement->description, 180) }}

                    </p>

                    <div
                        class="mt-8 flex items-center gap-4">

                        <a
                            href="{{ route('website.announcement.detail', $highlightAnnouncement->id) }}"
                            class="bg-white text-[#0FA958] px-8 py-4 rounded-2xl font-semibold hover:scale-105 transition">

                            Selengkapnya

                        </a>

                        <span
                            class="text-green-100">

                            {{ $highlightAnnouncement->created_at->format('d M Y') }}

                        </span>

                    </div>

                </div>

                <!-- Right -->

                <div class="flex justify-center">

                    @if($highlightAnnouncement->image)

                        <img
                            src="{{ asset('storage/'.$highlightAnnouncement->image) }}"
                            class="rounded-3xl shadow-2xl max-h-[350px] object-cover">

                    @else

                        <div
                            class="bg-white/10 backdrop-blur rounded-3xl w-full h-[320px] flex items-center justify-center">

                            <div class="text-center text-white">

                                <div class="text-7xl">

                                    📢

                                </div>

                                <p class="mt-5 text-xl">

                                    Teman Aqiqah

                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

@endif