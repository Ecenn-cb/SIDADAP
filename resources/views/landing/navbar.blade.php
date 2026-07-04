<header class="fixed top-0 left-0 w-full z-50">

    <nav class="backdrop-blur-xl bg-white/80 border-b border-gray-100">

        <div class="max-w-7xl mx-auto px-8">

            <div class="flex items-center justify-between h-24">

                <!-- Logo -->

                <a href="{{ route('welcome') }}"
                    class="flex items-center gap-4">

                    <img
                        src="{{ asset('assets/images/TemanAqiqah.png') }}"
                        class="h-14">

                    <div>

                        <h1
                            class="text-2xl font-bold text-gray-800">

                            Teman Aqiqah

                        </h1>

                        <p
                            class="text-sm text-gray-500">

                            Layanan Aqiqah Terpercaya

                        </p>

                    </div>

                </a>

                <!-- Menu -->

                <div
                    class="hidden lg:flex items-center gap-10">

                    <a
                        href="#home"
                        class="font-medium hover:text-[#0FA958] duration-300">

                        Home

                    </a>

                    <a
                        href="#about"
                        class="font-medium hover:text-[#0FA958] duration-300">

                        Tentang

                    </a>

                    <a
                        href="#package"
                        class="font-medium hover:text-[#0FA958] duration-300">

                        Paket

                    </a>

                    <a
                        href="#animal"
                        class="font-medium hover:text-[#0FA958] duration-300">

                        Hewan

                    </a>

                    <a
                        href="#announcement"
                        class="font-medium hover:text-[#0FA958] duration-300">

                        Berita

                    </a>

                    <a
                        href="#contact"
                        class="font-medium hover:text-[#0FA958] duration-300">

                        Kontak

                    </a>

                </div>

                <!-- Login -->

                <a
                    href="{{ route('login') }}"
                    class="bg-[#0FA958] hover:bg-green-700 text-white px-6 py-3 rounded-xl shadow-lg transition hover:scale-105">

                    Login

                </a>

            </div>

        </div>

    </nav>

</header>