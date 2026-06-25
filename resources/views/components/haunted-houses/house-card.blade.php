@props(['house'])

<article class="haunted-card h-100">
    @if ($house->image_url)
        <img src="{{ $house->image_url }}" class="haunted-card-image" alt="{{ $house->name }}">
    @else
        <div class="haunted-card-placeholder">
            <i class="bi bi-house-lock"></i>
        </div>
    @endif

    <div class="haunted-card-body">
        <div class="d-flex align-items-center justify-content-between gap-3">
            <span class="location-badge">
                <i class="bi bi-geo-alt"></i>
                {{ $house->location }}
            </span>
            @if ($house->is_recommended)
                <span class="recommended-badge">Top</span>
            @endif
        </div>

        <h3>{{ $house->name }}</h3>
        <p>{{ $house->description }}</p>

        <div class="haunted-card-footer">
            <span>da</span>
            <strong>{{ number_format((float) $house->price_per_night, 2, ',', '.') }} EUR</strong>
            <span>/ notte</span>
        </div>
    </div>
</article>
