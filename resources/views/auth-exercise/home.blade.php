<x-auth-exercise.layout title="Mission Control">
    <x-auth-exercise.header
        eyebrow="Esplorazione / Scienza / Innovazione"
        title="NASA: esplorare l'ignoto, dalla Terra a Marte."
        subtitle="La NASA esplora aria e spazio, innova per il beneficio dell'umanita e ispira il mondo attraverso la scoperta."
        image="{{ asset('media/autenticazione/header.webp') }}"
    >
        <x-slot:actions>
            <a href="#missioni" class="btn btn-nasa btn-lg">
                <i class="bi bi-rocket-takeoff-fill" aria-hidden="true"></i>
                Esplora le missioni
            </a>
            <a href="#video" class="btn btn-glass btn-lg">
                <i class="bi bi-play-circle-fill" aria-hidden="true"></i>
                Guarda il video NASA
            </a>
        </x-slot:actions>
    </x-header>

    <main>
        <section class="nasa-stats">
            <div class="container-fluid px-3 px-lg-5">
                <div class="row g-3">
                    <div class="col-md-4">
                        <x-auth-exercise.stat-card value="HD" label="contenuti video NASA" icon="bi-broadcast" />
                    </div>
                    <div class="col-md-4">
                        <x-auth-exercise.stat-card value="20+" label="satelliti NASA osservano la Terra" icon="bi-globe-americas" />
                    </div>
                    <div class="col-md-4">
                        <x-auth-exercise.stat-card value="1.4M" label="miglia percorse da Orion in Artemis I" icon="bi-moon-stars-fill" />
                    </div>
                </div>
            </div>
        </section>

        <section class="nasa-section" id="missioni">
            <div class="container-fluid px-3 px-lg-5">
                <x-auth-exercise.section-heading
                    eyebrow="Programmi NASA"
                    title="Missioni che aprono il prossimo capitolo dell'esplorazione."
                    text="Dalla Luna al telescopio Webb fino al suolo di Marte, NASA usa missioni umane e robotiche per scoprire come funziona il nostro universo."
                />

                <div class="row g-4">
                    <div class="col-md-6 col-xl-4">
                        <x-auth-exercise.mission-card
                            image="{{ asset('media/autenticazione/moon-earthrise.jpg') }}"
                            eyebrow="Artemis"
                            title="Ritorno alla Luna"
                            text="Con Artemis, NASA invia astronauti in missioni sempre piu complesse per esplorare la Luna, fare scienza e preparare il viaggio verso Marte."
                            icon="bi-rocket-takeoff-fill"
                        />
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <x-auth-exercise.mission-card
                            image="{{ asset('media/autenticazione/magnetar.gif') }}"
                            eyebrow="James Webb Space Telescope"
                            title="Ogni fase della storia cosmica"
                            text="Webb studia l'universo dalle prime luci dopo il Big Bang alla formazione di galassie, stelle, pianeti e sistemi solari."
                            icon="bi-stars"
                        />
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <x-auth-exercise.mission-card
                            image="{{ asset('media/autenticazione/mars-jezero.jpg') }}"
                            eyebrow="Mars 2020"
                            title="Perseverance su Marte"
                            text="Il rover cerca segni di antica vita microbica, raccoglie campioni di roccia e regolite e prepara future missioni umane."
                            icon="bi-robot"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="nasa-split" id="scienza">
            <div class="container-fluid px-3 px-lg-5">
                <div class="row g-4 g-xl-5 align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="nasa-split__image">
                            <img src="{{ asset('media/autenticazione/sirio.gif') }}" alt="Campo stellare con Sirio">
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <p class="nasa-eyebrow">Terra</p>
                        <h2>Il nostro pianeta e una missione NASA.</h2>
                        <p>
                            NASA sviluppa strumenti e tecniche per capire oceani, terre emerse, ghiacci, atmosfera e vita. I dati raccolti dallo spazio aiutano scienziati, istituzioni e comunita a leggere i cambiamenti della Terra.
                        </p>
                        <div class="row g-3 mt-3">
                            <div class="col-sm-6">
                                <x-auth-exercise.discovery-card icon="bi-cloud-sun-fill" title="Clima e atmosfera" text="I satelliti NASA osservano temperatura, aria, gas serra, incendi e fenomeni estremi." />
                            </div>
                            <div class="col-sm-6">
                                <x-auth-exercise.discovery-card icon="bi-water" title="Oceani e ghiacci" text="Le missioni terrestri misurano acqua, ghiaccio, livello del mare e collegamenti tra sistemi naturali." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-auth-exercise.video-feature
            video-id="WeA7edXsU40"
            eyebrow="NASA Video"
            title="We Are NASA: persone, missioni, scoperta."
            text="Il video ufficiale racconta la NASA come comunita di scienziati, ingegneri, astronauti e tecnici impegnati a esplorare, innovare e ispirare."
        />

        <section class="nasa-section nasa-gallery" id="galleria">
            <div class="container-fluid px-3 px-lg-5">
                <x-auth-exercise.section-heading
                    eyebrow="Esplora"
                    title="Universo, stelle e pianeti in primo piano."
                    text="La scoperta NASA attraversa mondi diversi: stelle vive e morenti, pianeti, sistemi planetari e fenomeni estremi che aiutano a capire il nostro posto nel cosmo."
                />

                <div class="nasa-gallery__grid">
                    <x-auth-exercise.gallery-tile
                        image="{{ asset('media/autenticazione/supernovae.gif') }}"
                        title="Supernova"
                        caption="Le esplosioni stellari distribuiscono nello spazio elementi nati nel cuore delle stelle."
                    />
                    <x-auth-exercise.gallery-tile
                        image="{{ asset('media/autenticazione/antares.gif') }}"
                        title="Antares"
                        caption="Osservare il cielo aiuta a seguire stelle, pianeti e movimenti apparenti dalla Terra."
                    />
                    <x-auth-exercise.gallery-tile
                        image="{{ asset('media/autenticazione/header.gif') }}"
                        title="Buchi neri"
                        caption="I buchi neri sono laboratori naturali per studiare gravita, materia ed energia in condizioni estreme."
                    />
                    <x-auth-exercise.gallery-tile
                        image="{{ asset('media/autenticazione/Logo3.png') }}"
                        title="NASA"
                        caption="Dal 1958, NASA spinge avanti esplorazione umana e robotica nello spazio e nell'aeronautica."
                    />
                </div>
            </div>
        </section>
    </main>
</x-auth-exercise.layout>
