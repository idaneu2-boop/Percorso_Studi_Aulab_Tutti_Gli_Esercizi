@props([
    'actionIcon' => null,
    'actionLabel' => null,
    'actionRoute' => null,
    'actionUrl' => null,
    'icon' => null,
    'kicker' => null,
    'text' => null,
    'title',
])

<div {{ $attributes->merge(['class' => 'section-heading']) }} data-aos="fade-up">
    <div>
        @if ($kicker)
            <p class="section-kicker">
                @if ($icon)
                    <i class="bi {{ $icon }}" aria-hidden="true"></i>
                @endif
                <span>{{ $kicker }}</span>
            </p>
        @endif

        <h2 class="section-title">{{ $title }}</h2>

        @if ($text)
            <p class="section-text">{{ $text }}</p>
        @endif
    </div>

    @if ($actionLabel && ($actionRoute || $actionUrl))
        <a class="btn btn-neon" href="{{ $actionRoute ? route($actionRoute) : $actionUrl }}">
            @if ($actionIcon)
                <i class="bi {{ $actionIcon }}" aria-hidden="true"></i>
            @endif
            <span>{{ $actionLabel }}</span>
        </a>
    @endif
</div>
