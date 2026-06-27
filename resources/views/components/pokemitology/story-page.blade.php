@props(['topic' => 'overview'])

@php
    $stories = [
        'overview' => [
            'class' => 'overview',
            'kicker' => 'Sinossi del progetto',
            'title' => 'Di cosa tratta Pok&eacute;Mitology',
            'lead' => 'Pok&eacute;Mitology racconta la storia del mondo Pok&eacute;mon come se fosse una grande mitologia: dalla nascita dell universo fino agli eventi piu vicini ai giochi moderni.',
            'image' => '/media/ArceusIcon.jpg',
            'alt' => 'Icona di Arceus',
            'points' => [
                [
                    'label' => 'Creazione',
                    'text' => 'La prima tappa parla dell origine: Arceus, il tempo, lo spazio, l antimateria e le forze che rendono possibile il mondo dei Pok&eacute;mon.',
                ],
                [
                    'label' => 'Leggende',
                    'text' => 'La seconda tappa guarda alle storie tramandate dalle regioni, dove luoghi sacri, torri e popoli antichi trasformano i Pok&eacute;mon leggendari in simboli.',
                ],
                [
                    'label' => 'Presente',
                    'text' => 'La parte finale collega miti, scoperte scientifiche e viaggi degli Allenatori, mostrando come il passato continui a pesare sul presente.',
                ],
            ],
        ],
        'creation' => [
            'class' => 'creation',
            'kicker' => 'Origine del mondo',
            'title' => 'La creazione secondo Arceus',
            'lead' => 'Questa pagina segue il mito piu antico: prima non esistono regioni, persone o strade da Allenatore. Esiste solo un principio misterioso, da cui Arceus fa nascere tempo, spazio, antimateria, emozioni e materia.',
            'image' => '/media/gif arceus.gif',
            'alt' => 'Arceus animato',
            'points' => [
                [
                    'label' => 'Primo essere',
                    'text' => 'Arceus viene presentato come la scintilla iniziale: una divinita solitaria che precede ogni regione, ogni specie e ogni racconto successivo.',
                ],
                [
                    'label' => 'Tempo e spazio',
                    'text' => 'Dialga e Palkia rappresentano le due colonne dell universo: il flusso del tempo e l estensione dello spazio, senza cui nessuna storia potrebbe accadere.',
                ],
                [
                    'label' => 'Equilibrio',
                    'text' => 'Giratina, i guardiani dei laghi e le energie primordiali mostrano che la creazione non e solo nascita, ma anche equilibrio tra ordine e caos.',
                ],
            ],
            'details' => [
                [
                    'title' => 'Il respiro mitologico',
                    'text' => 'La creazione non viene raccontata come una semplice esplosione, ma come una genealogia divina: Arceus genera poteri, i poteri generano regole, e le regole permettono al mondo di diventare abitabile.',
                ],
                [
                    'title' => 'La Vetta Lancia',
                    'text' => 'Sinnoh diventa il centro simbolico del mito: montagne, rovine e colonne antiche sembrano conservare la memoria del momento in cui tempo e spazio hanno iniziato a muoversi insieme.',
                ],
            ],
            'timeline' => [
                [
                    'era' => 'Prima del tempo',
                    'title' => 'Uovo cosmico e Arceus',
                    'text' => 'Nel nulla primordiale compare l origine: Arceus nasce come primo essere e diventa la causa iniziale di tutto cio che verra dopo.',
                ],
                [
                    'era' => 'Prime leggi',
                    'title' => 'Dialga, Palkia e Giratina',
                    'text' => 'Tempo, spazio e antimateria prendono forma. Giratina resta legato a una dimensione opposta, il Mondo Distorto, come ombra necessaria della realta.',
                ],
                [
                    'era' => 'Anima del mondo',
                    'title' => 'Uxie, Mesprit e Azelf',
                    'text' => 'Conoscenza, emozione e volonta entrano nel mondo. Da questo momento le creature non sono solo materia: possono ricordare, scegliere e provare sentimenti.',
                ],
                [
                    'era' => 'Terre e mari',
                    'title' => 'Groudon, Kyogre e Rayquaza',
                    'text' => 'Le forze primordiali modellano continenti, oceani e cieli. Rayquaza diventa il limite alto, quello che impedisce agli estremi di distruggere il mondo appena formato.',
                ],
                [
                    'era' => 'Continenti',
                    'title' => 'Regigigas e la forma delle regioni',
                    'text' => 'Le leggende parlano di masse terrestri trascinate e ordinate: il mondo non e piu caos, ma geografia, confini, luoghi e futuri cammini.',
                ],
            ],
        ],
        'middle-ages' => [
            'class' => 'middle-ages',
            'kicker' => 'Leggende di Johto',
            'title' => 'Il medioevo delle torri e di Ho-Oh',
            'lead' => 'Qui la storia diventa leggenda tramandata: Johto costruisce luoghi sacri, le torri diventano simboli religiosi e un incendio cambia per sempre il destino dei tre cani leggendari.',
            'image' => '/media/hooh gif.gif',
            'alt' => 'Ho-Oh animato',
            'points' => [
                [
                    'label' => 'Le torri',
                    'text' => 'Ad Amarantopoli le torri diventano un ponte tra umani e leggendari, un simbolo di rispetto verso creature considerate quasi divine.',
                ],
                [
                    'label' => 'L incendio',
                    'text' => 'Quando la Torre d Ottone brucia, tre Pok&eacute;mon perdono la vita: e il momento piu tragico della leggenda.',
                ],
                [
                    'label' => 'La rinascita',
                    'text' => 'Ho-Oh li riporta in vita come Raikou, Entei e Suicune, trasformando una tragedia in una nuova mitologia fatta di tuono, fuoco e acqua.',
                ],
            ],
            'details' => [
                [
                    'title' => 'Perche sembra medioevo',
                    'text' => 'In questa fase il mondo Pok&eacute;mon non e ancora raccontato tramite laboratori, aziende e tecnologie moderne. A dominare sono templi, torri, maestri, leggende orali e rispetto sacro verso i leggendari.',
                ],
                [
                    'title' => 'Una tragedia fondativa',
                    'text' => 'La storia della Torre d Ottone funziona come un mito di rinascita: la distruzione brucia un simbolo, ma Ho-Oh trasforma la perdita in una nuova presenza leggendaria.',
                ],
            ],
            'timeline' => [
                [
                    'era' => 'Epoca delle torri',
                    'title' => 'Nascono i luoghi sacri di Amarantopoli',
                    'text' => 'La citta costruisce torri dedicate ai grandi Pok&eacute;mon del cielo. Non sono semplici edifici: sono punti d incontro tra umano, natura e divino.',
                ],
                [
                    'era' => 'Custodi del cielo',
                    'title' => 'Ho-Oh e Lugia vegliano dall alto',
                    'text' => 'I due leggendari rappresentano presenze lontane e rispettate. La loro distanza rende il mito piu forte: non comandano gli umani, ma li osservano.',
                ],
                [
                    'era' => 'La notte dell incendio',
                    'title' => 'La Torre d Ottone viene distrutta',
                    'text' => 'Un fulmine e le fiamme devastano la torre. Tre Pok&eacute;mon restano intrappolati e muoiono, lasciando una ferita nella memoria di Johto.',
                ],
                [
                    'era' => 'Miracolo',
                    'title' => 'Ho-Oh resuscita i tre leggendari',
                    'text' => 'Raikou, Entei e Suicune nascono dalla rinascita: tuono, fuoco e acqua diventano il ricordo vivente di quella notte.',
                ],
                [
                    'era' => 'Eredita',
                    'title' => 'I tre iniziano a vagare',
                    'text' => 'Da quel momento la leggenda non resta ferma in un luogo. Corre per le regioni, appare e scompare, e diventa una prova per chi cerca davvero il mito.',
                ],
            ],
        ],
        'present' => [
            'class' => 'present',
            'kicker' => 'Passato recente e presente',
            'title' => 'Dal mito agli Allenatori moderni',
            'lead' => 'Questa pagina collega gli eventi piu vicini al presente: il mito non scompare, ma viene studiato, sfruttato, ricostruito e perfino sfidato da scienza, Team criminali e Allenatori moderni.',
            'image' => '/media/mew gif.gif',
            'alt' => 'Mew animato',
            'points' => [
                [
                    'label' => 'Scienza',
                    'text' => 'Dai fossili ai Pok&eacute;mon creati in laboratorio, il mondo moderno prova a spiegare o ricostruire cio che prima apparteneva solo al mito.',
                ],
                [
                    'label' => 'Conflitti',
                    'text' => 'I Team delle varie regioni cercano spesso di usare i leggendari per cambiare il mondo, dimostrando che le antiche forze non sono scomparse.',
                ],
                [
                    'label' => 'Eredita',
                    'text' => 'Gli Allenatori moderni vivono in un presente costruito sulle rovine, sulle profezie e sulle scelte dei popoli del passato.',
                ],
            ],
            'details' => [
                [
                    'title' => 'Il mito entra nei laboratori',
                    'text' => 'Nel presente le leggende non sono piu solo racconti antichi: diventano fossili da riportare in vita, DNA da analizzare, energia da misurare e fenomeni da inseguire.',
                ],
                [
                    'title' => 'Allenatori come ponte',
                    'text' => 'Il protagonista moderno non e un sacerdote o un re: e un Allenatore. Viaggia, ascolta, sfida, protegge e spesso impedisce che le forze antiche vengano usate male.',
                ],
            ],
            'timeline' => [
                [
                    'era' => 'Passato recente',
                    'title' => 'Mewtwo e i laboratori moderni',
                    'text' => 'La scienza prova a ricreare il mistero della vita partendo da Mew. Il risultato e Mewtwo: non una divinita antica, ma una leggenda nata dall intervento umano.',
                ],
                [
                    'era' => 'Tecnologia',
                    'title' => 'Fossili e Pok&eacute;mon artificiali',
                    'text' => 'Macchine, dati e ricerche permettono di riportare alla luce specie estinte o creare nuove forme. Il presente diventa capace di imitare il passato.',
                ],
                [
                    'era' => 'Crisi regionali',
                    'title' => 'I Team criminali cercano i leggendari',
                    'text' => 'Molti conflitti moderni nascono dallo stesso errore: pensare che un potere antico possa essere controllato come uno strumento qualsiasi.',
                ],
                [
                    'era' => 'Altre dimensioni',
                    'title' => 'Varco, spazio e realta instabili',
                    'text' => 'Ultra creature, mondi paralleli e fenomeni dimensionali mostrano che il presente ha ancora confini fragili, proprio come ai tempi della creazione.',
                ],
                [
                    'era' => 'Presente',
                    'title' => 'Paradossi, energia e memoria',
                    'text' => 'Le regioni piu recenti mescolano tecnologia e mistero: passato, futuro e identita dei Pok&eacute;mon diventano domande aperte, non semplici risposte da Pok&eacute;dex.',
                ],
            ],
        ],
    ];

    $story = $stories[$topic] ?? $stories['overview'];
@endphp

<main class="pokemitology-main">
    <section class="pokemitology-story pokemitology-story-{{ $story['class'] }}" aria-labelledby="pokemitology-story-title">
        <div class="pokemitology-story-copy">
            <p class="pokemitology-kicker">{{ $story['kicker'] }}</p>
            <h2 id="pokemitology-story-title">{!! $story['title'] !!}</h2>
            <p class="pokemitology-lead">{!! $story['lead'] !!}</p>
        </div>

        <figure class="pokemitology-story-figure">
            <img decoding="async" loading="lazy" src="{{ $story['image'] }}" alt="{{ $story['alt'] }}">
        </figure>

        <div class="pokemitology-story-points">
            @foreach ($story['points'] as $point)
                <article class="pokemitology-story-point">
                    <h3>{{ $point['label'] }}</h3>
                    <p>{!! $point['text'] !!}</p>
                </article>
            @endforeach
        </div>

        @if (! empty($story['details']))
            <div class="pokemitology-detail-grid">
                @foreach ($story['details'] as $detail)
                    <article class="pokemitology-detail">
                        <h3>{!! $detail['title'] !!}</h3>
                        <p>{!! $detail['text'] !!}</p>
                    </article>
                @endforeach
            </div>
        @endif

        @if (! empty($story['timeline']))
            <section class="pokemitology-timeline" aria-labelledby="pokemitology-timeline-title">
                <div class="pokemitology-timeline-heading">
                    <p class="pokemitology-kicker">Timeline</p>
                    <h3 id="pokemitology-timeline-title">Eventi principali del periodo</h3>
                </div>

                <ol class="pokemitology-timeline-list">
                    @foreach ($story['timeline'] as $event)
                        <li class="pokemitology-timeline-item">
                            <span>{!! $event['era'] !!}</span>
                            <h4>{!! $event['title'] !!}</h4>
                            <p>{!! $event['text'] !!}</p>
                        </li>
                    @endforeach
                </ol>
            </section>
        @endif
    </section>
</main>

<footer class="pokemitology-footer">
    <div class="pokemitology-footer-inner">
        <div class="pokemitology-footer-copy">
            <h2>Contatti</h2>
            <p>Fan page non ufficiale dedicata al mondo Pok&eacute;mon.</p>
        </div>
        <ul class="pokemitology-contact-list">
            <li>
                <a href="mailto:idaneu2@gmail.com">idaneu2@gmail.com</a>
            </li>
            <li>
                <a href="tel:+393281022479">3281022479</a>
            </li>
            <li>
                <a href="https://www.instagram.com/daniele.pigliacelli_/">Daniele.Pigliacelli_</a>
            </li>
        </ul>
    </div>
</footer>
