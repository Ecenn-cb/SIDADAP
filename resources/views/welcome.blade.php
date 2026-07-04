<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Teman Aqiqah</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-gray-50">

    @include('landing.navbar')

    @include('landing.hero')

    @include('landing.about')

    @include('landing.package')

    @include('landing.animal')

    @include('landing.announcement')

    @include('landing.contact')

    @include('landing.footer')

</body>

</html>