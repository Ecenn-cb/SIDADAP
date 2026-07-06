@extends('layouts.website')

@section('title','Detail Hewan')

@section('content')

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-7xl mx-auto px-8">

        <h1 class="text-5xl font-black text-white">

            Detail Hewan

        </h1>

    </div>

</section>

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-16">

            <img
                src="{{ asset('storage/'.$animal->image) }}"
                class="rounded-3xl shadow-xl">

            <div>

                <h2 class="text-4xl font-bold">

                    {{ $animal->category->name }}

                </h2>

                <div class="mt-8 space-y-5">

                    <div class="flex justify-between border-b pb-3">

                        <span>Grade</span>

                        <strong>{{ $animal->grade->name }}</strong>

                    </div>

                    <div class="flex justify-between border-b pb-3">

                        <span>Berat</span>

                        <strong>{{ $animal->weight }} Kg</strong>

                    </div>

                    <div class="flex justify-between border-b pb-3">

                        <span>Umur</span>

                        <strong>{{ $animal->age }}</strong>

                    </div>

                    <div class="flex justify-between border-b pb-3">

                        <span>Jenis Kelamin</span>

                        <strong>{{ ucfirst($animal->gender) }}</strong>

                    </div>

                    <div class="flex justify-between border-b pb-3">

                        <span>Kandang</span>

                        <strong>{{ $animal->cage->name }}</strong>

                    </div>

                </div>

                <a
                    href="{{ route('website.contact') }}"
                    class="inline-block mt-10 bg-[#0FA958] text-white px-8 py-4 rounded-2xl">

                    Hubungi Kami

                </a>

            </div>

        </div>

    </div>

</section>

@endsection