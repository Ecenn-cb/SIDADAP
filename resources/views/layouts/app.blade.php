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

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

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

    <script>

    document.addEventListener('DOMContentLoaded', function () {

        const btn = document.getElementById('notificationButton');
        const dropdown = document.getElementById('notificationDropdown');

        if(btn){

            btn.addEventListener('click', function(e){

                e.stopPropagation();

                dropdown.classList.toggle('hidden');

                // Jika dropdown dibuka
                if(!dropdown.classList.contains('hidden')){

                    fetch("{{ route('notifications.read') }}", {

                        method: "POST",

                        headers: {

                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),

                            "Accept": "application/json"

                        }

                    })
                    .then(response => response.json())
                    .then(data => {

                        if(data.success){

                            // Hilangkan badge merah
                            const badge = document.getElementById('notificationBadge');

                            if(badge){
                                badge.remove();
                            }

                        }

                    });

                }

            });

            document.addEventListener('click', function(){

                dropdown.classList.add('hidden');

            });

        }

    });

    </script>

</body>

</html>