<x-anime-tv.layout title="Anime.TV" header-title="Anime.TV">
    <section class="container anime-tv-section">
        @if (session('status'))
            <div class="alert anime-tv-alert" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="anime-tv-section-heading">
            <p class="anime-tv-kicker">
                <i class="bi bi-broadcast"></i>
                Catalogo live
            </p>
            <h2>Anime caricati dalla Jikan API</h2>
        </div>

        <div class="row g-4">
            @foreach ($animes as $anime)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <x-anime-tv.card :anime="$anime" />
                </div>
            @endforeach
        </div>
    </section>
</x-anime-tv.layout>
