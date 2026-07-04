<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1">

<meta
    name="csrf-token"
    content="{{ csrf_token() }}">

<title>SIDADAP - Teman Aqiqah</title>

<link rel="preconnect" href="https://fonts.bunny.net">

<link
    href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap"
    rel="stylesheet" />

@vite([
    'resources/css/app.css',
    'resources/js/app.js'
])

<link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

</head>

<body class="font-[Poppins] bg-[#F4F7F9] overflow-hidden">

<div class="min-h-screen grid lg:grid-cols-[55%_45%]">

<!-- ========================= -->
<!-- LEFT -->
<!-- ========================= -->

<section
    class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-[#0FA958] via-[#0D9A50] to-[#087C41]">

    <!-- Glow -->

    <div
        class="absolute -top-40 -left-32 w-96 h-96 rounded-full bg-white/20 blur-3xl">
    </div>

    <div
        class="absolute bottom-0 right-0 w-96 h-96 rounded-full bg-yellow-300/20 blur-3xl">
    </div>

    <div
        class="relative z-10 flex flex-col justify-between w-full p-16">

        <!-- Header -->

        <div>

            <img
                src="{{ asset('assets/images/TemanAqiqah.png') }}"
                class="h-16 mb-10">

            <span
                class="inline-flex items-center px-5 py-2 rounded-full bg-white/15 backdrop-blur-lg text-white text-sm">

                WEB APPLICATION

            </span>

            <h1
                class="mt-8 text-6xl font-black text-white leading-none">

                SIDADAP

            </h1>

            <h2
                class="mt-5 text-2xl font-semibold text-white">

                Sistem Informasi Pengelolaan Data Hewan dan Dashboard Pengaturan Profil Teman Aqiqah

            </h2>

            <p
                class="mt-6 text-lg leading-8 text-green-50 max-w-xl">

                Kelola data hewan, paket aqiqah, kandang,
                pengumuman, dan seluruh aktivitas Teman
                Aqiqah dalam satu dashboard yang modern.

            </p>

        </div>

        <!-- Dashboard Preview -->

        <div
            class="bg-white/15 backdrop-blur-xl rounded-3xl p-6 border border-white/20 shadow-xl">

            <div
                class="flex justify-between items-center mb-5">

                <div>

                    <h3
                        class="text-white text-lg font-semibold">

                        Dashboard Preview

                    </h3>

                    <p
                        class="text-green-100 text-sm">

                        SIDADAP

                    </p>

                </div>

                <div
                    class="w-3 h-3 rounded-full bg-green-300">
                </div>

            </div>

            <div class="grid grid-cols-3 gap-4">

                <div
                    class="bg-white rounded-2xl p-4">

                    <h4
                        class="text-3xl font-bold text-green-600">

                        {{ $totalAnimals }}

                    </h4>

                    <p
                        class="text-sm text-gray-500">

                        Hewan

                    </p>

                </div>

                <div
                    class="bg-white rounded-2xl p-4">

                    <h4
                        class="text-3xl font-bold text-yellow-500">

                        {{ $totalCages }}

                    </h4>

                    <p
                        class="text-sm text-gray-500">

                        Kandang

                    </p>

                </div>

                <div
                    class="bg-white rounded-2xl p-4">

                    <h4
                        class="text-3xl font-bold text-green-600">

                        {{ $totalPackages }}

                    </h4>

                    <p
                        class="text-sm text-gray-500">

                        Paket

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- RIGHT -->
<!-- ========================= -->

<section
    class="flex items-center justify-center p-10">

    <div
        class="w-full max-w-md">

        <div
            class="bg-white rounded-[35px] shadow-[0_20px_60px_rgba(0,0,0,.12)] p-10">

            {{ $slot }}

        </div>

        <p
            class="text-center text-gray-400 text-sm mt-8">

            © {{ date('Y') }}
            Teman Aqiqah.
            All rights reserved.

        </p>

    </div>

</section>

</div>

</body>

</html>
