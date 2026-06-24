@php
    $isDatabaseAnnouncement = $announcement instanceof \App\Models\Announcement;
    $sourceType = data_get($announcement, 'source_type', 'community');
    $sourceLabel = data_get($announcement, 'source_label', 'Community');
    $sourceUrl = data_get($announcement, 'source_url');
    $detailImage = $isDatabaseAnnouncement
        ? ($announcement->image_path ? asset('storage/'.$announcement->image_path) : null)
        : data_get($announcement, 'detail_image_url');
@endphp

<x-layout
    title="{{ $announcement->title }}"
    header-title="{{ $announcement->title }}"
    header-subtitle="Dettaglio della segnalazione caricata da {{ $announcement->reporter_name }}."
    header-kicker="{{ $announcement->category }}"
>
    <section class="section-band">
        <div class="container">
            <div class="detail-layout">
                <article class="detail-panel" data-aos="fade-up">
                    <x-announcement-image :src="$detailImage" variant="detail" :alt="'Ambientazione '.$announcement->category.' GTA VI'" />

                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="neon-badge">
                            <i class="bi bi-tags-fill" aria-hidden="true"></i>
                            <span>{{ $announcement->category }}</span>
                        </span>
                        <x-source-badge :type="$sourceType" :label="$sourceLabel" />
                        <span class="meta-badge">
                            <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                            <span>{{ $announcement->location ?: 'Leonida' }}</span>
                        </span>
                        <span class="meta-badge">
                            <i class="bi bi-speedometer2" aria-hidden="true"></i>
                            <span>Affidabilita {{ $announcement->credibility }}/5</span>
                        </span>
                        @if ($announcement->is_spoiler)
                            <span class="spoiler-badge">
                                <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                                <span>Spoiler</span>
                            </span>
                        @endif
                    </div>

                    @if ($announcement->is_spoiler)
                        <div class="spoiler-warning">
                            <p class="mb-3">
                                <i class="bi bi-exclamation-diamond-fill" aria-hidden="true"></i>
                                <span>Questo annuncio contiene dettagli spoiler.</span>
                            </p>
                            <button class="btn btn-outline-neon" type="button" data-spoiler-toggle="#spoilerContent" aria-controls="spoilerContent" aria-expanded="false">
                                <i class="bi bi-eye-fill" aria-hidden="true"></i>
                                <span>Mostra contenuto</span>
                            </button>
                        </div>
                        <div class="spoiler-panel" id="spoilerContent">
                            <p>{{ $announcement->body }}</p>
                        </div>
                    @else
                        <p class="detail-body">{{ $announcement->body }}</p>
                    @endif
                </article>

                <aside class="detail-sidebar" data-aos="fade-left">
                    <h2 class="h5">
                        <i class="bi bi-person-badge-fill" aria-hidden="true"></i>
                        <span>Reporter</span>
                    </h2>
                    <p class="mb-1">
                        <i class="bi bi-person-fill" aria-hidden="true"></i>
                        <span>{{ $announcement->reporter_name }}</span>
                    </p>
                    <p class="sidebar-muted">
                        <i class="bi bi-envelope-at-fill" aria-hidden="true"></i>
                        <span>{{ $announcement->reporter_email }}</span>
                    </p>
                    <hr>
                    <p class="sidebar-muted mb-4">
                        <i class="bi bi-clock-fill" aria-hidden="true"></i>
                        <span>Pubblicato il {{ $announcement->created_at->format('d/m/Y H:i') }}</span>
                    </p>
                    @if ($sourceUrl)
                        <a class="text-link mb-4" href="{{ $sourceUrl }}" target="_blank" rel="noreferrer">
                            <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                            <span>Apri fonte</span>
                        </a>
                    @endif
                    <a class="btn btn-neon w-100 mb-3" href="{{ route('announcements.create') }}">
                        <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                        <span>Aggiungi un altro leak</span>
                    </a>
                    <a class="btn btn-outline-neon w-100" href="{{ route('announcements.index') }}">
                        <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
                        <span>Torna alla board</span>
                    </a>
                </aside>
            </div>
        </div>
    </section>
</x-layout>
