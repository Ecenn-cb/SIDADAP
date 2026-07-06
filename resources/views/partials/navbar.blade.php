<header class="fixed top-0 left-0 w-full z-50">

    <nav class="bg-white/90 backdrop-blur-lg border-b border-gray-100 shadow-sm">

        <div class="max-w-7xl mx-auto px-8">

            <div class="flex items-center justify-between h-24">

                <!-- Logo -->

                <div class="flex items-center gap-4">

                    <!-- Logo -->

                    <a href="{{ route('website.home') }}">

                        <img
                            src="{{ asset('assets/images/TemanAqiqah.png') }}"
                            class="h-14 hover:scale-105 transition duration-300">

                    </a>

                    <!-- Nama (Klik = Login) -->

                    <div>

                        <a
                            href="{{ route('login') }}"
                            class="text-2xl font-bold text-gray-800 hover:text-[#0FA958] transition">

                            Teman Aqiqah

                        </a>

                        <p class="text-sm text-gray-500">

                            Layanan Aqiqah Terpercaya

                        </p>

                    </div>

                </div>

                <!-- Menu -->

                <div class="hidden lg:flex items-center gap-10">

                    <a
                        href="{{ route('website.home') }}"
                        class="font-medium text-gray-700 hover:text-[#0FA958]">

                        Home

                    </a>

                    <a
                        href="{{ route('website.profile') }}"
                        class="font-medium text-gray-700 hover:text-[#0FA958]">

                        Profil

                    </a>

                    <a
                        href="{{ route('website.packages') }}"
                        class="font-medium text-gray-700 hover:text-[#0FA958]">

                        Paket

                    </a>

                    <a
                        href="{{ route('website.animals') }}"
                        class="font-medium text-gray-700 hover:text-[#0FA958]">

                        Hewan

                    </a>

                    <a
                        href="{{ route('website.announcements') }}"
                        class="font-medium text-gray-700 hover:text-[#0FA958]">

                        Berita

                    </a>

                    <a
                        href="{{ route('website.contact') }}"
                        class="font-medium text-gray-700 hover:text-[#0FA958]">

                        Kontak

                    </a>

                </div>

            </div>

        </div>

    </nav>

</header>