@extends('layouts.website')

@section('title','Hewan')

@section('content')

<!-- Hero -->

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-7xl mx-auto px-8 text-center">

        <h1 class="text-5xl font-black text-white">
            Hewan Aqiqah
        </h1>

        <p class="text-green-100 text-lg mt-6 max-w-3xl mx-auto">
            Pilih hewan aqiqah yang sehat, berkualitas,
            dan sesuai syariat Islam.
        </p>

    </div>

</section>


<!-- Hewan -->

<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">


        <!-- Filter -->

        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">
                    Daftar Hewan
                </h2>

                <p class="text-gray-500 mt-1">
                    Pilih berdasarkan grade hewan.
                </p>

            </div>


            <form
                action="{{ route('website.animals') }}"
                method="GET">

                <select
                    name="grade"
                    onchange="this.form.submit()"
                    class="w-56 border-gray-300 rounded-xl px-4 py-3
                           focus:border-[#0FA958]
                           focus:ring-[#0FA958]
                           bg-white">

                    <option value="">
                        Semua Grade
                    </option>

                    @foreach($grades as $grade)

                        <option
                            value="{{ $grade->id }}"
                            {{ request('grade') == $grade->id ? 'selected' : '' }}>

                            {{ $grade->name }}

                        </option>

                    @endforeach

                </select>

            </form>

        </div>


        <!-- Keterangan Grade -->

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-10">

            <h3 class="text-lg font-bold text-gray-800 mb-4">
                Keterangan Grade Hewan
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <!-- Biru -->

                <div class="flex items-center gap-3">

                    <span class="w-5 h-5 rounded-full bg-blue-500 flex-shrink-0"></span>

                    <div>

                        <p class="font-semibold text-gray-700">
                            Biru
                        </p>

                        <p class="text-sm text-gray-500">
                            Berat 27–30 Kg (Jantan)
                        </p>

                    </div>

                </div>


                <!-- Kuning -->

                <div class="flex items-center gap-3">

                    <span class="w-5 h-5 rounded-full bg-yellow-400 flex-shrink-0"></span>

                    <div>

                        <p class="font-semibold text-gray-700">
                            Kuning
                        </p>

                        <p class="text-sm text-gray-500">
                            Berat 27–30 Kg
                        </p>

                    </div>

                </div>


                <!-- Merah -->

                <div class="flex items-center gap-3">

                    <span class="w-5 h-5 rounded-full bg-red-500 flex-shrink-0"></span>

                    <div>

                        <p class="font-semibold text-gray-700">
                            Merah
                        </p>

                        <p class="text-sm text-gray-500">
                            Berat 16–25 Kg
                        </p>

                    </div>

                </div>


                <!-- Hijau -->

                <div class="flex items-center gap-3">

                    <span class="w-5 h-5 rounded-full bg-green-500 flex-shrink-0"></span>

                    <div>

                        <p class="font-semibold text-gray-700">
                            Hijau
                        </p>

                        <p class="text-sm text-gray-500">
                            Berat 10–15 Kg
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- Daftar Hewan -->

        <div class="grid lg:grid-cols-3 gap-8">

            @forelse($animals as $animal)

                <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition">

                    <img
                        src="{{ asset('storage/'.$animal->image) }}"
                        class="w-full h-72 object-cover">


                    <div class="p-7">

                        <h2 class="text-2xl font-bold">
                            {{ $animal->name }}
                        </h2>


                        <p class="text-gray-500 mt-2">

                            Grade :
                            {{ $animal->grade->name }}

                        </p>


                        <p class="text-gray-500">

                            Berat :
                            {{ $animal->weight }} Kg

                        </p>


                        <p class="text-gray-500">

                            Umur :
                            {{ $animal->age }} Thn

                        </p>


                        <p class="text-gray-500">

                            Kandang :
                            {{ $animal->cage->name }}

                        </p>


                        <a
                            href="{{ route('website.animal.detail', $animal->animal_code) }}"
                            class="mt-6 inline-block w-full text-center
                                   bg-[#0FA958] hover:bg-[#0d944f]
                                   text-white py-3 rounded-xl transition">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            @empty

                <div class="lg:col-span-3 text-center py-16">

                    <div class="text-5xl mb-4">
                        🐐
                    </div>

                    <h3 class="text-xl font-bold text-gray-700">
                        Hewan tidak ditemukan
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Belum tersedia hewan dengan grade yang dipilih.
                    </p>

                    <a
                        href="{{ route('website.animals') }}"
                        class="inline-block mt-5 bg-[#0FA958]
                               hover:bg-[#0d944f]
                               text-white px-6 py-3 rounded-xl">

                        Tampilkan Semua Hewan

                    </a>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection