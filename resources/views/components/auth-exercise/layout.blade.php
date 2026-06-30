@props([
    'title' => 'NASA Mission Control',
    'showNav' => true,
    'showFooter' => true,
    'bodyClass' => '',
])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }} | NASA Mission Control</title>

        <link rel="icon" type="image/png" href="{{ asset('media/autenticazione/logo.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('media/autenticazione/logo.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        @vite(['resources/css/autenticazione.css', 'resources/js/autenticazione.js'])
    </head>
    <body {{ $attributes->merge(['class' => trim('nasa-site '.$bodyClass)]) }}>
        @if ($showNav)
            <x-auth-exercise.navbar />
        @endif

        {{ $slot }}

        @if ($showFooter)
            <x-auth-exercise.footer />
        @endif
    </body>
</html>
