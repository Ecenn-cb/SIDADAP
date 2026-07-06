@extends('layouts.website')

@section('title', $package->name)

@section('content')

<!-- Hero -->

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center">

            <span
                class="bg-white/20 text-white px-5 py-2 rounded-full">

                Paket Aqiqah

            </span>

            <h1
                class="text-5xl font-black text-white mt-8">

                {{ $package->name }}

            </h1>

            <p
                class="text-green-100 text-lg mt-6 max-w-3xl mx-auto">

                {{ $package->description }}

            </p>

        </div>

    </div>

</section>

<!-- Informasi -->

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div
            class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Left -->

            <div>

                <h2
                    class="text-4xl font-bold">

                    Tentang Paket

                </h2>

                <p
                    class="text-gray-600 leading-8 mt-8">

                    {{ $package->description }}

                </p>

                <div
                    class="grid grid-cols-2 gap-5 mt-10">

                    <div
                        class="bg-gray-50 rounded-2xl p-5">

                        <h4
                            class="text-gray-500">

                            Jumlah Harga

                        </h4>

                        <p
                            class="text-3xl font-bold text-[#0FA958] mt-2">

                            {{ $package->prices->count() }}

                        </p>

                    </div>

                    <div
                        class="bg-gray-50 rounded-2xl p-5">

                        <h4
                            class="text-gray-500">

                            Harga Mulai

                        </h4>

                        <p
                            class="text-2xl font-bold text-[#0FA958] mt-2">

                            Rp {{ number_format($package->prices->min('female_price'),0,',','.') }}

                        </p>

                    </div>

                </div>

            </div>

            <!-- Right -->

            <div>

                <img
                    src="{{ asset('assets/images/MenuAqiqah.png') }}">
                    
            </div>

        </div>

    </div>

</section>

<!-- Harga -->

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center mb-16">

            <h2
                class="text-4xl font-bold">

                Daftar Harga

            </h2>

            <p
                class="text-gray-500 mt-4">

                Pilih jumlah box sesuai kebutuhan Anda.

            </p>

        </div>

        <div
            class="grid lg:grid-cols-3 gap-8">

            @foreach($package->prices as $price)

                <div
                    class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-xl transition">

                    <div
                        class="text-center">

                        <span
                            class="bg-green-100 text-green-700 px-5 py-2 rounded-full">

                            {{ $price->box_count }} Box

                        </span>

                    </div>

                    <div
                        class="mt-10 space-y-5">

                        <div
                            class="flex justify-between">

                            <span>

                                Anak Perempuan

                            </span>

                            <span
                                class="font-bold text-[#0FA958]">

                                Rp {{ number_format($price->female_price,0,',','.') }}

                            </span>

                        </div>

                        <div
                            class="flex justify-between">

                            <span>

                                Anak Laki-laki

                            </span>

                            <span
                                class="font-bold text-[#0FA958]">

                                Rp {{ number_format($price->male_price,0,',','.') }}

                            </span>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<!-- Keunggulan -->

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center">

            <h2
                class="text-4xl font-bold">

                Keunggulan Paket

            </h2>

        </div>

        <div
            class="grid lg:grid-cols-2 gap-8 mt-16">

            <div class="flex items-start gap-4">

                <div
                    class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                    ✓

                </div>

                <div>

                    <h4
                        class="font-bold text-xl">

                        Hewan Berkualitas

                    </h4>

                    <p
                        class="text-gray-500 mt-2">

                        Hewan sehat dan memenuhi syarat untuk aqiqah.

                    </p>

                </div>

            </div>

            <div class="flex items-start gap-4">

                <div
                    class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                    ✓

                </div>

                <div>

                    <h4
                        class="font-bold text-xl">

                        Penyembelihan Sesuai Syariat

                    </h4>

                    <p
                        class="text-gray-500 mt-2">

                        Dilaksanakan sesuai ketentuan syariat Islam.

                    </p>

                </div>

            </div>

            <div class="flex items-start gap-4">

                <div
                    class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                    ✓

                </div>

                <div>

                    <h4
                        class="font-bold text-xl">

                        Pengolahan Higienis

                    </h4>

                    <p
                        class="text-gray-500 mt-2">

                        Diproses dengan standar kebersihan yang tinggi.

                    </p>

                </div>

            </div>

            <div class="flex items-start gap-4">

                <div
                    class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                    ✓

                </div>

                <div>

                    <h4
                        class="font-bold text-xl">

                        Siap Diantar

                    </h4>

                    <p
                        class="text-gray-500 mt-2">

                        Pesanan siap dikirim ke lokasi pelanggan.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->

<section class="py-24 bg-gray-50">

    <div class="max-w-5xl mx-auto px-8">

        <div
            class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] rounded-[40px] p-16 text-center">

            <h2
                class="text-4xl font-bold text-white">

                Tertarik Dengan Paket Ini?

            </h2>

            <p
                class="text-green-100 mt-6">

                Hubungi kami sekarang untuk mendapatkan informasi lebih lanjut
                mengenai paket aqiqah yang sesuai dengan kebutuhan Anda.

            </p>

            <div
                class="flex justify-center gap-5 mt-10">

                <a
                    href="{{ route('website.contact') }}"
                    class="bg-white text-[#0FA958] px-8 py-4 rounded-2xl font-semibold">

                    Hubungi Kami

                </a>

                <a
                    href="{{ route('website.packages') }}"
                    class="border border-white text-white px-8 py-4 rounded-2xl">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</section>

@endsection