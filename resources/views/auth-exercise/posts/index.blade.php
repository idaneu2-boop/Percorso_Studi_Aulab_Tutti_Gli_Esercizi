<x-auth-exercise.layout title="Post NASA">
    <main class="nasa-posts-page">
        <section class="nasa-page-hero">
            <img class="nasa-page-hero__background" src="{{ asset('media/autenticazione/moon-earthrise.jpg') }}" alt="" aria-hidden="true">
            <div class="container-fluid px-3 px-lg-5">
                <div class="nasa-page-hero__content" data-aos="fade-up">
                    <p class="nasa-eyebrow">Mission Log</p>
                    <h1>Post dalla NASA.</h1>
                    <p>
                        Raccogli aggiornamenti, appunti missione e notizie NASA in un unico feed.
                    </p>
                    <a href="{{ route('autenticazione.posts.create', absolute: false) }}" class="btn btn-glass btn-lg">
                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                        Pagina crea post
                    </a>
                </div>
            </div>
        </section>

        <section class="nasa-section">
            <div class="container-fluid px-3 px-lg-5">
                @if (session('status'))
                    <div class="alert alert-success mission-alert" role="alert">
                        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row g-4 align-items-start">
                    <div class="col-lg-5">
                        <div class="nasa-post-panel" data-aos="fade-right">
                            <p class="nasa-card-eyebrow">Nuovo post</p>
                            <h2>Scrivi un aggiornamento.</h2>
                            <p>Condividi un appunto missione con titolo, riassunto, contenuto e fonte.</p>
                            <x-auth-exercise.post-form submit-label="Pubblica nel database" />
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="nasa-post-feed">
                            @forelse ($posts as $post)
                                <article class="nasa-post-card" data-aos="fade-up">
                                    <div class="nasa-post-card__meta">
                                        <span>{{ $post['published_at']?->format('d/m/Y') }}</span>
                                        <span>{{ $post['author'] }}</span>
                                    </div>

                                    <h2>{{ $post['title'] }}</h2>
                                    <p class="nasa-post-card__excerpt">{{ $post['excerpt'] }}</p>
                                    <p>{{ $post['body'] }}</p>

                                    <div class="nasa-post-card__actions">
                                        @if ($post['can_update'])
                                            <a href="{{ route('autenticazione.posts.edit', $post['model'], absolute: false) }}" class="btn btn-outline-light">
                                                <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                                Modifica
                                            </a>
                                        @endif

                                        @if ($post['source_url'])
                                            <a href="{{ $post['source_url'] }}" target="_blank" rel="noreferrer" class="btn btn-outline-light">
                                                <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                                                Fonte NASA
                                            </a>
                                        @endif

                                        @if ($post['can_delete'])
                                            <form method="POST" action="{{ route('autenticazione.posts.destroy', $post['model'], absolute: false) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="bi bi-trash3-fill" aria-hidden="true"></i>
                                                    Cancella
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </article>
                            @empty
                                <div class="nasa-post-empty">
                                    <i class="bi bi-journal-text" aria-hidden="true"></i>
                                    <h2>Nessun post disponibile.</h2>
                                    <p>Crea il primo aggiornamento missione dal form.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-auth-exercise.layout>
