@props([
    'icon' => null,
])

<button {{ $attributes->merge(['class' => 'btn btn-nasa btn-lg']) }}>
    @if ($icon)
        <i class="bi {{ $icon }}" aria-hidden="true"></i>
    @endif
    {{ $slot }}
</button>
