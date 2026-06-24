<x-layout
    title="Annunci GTA VI"
    header-title="Board annunci e leak"
    header-subtitle="Leggi le notizie caricate dalla community."
    header-kicker="Community feed"
>
    <section class="section-band">
        <div class="container">
            <x-section-heading
                icon="bi-database-fill"
                kicker="Lista Annunci"
                title="Ultime segnalazioni"
                action-route="announcements.create"
                action-label="Carica annuncio"
                action-icon="bi-plus-circle-fill"
            />

            @if ($announcements->isEmpty())
                <div class="empty-state" data-aos="fade-up">
                    <i class="bi bi-broadcast-pin empty-icon" aria-hidden="true"></i>
                    <h3>Nessun leak pubblicato.</h3>
                    <p>La board e ancora vuota: carica la prima notizia su Vice City.</p>
                    <a class="btn btn-outline-neon" href="{{ route('announcements.create') }}">
                        <i class="bi bi-rocket-takeoff-fill" aria-hidden="true"></i>
                        <span>Inizia ora</span>
                    </a>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($announcements as $announcement)
                        <div class="col-md-6 col-xl-4">
                            <x-announcement-card :announcement="$announcement" />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>
