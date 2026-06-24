@props([
    'delay' => 0,
    'icon',
    'text',
    'title',
])

<article {{ $attributes->merge(['class' => 'feature-card']) }} data-aos="zoom-in" @if ($delay) data-aos-delay="{{ $delay }}" @endif>
    <span class="feature-icon"><i class="bi {{ $icon }}" aria-hidden="true"></i></span>
    <h3>{{ $title }}</h3>
    <p>{{ $text }}</p>
</article>
