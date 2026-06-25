<x-anime-tv.layout title="I vostri Anime Preferiti - Anime.TV" header-title="I vostri Anime Preferiti">
    <section class="container anime-tv-section">
        @if (session('status'))
            <div class="alert anime-tv-alert" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="anime-tv-section-heading">
            <p class="anime-tv-kicker">
                <i class="bi bi-collection-play"></i>
                Community
            </p>
            <h2>I vostri Anime Inseriti</h2>
        </div>

        <div class="row g-4">
            @forelse ($animes as $anime)
                <div class="col-12 col-md-6 col-xl-4">
                    <article class="anime-tv-submitted-card h-100">
                        <h2>{{ $anime->title }}</h2>
                        <p class="anime-tv-submitted-genre">{{ $anime->genre }}</p>
                        <p>{{ $anime->synopsis }}</p>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="anime-tv-empty">
                        <h2>Nessun anime inserito</h2>
                        <p>Puoi aggiungere il primo anime preferito dal form dedicato.</p>
                        <a class="btn btn-anime-primary" href="{{ route('anime-tv.create') }}">Inserisci Anime</a>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
</x-anime-tv.layout>
