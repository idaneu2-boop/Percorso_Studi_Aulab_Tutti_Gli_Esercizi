@props(['announcement'])

@php
    $isDatabaseAnnouncement = $announcement instanceof \App\Models\Announcement;
    $sourceType = data_get($announcement, 'source_type', 'community');
    $sourceLabel = data_get($announcement, 'source_label', 'Community');
    $detailUrl = $isDatabaseAnnouncement
        ? route('announcements.show', $announcement)
        : route('announcements.static.show', $announcement->slug);
    $cardImage = $isDatabaseAnnouncement && $announcement->image_path
        ? asset('storage/'.$announcement->image_path)
        : null;
@endphp

<article {{ $attributes->merge(['class' => 'announcement-card h-100']) }} data-aos="fade-up">
    @if ($isDatabaseAnnouncement)
        <x-announcement-image :src="$cardImage" :alt="'Scenario '.$announcement->category.' GTA VI'" />
    @endif

    <div class="d-flex flex-wrap justify-content-between gap-3 mb-3">
        <div class="d-flex flex-wrap gap-2">
            <span class="neon-badge">
                <i class="bi bi-tags-fill" aria-hidden="true"></i>
                <span>{{ $announcement->category }}</span>
            </span>
            <x-source-badge :type="$sourceType" :label="$sourceLabel" />
        </div>
        @if ($announcement->is_spoiler)
            <span class="spoiler-badge">
                <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                <span>Spoiler</span>
            </span>
        @endif
    </div>

    <h2 class="card-title h5">{{ $announcement->title }}</h2>
    <p class="card-meta">
        <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
        <span>{{ $announcement->location ?: 'Leonida' }}</span>
        <span>/</span>
        <i class="bi bi-calendar-event" aria-hidden="true"></i>
        <span>{{ $announcement->created_at->format('d/m/Y') }}</span>
    </p>
    <p class="card-preview">{{ \Illuminate\Support\Str::limit($announcement->body, 150) }}</p>

    <div class="card-footer-row">
        <span>
            <i class="bi bi-speedometer2" aria-hidden="true"></i>
            Affidabilita {{ $announcement->credibility }}/5
        </span>
        <a class="text-link" href="{{ $detailUrl }}">
            <span>Dettaglio</span>
            <i class="bi bi-arrow-right-circle-fill" aria-hidden="true"></i>
        </a>
    </div>
</article>
