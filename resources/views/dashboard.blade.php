<x-app-layout>

<div class="space-y-8">

    <!-- Welcome -->

    <div class="bg-gradient-to-r from-[#0FA958] to-[#16C76B] rounded-3xl p-8 text-white shadow-lg">

        <h1 class="text-3xl font-bold">

            Selamat Datang,
            {{ auth()->user()->full_name }} 👋

        </h1>

        <p class="mt-2 text-green-100">

            Selamat datang di Sistem Informasi Pengelolaan Data Hewan
            Teman Aqiqah.

        </p>

    </div>

    <!-- Statistik -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

        <div class="bg-white rounded-3xl shadow p-6">

            <p class="text-gray-500">

                Total Hewan

            </p>

            <h2 class="text-4xl font-bold mt-3 text-[#0FA958]">

                {{ $animals }}

            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow p-6">

            <p class="text-gray-500">

                Total Kandang

            </p>

            <h2 class="text-4xl font-bold mt-3 text-[#0FA958]">

                {{ $totalCages }}

            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow p-6">

            <p class="text-gray-500">

                Total Paket

            </p>

            <h2 class="text-4xl font-bold mt-3 text-[#0FA958]">

                {{ $packages }}

            </h2>

        </div>

        <div class="bg-white rounded-3xl shadow p-6">

            <p class="text-gray-500">

                Announcement

            </p>

            <h2 class="text-4xl font-bold mt-3 text-[#0FA958]">

                {{ $announcements }}

            </h2>

        </div>

        @role('Owner')

        <div class="bg-white rounded-3xl shadow p-6">

            <p class="text-gray-500">

                Total User

            </p>

            <h2 class="text-4xl font-bold mt-3 text-[#0FA958]">

                {{ $users }}

            </h2>

        </div>

        @endrole

    </div>

    <!-- Jadwal Pemberian Pakan -->

<div class="bg-white rounded-3xl shadow p-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-2xl font-bold text-gray-800">

                🍃 Jadwal Pemberian Pakan

            </h2>

            <p class="text-gray-500">

                Jadwal pemberian pakan harian ternak.

            </p>

        </div>

        <div
            class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">

            Hari Ini

        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Pagi -->

        <div class="border rounded-2xl p-6 hover:shadow-lg transition">

            <div class="text-5xl mb-4">

                🌅

            </div>

            <h3 class="font-bold text-xl">

                Pakan Pagi

            </h3>

            <p class="text-gray-500 mt-2">

                08.00 WIB

            </p>

        </div>

        <!-- Siang -->

        <div class="border rounded-2xl p-6 hover:shadow-lg transition">

            <div class="text-5xl mb-4">

                ☀️

            </div>

            <h3 class="font-bold text-xl">

                Pakan Siang

            </h3>

            <p class="text-gray-500 mt-2">

                12.00 WIB

            </p>

        </div>

        <!-- Sore -->

        <div class="border rounded-2xl p-6 hover:shadow-lg transition">

            <div class="text-5xl mb-4">

                🌙

            </div>

            <h3 class="font-bold text-xl">

                Pakan Sore

            </h3>

            <p class="text-gray-500 mt-2">

                17.00 WIB

            </p>

        </div>

    </div>

</div>

    <!-- Data Kandang -->

    <div class="bg-white rounded-3xl shadow p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">

                    Data Kandang

                </h2>

                <p class="text-gray-500">

                    Jumlah hewan pada setiap kandang.

                </p>

            </div>

        </div>

        @if($cages->count())

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                @foreach($cages as $cage)

                    <div class="border rounded-3xl p-6 hover:shadow-lg transition">

                        <div class="flex justify-between items-center">

                            <h3 class="text-xl font-semibold">

                                🏠 {{ $cage->name }}

                            </h3>

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                {{ $cage->animals_count }} Ekor

                            </span>

                        </div>

                        <div class="mt-6">

                            <div class="flex justify-between text-sm text-gray-500 mb-2">

                                <span>Kapasitas Terisi</span>

                                <span>{{ $cage->animals_count }} Ekor</span>

                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-3">

                                <div
                                    class="bg-[#0FA958] h-3 rounded-full"
                                    style="width: {{ min($cage->animals_count * 10,100) }}%;">

                                </div>

                            </div>

                        </div>

                        <div class="mt-6">

                            <a
                                href="{{ route('animals.index') }}"
                                class="text-[#0FA958] font-semibold hover:underline">

                                Lihat Hewan →

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-12">

                <h3 class="text-xl font-semibold text-gray-600">

                    Belum Ada Data Kandang

                </h3>

                <p class="text-gray-500 mt-2">

                    Silakan tambahkan kandang terlebih dahulu.

                </p>

            </div>

        @endif

    </div>

</div>

</x-app-layout>