@props(['title' => 'Anime.TV', 'headerTitle' => 'Anime.TV'])

<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <link rel="icon" type="image/jpeg" href="{{ asset('media/anime-tv/gojo.jpg') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Righteous&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/anime-tv.css') }}">
    </head>
    <body class="anime-tv-body">
        <x-anime-tv.navbar />
        <x-anime-tv.header :title="$headerTitle" />

        <main class="anime-tv-main">
            {{ $slot }}
        </main>

        <x-anime-tv.footer />
        <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}" defer></script>
    </body>
</html>
