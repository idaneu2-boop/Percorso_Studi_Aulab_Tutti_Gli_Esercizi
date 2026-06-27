@props([
    'title' => 'GTA VI Hub',
    'headerTitle' => null,
    'headerSubtitle' => null,
    'headerKicker' => 'Vice City Dispatch',
])

<!doctype html>
<html lang="it" data-theme="dark" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <link rel="icon" type="image/png" href="{{ asset('Rockstar-Games-Logo-emblem-of-the-renowned-game-developer-transparent-png-jpg.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Contrail+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <x-fluid-assets target="head" />
    </head>
    <body class="site-body">
        <div class="scroll-progress" data-scroll-progress aria-hidden="true"></div>
        <x-navbar />

        @if ($headerTitle)
            <x-header :title="$headerTitle" :subtitle="$headerSubtitle" :kicker="$headerKicker" />
        @endif

        <main class="site-main">
            @if (session('status'))
                <div class="container pt-4">
                    <div class="alert neon-alert mb-0" data-aos="fade-down">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            {{ $slot }}
        </main>

        <x-footer />
        <x-fluid-assets target="body" />
    </body>
</html>
