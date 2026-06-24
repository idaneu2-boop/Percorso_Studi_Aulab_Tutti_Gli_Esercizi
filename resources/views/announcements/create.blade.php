<x-layout
    title="Carica leak GTA VI"
    header-title="Carica un annuncio"
    header-subtitle="Invia una notizia, un rumor o un leak: verra salvato e mostrato nella board."
    header-kicker="Upload center"
>
    <section class="section-band">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="form-visual-card">
                        <img src="{{ asset($formPanel['image']) }}" alt="{{ $formPanel['alt'] }}">
                        <div>
                            <span class="neon-badge mb-3">
                                <i class="bi {{ $formPanel['icon'] }}" aria-hidden="true"></i>
                                <span>{{ $formPanel['badge'] }}</span>
                            </span>
                            <h2>{{ $formPanel['title'] }}</h2>
                            <p>{{ $formPanel['text'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form class="form-panel" method="POST" action="{{ route('announcements.store') }}" enctype="multipart/form-data" data-aos="fade-up">
                        @csrf

                        <div class="row g-3">
                            <x-form-field class="col-md-6" name="reporter_name" label="Nome" icon="bi-person-fill" required />
                            <x-form-field class="col-md-6" type="email" name="reporter_email" label="Email" icon="bi-envelope-at-fill" required />
                            <x-form-field name="title" label="Titolo annuncio" icon="bi-type" required />
                            <x-form-field class="col-md-6" type="select" name="category" label="Categoria" icon="bi-tags-fill" :options="$categories" placeholder="Scegli categoria" required />
                            <x-form-field class="col-md-6" name="location" label="Zona di Leonida" icon="bi-geo-alt-fill" placeholder="Vice Beach, Port Gellhorn..." />
                            <div class="col-12">
                                <label class="form-label d-flex justify-content-between" for="credibility">
                                    <span>
                                        <i class="bi bi-speedometer2" aria-hidden="true"></i>
                                        Affidabilita
                                    </span>
                                    <span><strong class="js-range-value">3</strong>/5</span>
                                </label>
                                <input class="form-range @error('credibility') is-invalid @enderror" id="credibility" type="range" name="credibility" min="1" max="5" value="{{ old('credibility', 3) }}" data-range-output=".js-range-value">
                                @error('credibility')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <x-form-field type="textarea" name="body" label="Testo della notizia" icon="bi-journal-text" rows="3" required />
                            <x-form-field
                            type="file"
                            name="image"
                            label="Immagine annuncio"
                            icon="bi-image-fill"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            hint='Opzionale.'
                            />
                            <div class="col-12">
                                <div class="form-check neon-check">
                                    <input class="form-check-input" id="is_spoiler" type="checkbox" name="is_spoiler" value="1" @checked(old('is_spoiler'))>
                                    <label class="form-check-label" for="is_spoiler">
                                        <i class="bi bi-eye-slash-fill" aria-hidden="true"></i>
                                        <span>Contiene spoiler</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a class="btn btn-outline-neon" href="{{ route('announcements.index') }}">
                                <i class="bi bi-x-circle" aria-hidden="true"></i>
                                <span>Annulla</span>
                            </a>
                            <button class="btn btn-neon" type="submit">
                                <i class="bi bi-send-fill" aria-hidden="true"></i>
                                <span>Pubblica annuncio</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
