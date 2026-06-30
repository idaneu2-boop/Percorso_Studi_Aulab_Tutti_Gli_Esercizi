<x-auth-exercise.layout :title="$post->title">
    <main class="nasa-posts-page">
        <section class="nasa-page-hero nasa-page-hero--compact">
            <img class="nasa-page-hero__background" src="{{ asset('media/autenticazione/moon-earthrise.jpg') }}" alt="" aria-hidden="true">
            <div class="container-fluid px-3 px-lg-5">
                <div class="nasa-page-hero__content" data-aos="fade-up">
                    <p class="nasa-eyebrow">Post database</p>
                    <h1>{{ $post->title }}</h1>
                    <p>
                        Pubblicato da {{ $post->user?->name ?? 'Mission Control' }}
                        il {{ ($post->published_at ?? $post->created_at)->format('d/m/Y') }}.
                    </p>
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

                <article class="nasa-post-detail" data-aos="fade-up">
                    <p class="nasa-card-eyebrow">Riassunto</p>
                    <h2>{{ $post->excerpt }}</h2>
                    <p>{{ $post->body }}</p>

                    <div class="nasa-post-card__actions">
                        <a href="{{ route('autenticazione.posts.index', absolute: false) }}" class="btn btn-glass">
                            <i class="bi bi-arrow-left" aria-hidden="true"></i>
                            Torna ai post
                        </a>

                        @can('update', $post)
                            <a href="{{ route('autenticazione.posts.edit', $post, absolute: false) }}" class="btn btn-outline-light">
                                <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                Modifica
                            </a>
                        @endcan

                        @if ($post->source_url)
                            <a href="{{ $post->source_url }}" target="_blank" rel="noreferrer" class="btn btn-outline-light">
                                <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                                Fonte
                            </a>
                        @endif

                        @can('delete', $post)
                            <form method="POST" action="{{ route('autenticazione.posts.destroy', $post, absolute: false) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-trash3-fill" aria-hidden="true"></i>
                                    Cancella
                                </button>
                            </form>
                        @endcan
                    </div>
                </article>
            </div>
        </section>
    </main>
</x-auth-exercise.layout>
