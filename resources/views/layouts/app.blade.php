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

    <title>Teman Aqiqah</title>

    <!-- Font -->

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=Poppins:300,400,500,600,700&display=swap"
        rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-[#F5F7FA] font-[Poppins] overflow-hidden">

    <div class="flex h-screen">

        <!-- Sidebar -->

        @include('layouts.sidebar')

        <!-- Content -->

        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Topbar -->

            @include('layouts.topbar')

            <!-- Main -->

            <main
                class="flex-1 overflow-y-auto p-8">

                {{ $slot }}

            </main>

        </div>

    </div>

</body>

</html>