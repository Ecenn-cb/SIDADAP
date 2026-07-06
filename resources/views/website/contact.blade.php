@extends('layouts.website')

@section('title','Hubungi Kami')

@section('content')

<!-- HERO -->

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-7xl mx-auto px-8 text-center">

        <h1 class="text-5xl font-black text-white">

            Hubungi Kami

        </h1>

        <p class="text-green-100 text-lg mt-6 max-w-3xl mx-auto">

            Kami siap membantu Anda mendapatkan layanan aqiqah terbaik.
            Jangan ragu untuk menghubungi kami apabila memiliki pertanyaan
            ataupun ingin melakukan pemesanan.

        </p>

    </div>

</section>

<!-- INFORMASI -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-16">

            <!-- LEFT -->

            <div>

                <h2 class="text-4xl font-bold">

                    Informasi Kontak

                </h2>

                <p class="text-gray-500 mt-5 leading-8">

                    Silakan hubungi kami melalui informasi berikut.
                    Tim Teman Aqiqah akan dengan senang hati membantu Anda.

                </p>

                <div class="space-y-8 mt-12">

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

                            📍

                        </div>

                        <div>

                            <h4 class="font-bold text-xl">

                                Alamat

                            </h4>

                            <p class="text-gray-500">

                                Jl. Contoh No.123,
                                Cianjur,
                                Jawa Barat

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

                            📞

                        </div>

                        <div>

                            <h4 class="font-bold text-xl">

                                WhatsApp

                            </h4>

                            <p class="text-gray-500">

                                +62 812-3456-7890

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

                            ✉️

                        </div>

                        <div>

                            <h4 class="font-bold text-xl">

                                Email

                            </h4>

                            <p class="text-gray-500">

                                admin@temanaqiqah.com

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

                            🕘

                        </div>

                        <div>

                            <h4 class="font-bold text-xl">

                                Jam Operasional

                            </h4>

                            <p class="text-gray-500">

                                Senin - Minggu

                                <br>

                                08.00 - 20.00 WIB

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div>

                <iframe
                    src="https://www.google.com/maps/embed?pb="
                    class="rounded-3xl shadow-xl w-full h-full min-h-[500px]"
                    loading="lazy">

                </iframe>

            </div>

        </div>

    </div>

</section>

<!-- FAQ -->

<section class="py-24 bg-gray-50">

    <div class="max-w-5xl mx-auto px-8">

        <div class="text-center">

            <h2 class="text-4xl font-bold">

                Pertanyaan yang Sering Diajukan

            </h2>

        </div>

        <div class="space-y-6 mt-16">

            <div class="bg-white rounded-3xl p-8 shadow">

                <h4 class="font-bold text-xl">

                    Apakah bisa memilih hewan sendiri?

                </h4>

                <p class="text-gray-500 mt-4">

                    Ya, pelanggan dapat memilih hewan sesuai stok yang tersedia.

                </p>

            </div>

            <div class="bg-white rounded-3xl p-8 shadow">

                <h4 class="font-bold text-xl">

                    Apakah pengiriman tersedia?

                </h4>

                <p class="text-gray-500 mt-4">

                    Ya, kami menyediakan layanan pengiriman sesuai wilayah layanan.

                </p>

            </div>

            <div class="bg-white rounded-3xl p-8 shadow">

                <h4 class="font-bold text-xl">

                    Apakah proses penyembelihan sesuai syariat?

                </h4>

                <p class="text-gray-500 mt-4">

                    Seluruh proses dilakukan sesuai syariat Islam.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->

<section class="py-24">

    <div class="max-w-5xl mx-auto px-8">

        <div
            class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] rounded-[40px] p-16 text-center">

            <h2 class="text-5xl font-bold text-white">

                Siap Melaksanakan Aqiqah?

            </h2>

            <p class="text-green-100 mt-6">

                Hubungi kami sekarang melalui WhatsApp untuk konsultasi
                dan pemesanan paket aqiqah.

            </p>

            <a
                href="https://wa.me/6281234567890"
                target="_blank"
                class="inline-block mt-10 bg-white text-[#0FA958] px-10 py-4 rounded-2xl font-bold hover:scale-105 transition">

                Hubungi via WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection