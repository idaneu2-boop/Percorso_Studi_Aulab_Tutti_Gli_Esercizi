@props(['anime'])

@php
    $title = data_get($anime, 'title') ?: 'Anime senza titolo';
    $synopsis = data_get($anime, 'synopsis') ?: 'Nessuna sinossi disponibile.';
    $image = data_get($anime, 'images.jpg.image_url') ?: asset('media/anime-tv/gojo.jpg');
    $animeId = (int) data_get($anime, 'mal_id', 1);
@endphp

<article class="anime-tv-card h-100">
    <img src="{{ $image }}" class="anime-tv-card-image" alt="{{ $title }}" loading="lazy">

    <div class="anime-tv-card-body">
        <h2>{{ $title }}</h2>
        <p title="{{ $synopsis }}">{{ \Illuminate\Support\Str::limit($synopsis, 92) }}</p>
        <a href="{{ route('anime-tv.show', ['animeId' => $animeId, 'slug' => \Illuminate\Support\Str::slug($title)]) }}" class="btn btn-anime-primary">
            Vai al dettaglio
        </a>
    </div>
</article>
