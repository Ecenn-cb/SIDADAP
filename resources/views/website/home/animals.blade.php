<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="flex justify-between items-end">

            <div>

                <span class="text-[#0FA958] font-semibold">
                    Hewan
                </span>

                <h2 class="text-4xl font-bold mt-3">
                    Hewan Terbaru
                </h2>

            </div>

            <a
                href="{{ route('website.animals') }}"
                class="text-[#0FA958] font-semibold">

                Lihat Semua →

            </a>

        </div>


        <div class="grid lg:grid-cols-3 gap-8 mt-12">

            @foreach($animals as $animal)

                <div class="bg-white rounded-3xl shadow hover:shadow-xl transition overflow-hidden">

                    <img
                        src="{{ asset('storage/'.$animal->image) }}"
                        class="h-64 w-full object-cover">


                    <div class="p-6">

                        <h3 class="text-xl font-bold">
                            {{ $animal->name }}
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Berat {{ $animal->weight }} Kg
                        </p>


                        <a
                            href="{{ route('website.animal.detail', $animal->animal_code) }}"
                            class="inline-block mt-6 text-[#0FA958] font-semibold">

                            Detail Hewan →

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>