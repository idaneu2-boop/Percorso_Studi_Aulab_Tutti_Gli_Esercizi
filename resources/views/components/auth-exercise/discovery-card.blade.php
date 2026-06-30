@props([
    'icon',
    'title',
    'text',
])

<article {{ $attributes->merge(['class' => 'nasa-discovery-card']) }} data-aos="fade-up">
    <span>
        <i class="bi {{ $icon }}" aria-hidden="true"></i>
    </span>
    <h3>{{ $title }}</h3>
    <p>{{ $text }}</p>
</article>
