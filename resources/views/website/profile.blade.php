@extends('layouts.website')

@section('title','Profil')

@section('content')

<!-- HERO -->

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-7xl mx-auto px-8 text-center">

        <h1 class="text-5xl font-black text-white">

            Tentang Teman Aqiqah

        </h1>

        <p class="text-green-100 mt-6 text-lg max-w-3xl mx-auto">

            Mengenal lebih dekat layanan aqiqah yang profesional,
            terpercaya, dan sesuai syariat Islam.

        </p>

    </div>

</section>

<!-- ABOUT -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>

                <img
                    src="{{ asset('assets/images/InstansiTA_1.jpeg') }}"
                    class="rounded-3xl shadow-xl">

            </div>

            <div>

                <span
                    class="text-[#0FA958] uppercase font-semibold">

                    Tentang Kami

                </span>

                <h2
                    class="text-4xl font-bold mt-5">

                    Teman Aqiqah

                </h2>

                <p
                    class="mt-8 text-gray-600 leading-9">

                    Teman Aqiqah merupakan penyedia layanan aqiqah
                    yang berkomitmen memberikan pelayanan terbaik
                    kepada masyarakat. Seluruh proses mulai dari
                    pemilihan hewan, penyembelihan, pengolahan,
                    hingga pengiriman dilakukan secara profesional
                    dan sesuai syariat Islam.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- VISI MISI -->

<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-10">

            <div class="bg-white rounded-3xl shadow-lg p-10">

                <h2
                    class="text-3xl font-bold text-[#0FA958]">

                    Visi

                </h2>

                <p
                    class="mt-6 leading-8 text-gray-600">

                    Menjadi perusahaan jasa Aqiqah dan Qurban yang Amanah, Profesional, Sunnah, Mewah dan Penuh Berkah

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-lg p-10">

                <h2
                    class="text-3xl font-bold text-[#0FA958]">

                    Misi

                </h2>

                <ul
                    class="mt-6 space-y-4 text-gray-600">

                    <li>✔ Menysiarkan Syariah Islam tentang Ibadah Aqiqah.</li>

                    <li>✔ Melaksanakan proses Aqiqah secara syar'i.</li>

                    <li>✔ Memberikan pelayanan yang ekslusif, mudah, praktis, dan memuaskan.</li>

                    <li>✔ Menghasilkan produk/masakan yang Halal, Toyib, berkualitas dan enak.</li>

                    <li>✔ Memberikan manfaat untuk lingkungan dan masyarakat.</li>

                </ul>

            </div>

        </div>

    </div>

</section>

<!-- WHY US -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center">

            <h2
                class="text-4xl font-bold">

                Mengapa Memilih Kami?

            </h2>

        </div>

        <div
            class="grid lg:grid-cols-4 gap-8 mt-16">

            <div class="bg-gray-50 rounded-3xl p-8 text-center">

                <h3 class="text-5xl">🐐</h3>

                <h4 class="font-bold mt-5">

                    Hewan Berkualitas

                </h4>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 text-center">

                <h3 class="text-5xl">🕌</h3>

                <h4 class="font-bold mt-5">

                    Sesuai Syariat

                </h4>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 text-center">

                <h3 class="text-5xl">🍱</h3>

                <h4 class="font-bold mt-5">

                    Higienis

                </h4>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 text-center">

                <h3 class="text-5xl">🚚</h3>

                <h4 class="font-bold mt-5">

                    Tepat Waktu

                </h4>

            </div>

        </div>

    </div>

</section>

<!-- PROSES -->

<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="text-center">

            <h2
                class="text-4xl font-bold">

                Alur Pelayanan

            </h2>

        </div>

        <div
            class="grid lg:grid-cols-5 gap-8 mt-16">

            @foreach([
                'Pilih Paket',
                'Pilih Hewan',
                'Pembayaran',
                'Proses Aqiqah',
                'Pengiriman'
            ] as $step)

            <div
                class="bg-white rounded-3xl shadow p-8 text-center">

                <div
                    class="w-14 h-14 rounded-full bg-[#0FA958] text-white flex items-center justify-center mx-auto font-bold">

                    {{ $loop->iteration }}

                </div>

                <p
                    class="mt-6 font-semibold">

                    {{ $step }}

                </p>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection