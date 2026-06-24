@props([
    'delay' => 0,
    'label',
    'title',
    'youtubeId',
])

<article {{ $attributes->merge(['class' => 'trailer-card']) }} data-aos="fade-up" @if ($delay) data-aos-delay="{{ $delay }}" @endif>
    <div class="trailer-frame-wrap">
        <iframe
            class="trailer-frame"
            src="https://www.youtube-nocookie.com/embed/{{ $youtubeId }}"
            title="{{ $title }} GTA VI"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"
        ></iframe>
    </div>
    <div class="trailer-card-body">
        <span class="trailer-label">
            <i class="bi bi-play-circle-fill" aria-hidden="true"></i>
            {{ $label }}
        </span>
        <h3>{{ $title }}</h3>
    </div>
</article>
