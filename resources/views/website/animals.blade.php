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

        <div class="grid lg:grid-cols-3 gap-8">

            @foreach($animals as $animal)

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
                        class="mt-6 inline-block w-full text-center bg-[#0FA958] hover:bg-[#0d944f] text-white py-3 rounded-xl transition">

                        Lihat Detail

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection