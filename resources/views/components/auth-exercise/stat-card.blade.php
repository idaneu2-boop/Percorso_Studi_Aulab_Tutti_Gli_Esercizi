@props([
    'value',
    'label',
    'icon',
])

<article {{ $attributes->merge(['class' => 'nasa-stat-card']) }} data-aos="fade-up">
    <i class="bi {{ $icon }}" aria-hidden="true"></i>
    <strong>{{ $value }}</strong>
    <span>{{ $label }}</span>
</article>
