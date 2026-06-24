@props([
    'title' => 'Vice City',
    'subtitle' => 'Rumor, leak e aggiornamenti dalla community in attesa di GTA VI.',
    'kicker' => 'GTA VI',
])

<header class="hero-section">
    <div class="hero-overlay">
        <div class="container">
            <div class="row align-items-end min-vh-hero">
                <div class="col-lg-8">
                    <img class="hero-logo" src="{{ asset('GTA-6-Logo-PNG-from-Grand-Theft-Auto-VI-Transparent-jpg.png') }}" alt="Grand Theft Auto VI" data-aos="zoom-in">
                    <p class="hero-kicker" data-aos="fade-right">{{ $kicker }}</p>
                    <h1 class="hero-title" data-aos="fade-up">{{ $title }}</h1>
                    @if ($subtitle)
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">{{ $subtitle }}</p>
                    @endif
                    <div class="d-flex flex-column flex-sm-row gap-3 mt-4" data-aos="fade-up" data-aos-delay="180">
                        @if (! request()->routeIs('announcements.create'))
                            <a class="btn btn-neon" href="{{ route('announcements.create') }}">
                                <i class="bi bi-megaphone-fill" aria-hidden="true"></i>
                                <span>Carica una notizia</span>
                            </a>
                        @endif
                        @if (! request()->routeIs('announcements.index'))
                            <a class="btn btn-outline-neon" href="{{ route('announcements.index') }}">
                                <i class="bi bi-card-list" aria-hidden="true"></i>
                                <span>Leggi la board</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
