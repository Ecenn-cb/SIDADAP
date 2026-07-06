@extends('layouts.website')

@section('title','Berita')

@section('content')

<!-- Hero -->

<section class="bg-gradient-to-r from-[#0FA958] to-[#12B75E] py-24">

    <div class="max-w-7xl mx-auto px-8 text-center">

        <h1 class="text-5xl font-black text-white">

            Berita & Informasi

        </h1>

        <p class="text-green-100 mt-6 text-lg max-w-3xl mx-auto">

            Temukan informasi terbaru, promo,
            dan pengumuman resmi dari Teman Aqiqah.

        </p>

    </div>

</section>

@if($featuredAnnouncement)

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <img
                src="{{ asset('storage/'.$featuredAnnouncement->image) }}"
                class="rounded-3xl shadow-xl h-[400px] object-cover w-full">

            <div>

                <span
                    class="bg-green-100 text-[#0FA958] px-5 py-2 rounded-full">

                    Berita Terbaru

                </span>

                <h2
                    class="text-4xl font-bold mt-8">

                    {{ $featuredAnnouncement->title }}

                </h2>

                <p
                    class="text-gray-600 leading-8 mt-6">

                    {{ \Illuminate\Support\Str::limit($featuredAnnouncement->description,300) }}

                </p>

                <a
                    href="{{ route('website.announcement.detail',$featuredAnnouncement->id) }}"
                    class="inline-block mt-8 bg-[#0FA958] text-white px-8 py-4 rounded-2xl">

                    Baca Selengkapnya

                </a>

            </div>

        </div>

    </div>

</section>

@endif

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-3 gap-8">

            @foreach($announcements as $announcement)

            <div
                class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition">

                <img
                    src="{{ asset('storage/'.$announcement->image) }}"
                    class="h-64 w-full object-cover">

                <div class="p-7">

                    <small class="text-gray-400">

                        {{ $announcement->created_at->format('d F Y') }}

                    </small>

                    <h3
                        class="text-2xl font-bold mt-3">

                        {{ $announcement->title }}

                    </h3>

                    <p
                        class="text-gray-500 mt-4 leading-7">

                        {{ \Illuminate\Support\Str::limit($announcement->description,120) }}

                    </p>

                    <a
                        href="{{ route('website.announcement.detail',$announcement->id) }}"
                        class="inline-block mt-6 text-[#0FA958] font-semibold">

                        Baca Selengkapnya →

                    </a>

                </div>

            </div>

            @endforeach

        </div>

        <div class="mt-16">

            {{ $announcements->links() }}

        </div>

    </div>

</section>

@endsection