<x-haunted-houses.layout title="Aggiungi casa infestata - Dimore Spettrali">
    <section class="page-hero page-hero-compact">
        <div class="container">
            <p class="eyebrow">
                <i class="bi bi-house-add"></i>
                Nuova segnalazione
            </p>
            <h1>Aggiungi la tua casa infestata</h1>
            <p>Inserisci nome, localita e prezzo del soggiorno. La dimora apparira nel catalogo pubblico.</p>
        </div>
    </section>

    <section class="section-spacing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form class="haunted-form" method="POST" action="{{ route('haunted-houses.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label" for="name">Nome casa infestata</label>
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Es. Villa delle Ombre"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="location">Localita</label>
                            <input
                                class="form-control @error('location') is-invalid @enderror"
                                type="text"
                                id="location"
                                name="location"
                                value="{{ old('location') }}"
                                placeholder="Es. Torino, Italia"
                                required
                            >
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="price_per_night">Prezzo soggiorno per notte</label>
                            <div class="input-group">
                                <span class="input-group-text">EUR</span>
                                <input
                                    class="form-control @error('price_per_night') is-invalid @enderror"
                                    type="number"
                                    id="price_per_night"
                                    name="price_per_night"
                                    value="{{ old('price_per_night') }}"
                                    min="1"
                                    step="0.01"
                                    placeholder="180.00"
                                    required
                                >
                                @error('price_per_night')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row gap-3">
                            <button class="btn btn-primary-ghost" type="submit">
                                <i class="bi bi-save"></i>
                                Salva casa
                            </button>
                            <a class="btn btn-outline-ghost" href="{{ route('haunted-houses.index') }}">Torna al catalogo</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-haunted-houses.layout>
