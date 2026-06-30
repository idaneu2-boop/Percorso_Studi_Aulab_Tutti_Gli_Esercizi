@props([
    'image',
    'eyebrow',
    'title',
    'text',
    'icon' => 'bi-stars',
])

<article {{ $attributes->merge(['class' => 'nasa-mission-card']) }} data-aos="fade-up">
    <div class="nasa-mission-card__media">
        <img src="{{ $image }}" alt="{{ $title }}">
        <span class="nasa-mission-card__icon">
            <i class="bi {{ $icon }}" aria-hidden="true"></i>
        </span>
    </div>
    <div class="nasa-mission-card__body">
        <p class="nasa-card-eyebrow">{{ $eyebrow }}</p>
        <h3>{{ $title }}</h3>
        <p>{{ $text }}</p>
    </div>
</article>
