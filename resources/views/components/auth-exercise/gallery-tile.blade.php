@props([
    'image',
    'title',
    'caption',
])

<article {{ $attributes->merge(['class' => 'nasa-gallery-tile']) }} data-aos="zoom-in">
    <img src="{{ $image }}" alt="{{ $title }}">
    <div>
        <h3>{{ $title }}</h3>
        <p>{{ $caption }}</p>
    </div>
</article>
