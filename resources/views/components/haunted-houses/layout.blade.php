@props(['title' => 'Dimore Spettrali'])

<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <link rel="icon" type="image/svg+xml" href="{{ asset('haunted-house-favicon.svg') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tai+Heritage+Pro:wght@400;700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/haunted-houses.css') }}">
    </head>
    <body class="haunted-houses-body">
        <x-haunted-houses.navbar />

        <main>
            {{ $slot }}
        </main>

        <x-haunted-houses.footer />
        <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}" defer></script>
    </body>
</html>
