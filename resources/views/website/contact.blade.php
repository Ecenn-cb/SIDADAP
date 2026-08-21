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

                            <a href="https://wa.me/628157103052"
                                target="_blank"
                                class="block hover:text-green-500 transition">
                                +62 815-7103-052
                            </a>

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

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.589326048904!2d107.13443387585775!3d-6.819698393178053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6853c523bc2cb1%3A0x1138d8bb63cc1dc4!2sTEMAN%20AQIQAH%20CIANJUR%20(Spesialis%20Domba%20%26%20Kambing)!5e0!3m2!1sid!2sid!4v1787323674418!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>

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
                href="https://wa.me/628157103052"
                target="_blank"
                class="inline-block mt-10 bg-white text-[#0FA958] px-10 py-4 rounded-2xl font-bold hover:scale-105 transition">

                Hubungi via WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection