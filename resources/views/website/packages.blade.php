@extends('layouts.website')

@section('title','Paket Aqiqah')

@section('content')

<!-- Hero -->

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-7xl mx-auto px-8 text-center">

        <h1 class="text-5xl font-black text-white">

            Paket Aqiqah

        </h1>

        <p class="text-green-100 text-lg mt-6 max-w-3xl mx-auto">

            Pilih paket aqiqah terbaik sesuai kebutuhan keluarga Anda.
            Seluruh paket disiapkan dengan proses yang higienis,
            hewan berkualitas, dan sesuai syariat Islam.

        </p>

    </div>

</section>

<!-- Paket -->

<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-3 gap-8">

            @foreach($packages as $package)

                <div
                    class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition overflow-hidden">

                    <div
                        class="bg-[#0FA958] text-white p-8">

                        <h2 class="text-3xl font-bold">

                            {{ $package->name }}

                        </h2>

                    </div>

                    <div class="p-8">

                        <p class="text-gray-500 leading-8">

                            {{ $package->description }}

                        </p>

                        <div class="mt-8">

                            @if($package->prices->count())

                                <p class="text-gray-500">

                                    Mulai dari

                                </p>

                                <h3
                                    class="text-3xl font-bold text-[#0FA958] mt-2">

                                    Rp {{ number_format($package->prices->min('female_price'),0,',','.') }}

                                </h3>

                            @endif

                        </div>

                        <a
                            href="{{ route('website.package.detail',$package->id) }}"
                            class="mt-8 inline-block w-full text-center bg-[#0FA958] hover:bg-green-700 text-white py-4 rounded-2xl transition">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection