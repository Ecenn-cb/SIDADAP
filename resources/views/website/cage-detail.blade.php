@extends('layouts.website')

@section('title', $cage->name)

@section('content')

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="bg-white rounded-3xl shadow-lg p-10">

            <span class="inline-block px-4 py-2 rounded-full bg-green-100 text-[#0FA958]">

                {{ $cage->cage_code }}

            </span>

            <h1 class="text-4xl font-bold mt-6">

                {{ $cage->name }}

            </h1>

            <p class="text-gray-500 mt-3">

                Total Hewan :
                <strong>{{ $animals->count() }}</strong>

            </p>

        </div>

    </div>

</section>

<section class="py-16 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-3 gap-8">

            @forelse($animals as $animal)

                <div class="bg-white rounded-3xl shadow hover:shadow-xl transition overflow-hidden">

                    <img
                        src="{{ asset('storage/'.$animal->image) }}"
                        class="h-64 w-full object-cover">

                    <div class="p-6">

                        <h3 class="text-2xl font-bold">

                            {{ $animal->name }}

                        </h3>

                        <p class="text-gray-500 mt-2">

                            {{ $animal->animal_code }}

                        </p>

                        <p class="text-gray-500">

                            Grade :
                            {{ $animal->grade->name }}

                        </p>

                        <p class="text-gray-500">

                            Berat :
                            {{ $animal->weight }} Kg

                        </p>

                        <a
                            href="{{ route('website.animal.detail', $animal->animal_code) }}"
                            class="mt-6 inline-block w-full text-center bg-[#0FA958] text-white py-3 rounded-xl">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center py-20">

                    <h2 class="text-2xl font-bold text-gray-500">

                        Belum ada hewan pada kandang ini.

                    </h2>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection