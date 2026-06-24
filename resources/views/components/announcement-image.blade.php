@props([
    'src' => null,
    'alt' => 'Immagine annuncio GTA VI',
    'variant' => 'card',
])

@php
    $hasImage = filled($src);
    $wrapperClass = $variant === 'detail' ? 'announcement-image-wrap detail-image-wrap' : 'announcement-image-wrap card-image-wrap';
    $imageClass = $variant === 'detail' ? 'detail-hero-image' : 'announcement-card-image';
@endphp

<div class="{{ $wrapperClass }}">
    @if ($hasImage)
        <img class="{{ $imageClass }}" src="{{ $src }}" alt="{{ $alt }}">
    @else
        <div class="{{ $imageClass }} image-unavailable" role="img" aria-label="Immagine non disponibile">
            <img src="{{ asset('Rockstar-Games-Logo-emblem-of-the-renowned-game-developer-transparent-png-jpg.png') }}" alt="">
            <span>Immagine non disponibile</span>
        </div>
    @endif
</div>
