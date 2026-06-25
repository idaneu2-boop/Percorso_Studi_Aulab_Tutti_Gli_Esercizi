@php
    $title = data_get($anime, 'title') ?: 'Dettaglio anime';
    $image = data_get($anime, 'images.jpg.large_image_url') ?: asset('media/anime-tv/gojo.jpg');
    $genres = data_get($anime, 'genres', []);
    $episodes = data_get($anime, 'episodes') ?: 'N/D';
    $synopsis = data_get($anime, 'synopsis') ?: 'Nessuna sinossi disponibile.';
    $trailer = data_get($anime, 'trailer.embed_url');
@endphp

<x-anime-tv.layout :title="$title.' - Anime.TV'" :header-title="$title">
    <section class="container anime-tv-section">
        <div class="anime-tv-detail">
            <div>
                <img src="{{ $image }}" class="anime-tv-detail-image" alt="{{ $title }}">
            </div>

            <div class="anime-tv-detail-copy">
                <p class="anime-tv-detail-label">Generi</p>
                <ul class="anime-tv-genre-list">
                    @forelse ($genres as $genre)
                        <li>{{ data_get($genre, 'name') }}</li>
                    @empty
                        <li>Nessun genere disponibile</li>
                    @endforelse
                </ul>

                <p class="anime-tv-detail-label">Numero di episodi</p>
                <p>{{ $episodes }}</p>

                <p class="anime-tv-detail-label">Sinossi</p>
                <p>{{ $synopsis }}</p>

                @if ($trailer)
                    <p class="anime-tv-detail-label">Trailer</p>
                    <div class="anime-tv-trailer">
                        <iframe src="{{ $trailer }}" title="Trailer {{ $title }}" allowfullscreen></iframe>
                    </div>
                @endif

                <a href="{{ route('anime-tv.home') }}" class="btn btn-anime-primary mt-4">Torna alla Homepage</a>
            </div>
        </div>
    </section>
</x-anime-tv.layout>
