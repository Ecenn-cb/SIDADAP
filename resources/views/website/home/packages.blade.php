<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="flex justify-between items-end">

            <div>

                <span class="text-[#0FA958] font-semibold">

                    Paket Kami

                </span>

                <h2 class="text-4xl font-bold mt-3">

                    Paket Unggulan

                </h2>

            </div>

            <a
                href="{{ route('website.packages') }}"
                class="text-[#0FA958] font-semibold">

                Lihat Semua →

            </a>

        </div>

        <div class="grid lg:grid-cols-3 gap-8 mt-12">

            @foreach($packages as $package)

                <div class="bg-white rounded-3xl shadow hover:shadow-xl transition p-8">

                    <h3 class="text-2xl font-bold">

                        {{ $package->name }}

                    </h3>

                    <p class="text-gray-500 mt-4">

                        {{ Str::limit($package->description,120) }}

                    </p>

                    <a
                        href="{{ route('website.package.detail',$package->id) }}"
                        class="inline-block mt-8 text-[#0FA958] font-semibold">

                        Detail Paket →

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>