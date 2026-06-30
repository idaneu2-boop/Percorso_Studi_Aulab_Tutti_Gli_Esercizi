@props([
    'eyebrow',
    'title',
    'text' => null,
])

<div {{ $attributes->merge(['class' => 'nasa-section-heading']) }} data-aos="fade-up">
    <p class="nasa-eyebrow">{{ $eyebrow }}</p>
    <h2>{{ $title }}</h2>

    @if ($text)
        <p>{{ $text }}</p>
    @endif
</div>
