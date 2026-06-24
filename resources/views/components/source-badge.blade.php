@props([
    'label' => 'Community',
    'type' => 'community',
])

@php
    $badgeClass = match ($type) {
        'official' => 'source-badge source-badge-official',
        'reported_leak' => 'source-badge source-badge-leak',
        default => 'source-badge source-badge-community',
    };

    $icon = match ($type) {
        'official' => 'bi-patch-check-fill',
        'reported_leak' => 'bi-radar',
        default => 'bi-person-fill',
    };
@endphp

<span {{ $attributes->merge(['class' => $badgeClass]) }}>
    <i class="bi {{ $icon }}" aria-hidden="true"></i>
    <span>{{ $label }}</span>
</span>
