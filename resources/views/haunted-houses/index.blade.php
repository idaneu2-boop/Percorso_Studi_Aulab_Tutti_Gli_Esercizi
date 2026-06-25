<x-haunted-houses.layout title="Tutte le case infestate - Dimore Spettrali">
    <section class="page-hero">
        <div class="container">
            <p class="eyebrow">
                <i class="bi bi-map"></i>
                Catalogo infestato
            </p>
            <h1>Tutte le case presenti sul portale</h1>
            <p>Dimore storiche, stanze con fama inquieta e nuove segnalazioni aggiunte dalla community.</p>
        </div>
    </section>

    <section class="section-spacing">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-ghost" role="alert">
                    <i class="bi bi-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-2">
                        <i class="bi bi-buildings"></i>
                        {{ $hauntedHouses->count() }} destinazioni
                    </p>
                    <h2 class="section-title-small">Scegli la prossima notte da ricordare</h2>
                </div>
                <a class="btn btn-primary-ghost" href="{{ route('haunted-houses.create') }}">
                    <i class="bi bi-plus-circle"></i>
                    Aggiungi casa
                </a>
            </div>

            <div class="row g-4">
                @forelse ($hauntedHouses as $hauntedHouse)
                    <div class="col-md-6 col-xl-4">
                        <x-haunted-houses.house-card :house="$hauntedHouse" />
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-emoji-dizzy"></i>
                            <h3>Il catalogo e ancora vuoto</h3>
                            <p>Puoi aggiungere la prima casa infestata compilando il form dedicato.</p>
                            <a class="btn btn-primary-ghost" href="{{ route('haunted-houses.create') }}">Aggiungi casa</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-haunted-houses.layout>
