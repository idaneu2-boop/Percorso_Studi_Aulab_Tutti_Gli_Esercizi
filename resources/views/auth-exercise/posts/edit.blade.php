<x-auth-exercise.layout :title="'Modifica '.$post->title">
    <main class="nasa-posts-page">
        <section class="nasa-page-hero">
            <img class="nasa-page-hero__background" src="{{ asset('media/autenticazione/supernovae.gif') }}" alt="" aria-hidden="true">
            <div class="container-fluid px-3 px-lg-5">
                <div class="nasa-page-hero__content" data-aos="fade-up">
                    <p class="nasa-eyebrow">Modifica post</p>
                    <h1>Aggiorna il post missione.</h1>
                    <p>
                        Rivedi titolo, riassunto, contenuto e fonte: le modifiche verranno salvate nel database.
                    </p>
                </div>
            </div>
        </section>

        <section class="nasa-section">
            <div class="container-fluid px-3 px-lg-5">
                <div class="nasa-post-panel nasa-post-panel--narrow" data-aos="fade-up">
                    <x-auth-exercise.post-form
                        :action="route('autenticazione.posts.update', $post, absolute: false)"
                        method="PUT"
                        :post="$post"
                        submit-label="Salva modifiche"
                    />
                </div>
            </div>
        </section>
    </main>
</x-auth-exercise.layout>
