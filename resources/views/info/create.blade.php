<x-layout
    title="Richiedi info"
    header-title="Richiedi informazioni"
    header-subtitle="Compila il form e il team si occuperà di ricontattarti."
    header-kicker="Mail center"
>
    <section class="section-band">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="info-logo-card">
                        <img src="{{ asset('Rockstar-Games-Logo-emblem-of-the-renowned-game-developer-transparent-png-jpg.png') }}" alt="Rockstar Games">
                    </div>
                    <x-section-heading
                        :icon="$infoPanel['icon']"
                        :kicker="$infoPanel['kicker']"
                        :title="$infoPanel['title']"
                        :text="$infoPanel['text'] ?? null"
                        class="section-heading-stack"
                    />
                </div>
                <div class="col-lg-7">
                    <form class="form-panel" method="POST" action="{{ route('info.store') }}" data-aos="fade-up">
                        @csrf

                        <div class="row g-3">
                            <x-form-field class="col-md-6" name="name" label="Nome" icon="bi-person-fill" required />
                            <x-form-field class="col-md-6" type="email" name="email" label="Email" icon="bi-envelope-at-fill" required />
                            <x-form-field type="select" name="topic" label="Argomento" icon="bi-chat-square-dots-fill" :options="$topics" placeholder="Scegli argomento" required />
                            <x-form-field type="textarea" name="message" label="Messaggio" icon="bi-pencil-square" rows="7" required />
                        </div>

                        <div class="form-actions">
                            <a class="btn btn-outline-neon" href="{{ route('gta.home') }}">
                                <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
                                <span>Torna home</span>
                            </a>
                            <button class="btn btn-neon" type="submit">
                                <i class="bi bi-send-fill" aria-hidden="true"></i>
                                <span>Invia richiesta</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
