@extends('layouts.website')

@section('title',$announcement->title)

@section('content')

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-5xl mx-auto px-8 text-center">

        <h1 class="text-5xl font-black text-white">

            {{ $announcement->title }}

        </h1>

        <p class="text-green-100 mt-6">

            {{ $announcement->created_at->format('d F Y') }}

        </p>

    </div>

</section>

<section class="py-24 bg-white">

    <div class="max-w-4xl mx-auto px-8">

        <img
            src="{{ asset('storage/'.$announcement->image) }}"
            class="rounded-3xl shadow-xl w-full">

        <div
            class="prose prose-lg max-w-none mt-10">

            {!! nl2br(e($announcement->description)) !!}

        </div>

    </div>

</section>

@if($latestAnnouncements->count())

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <h2
            class="text-3xl font-bold mb-10">

            Berita Lainnya

        </h2>

        <div
            class="grid lg:grid-cols-4 gap-8">

            @foreach($latestAnnouncements as $item)

            <a
                href="{{ route('website.announcement.detail',$item->id) }}"
                class="bg-white rounded-3xl shadow hover:shadow-xl overflow-hidden">

                <img
                    src="{{ asset('storage/'.$item->image) }}"
                    class="h-48 w-full object-cover">

                <div class="p-5">

                    <h3
                        class="font-bold">

                        {{ $item->title }}

                    </h3>

                </div>

            </a>

            @endforeach

        </div>

    </div>

</section>

@endif

@endsection