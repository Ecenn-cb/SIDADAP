<footer class="bg-[#0B7F44] text-white mt-20">

    <div class="max-w-7xl mx-auto px-8 py-16">

        <div class="grid lg:grid-cols-4 gap-12">

            <!-- Logo -->

            <div>

                <img
                    src="{{ asset('assets/images/TemanAqiqah.png') }}"
                    class="h-16 bg-white rounded-2xl p-2">

                <h2 class="text-2xl font-bold mt-6">

                    Teman Aqiqah

                </h2>

                <p class="mt-5 text-green-100 leading-8">

                    Teman Aqiqah merupakan penyedia layanan aqiqah
                    yang berkomitmen memberikan pelayanan terbaik
                    dengan hewan berkualitas, proses sesuai syariat,
                    serta harga yang transparan.

                </p>

            </div>

            <!-- Navigasi -->

            <div>

                <h3 class="text-xl font-bold mb-6">

                    Navigasi

                </h3>

                <div class="space-y-4 text-green-100">

                    <a
                        href="{{ route('website.home') }}"
                        class="block hover:text-white duration-300">

                        Home

                    </a>

                    <a
                        href="{{ route('website.profile') }}"
                        class="block hover:text-white duration-300">

                        Profil

                    </a>

                    <a
                        href="{{ route('website.packages') }}"
                        class="block hover:text-white duration-300">

                        Paket

                    </a>

                    <a
                        href="{{ route('website.animals') }}"
                        class="block hover:text-white duration-300">

                        Hewan

                    </a>

                    <a
                        href="{{ route('website.announcements') }}"
                        class="block hover:text-white duration-300">

                        Berita

                    </a>

                    <a
                        href="{{ route('website.contact') }}"
                        class="block hover:text-white duration-300">

                        Kontak

                    </a>

                </div>

            </div>

            <!-- Layanan -->

            <div>

                <h3 class="text-xl font-bold mb-6">

                    Layanan

                </h3>

                <div class="space-y-4 text-green-100">

                    <p>✔ Paket Aqiqah</p>

                    <p>✔ Pemilihan Hewan</p>

                    <p>✔ Penyembelihan Sesuai Syariat</p>

                    <p>✔ Pengolahan Masakan</p>

                    <p>✔ Pengantaran Pesanan</p>

                </div>

            </div>

            <!-- Kontak -->

            <div>

                <h3 class="text-xl font-bold mb-6">

                    Hubungi Kami

                </h3>

                <div class="space-y-4 text-green-100">

                    <p>📞 +62 812-3456-7890</p>

                    <p>✉️ admin@temanaqiqah.com</p>

                    <p>📍 Cianjur, Jawa Barat</p>

                    <p>🕒 Senin - Minggu</p>

                    <p>08.00 - 20.00 WIB</p>

                </div>

            </div>

        </div>

        <div class="border-t border-green-500 mt-14 pt-8">

            <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                <p class="text-green-100 text-sm">

                    © {{ date('Y') }} Teman Aqiqah. All Rights Reserved.

                </p>

                <p class="text-green-200 text-sm">

                    Dibangun untuk memberikan pelayanan aqiqah yang mudah,
                    terpercaya, dan sesuai syariat.

                </p>

            </div>

        </div>

    </div>

</footer>