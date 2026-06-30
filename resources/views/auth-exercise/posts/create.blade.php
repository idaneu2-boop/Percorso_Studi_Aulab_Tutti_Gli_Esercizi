<x-auth-exercise.layout title="Crea Post">
    <main class="nasa-posts-page">
        <section class="nasa-page-hero">
            <img class="nasa-page-hero__background" src="{{ asset('media/autenticazione/mars-jezero.jpg') }}" alt="" aria-hidden="true">
            <div class="container-fluid px-3 px-lg-5">
                <div class="nasa-page-hero__content" data-aos="fade-up">
                    <p class="nasa-eyebrow">Nuovo post</p>
                    <h1>Crea un post missione.</h1>
                    <p>
                        Prepara un aggiornamento chiaro, leggibile e pronto per entrare nel feed dei post.
                    </p>
                </div>
            </div>
        </section>

        <section class="nasa-section">
            <div class="container-fluid px-3 px-lg-5">
                <div class="nasa-post-panel nasa-post-panel--narrow" data-aos="fade-up">
                    <x-auth-exercise.post-form submit-label="Crea post" />
                </div>
            </div>
        </section>
    </main>
</x-auth-exercise.layout>
