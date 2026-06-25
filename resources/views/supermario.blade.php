@php
    $game ??= [
        'status' => 'ready',
        'stars' => 0,
        'attempts' => 0,
        'heading' => 'Sei pronto a iniziare la partita?',
        'message' => 'Premi Play per iniziare il livello.',
    ];

    $isPlaying = $game['status'] === 'playing';
    $isFinished = in_array($game['status'], ['won', 'lost', 'cancelled'], true);
@endphp

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-fluid-assets target="head" />
    <link rel="stylesheet" href="/css/supermario.css">
    <link rel="shortcut icon" href="/media/images.png" type="image/x-icon">
    <title>Super Mario Laravel</title>
</head>
<body class="supermario-page" data-no-fluid>
    <a class="exercise-home-link" href="{{ route('home') }}">Home</a>

    <audio preload="none" id="marioMusic" loop>
        <source src="/media/Original Super Mario Bros Soundtrack Full.mp3" type="audio/mpeg">
    </audio>
    <button class="music-button" id="musicButton" type="button">Musica</button>

    <h1 class="game-title">
        <a href="https://www.youtube.com/watch?v=UmnxcjRk37Q&t=66s" target="_blank" rel="noopener noreferrer">Super Mario Bros.</a>
    </h1>

    <img decoding="async" loading="lazy" class="sup" src="/media/d9f6x59-83bc7697-99b5-4ab1-b56c-48286f982b2b.gif" alt="gif di super mario che salta sopra un tubo">

    <main class="game-panel" aria-live="polite">
        <h2>{{ $game['heading'] }}</h2>
        <p>{{ $game['message'] }}</p>

        <div class="game-stats" aria-label="Statistiche partita">
            <span>Stelle {{ $game['stars'] }}/5</span>
            <span>Errori {{ $game['attempts'] }}/5</span>
        </div>

        @if ($game['status'] === 'ready' || $isFinished)
            <form method="POST" action="{{ route('supermario.start') }}" class="game-actions">
                @csrf
                <button class="play-button game-action-button" type="submit">Play</button>
            </form>
        @endif

        @if ($isPlaying)
            <p class="game-question">Attento, c'e' un nemico! Scegli una mossa.</p>

            <div class="game-actions">
                <form method="POST" action="{{ route('supermario.choose') }}">
                    @csrf
                    <input type="hidden" name="choice" value="run">
                    <button class="game-action-button" type="submit">Salta e corri</button>
                </form>

                <form method="POST" action="{{ route('supermario.choose') }}">
                    @csrf
                    <input type="hidden" name="choice" value="jump">
                    <button class="game-action-button" type="submit">Salta sul nemico</button>
                </form>

                <form method="POST" action="{{ route('supermario.choose') }}">
                    @csrf
                    <input type="hidden" name="choice" value="star">
                    <button class="game-action-button" type="submit">Raccogli stella</button>
                </form>

                <form method="POST" action="{{ route('supermario.choose') }}">
                    @csrf
                    <input type="hidden" name="choice" value="mistake">
                    <button class="game-action-button danger" type="submit">Mossa sbagliata</button>
                </form>
            </div>

            <form method="POST" action="{{ route('supermario.choose') }}" class="game-secondary-action">
                @csrf
                <input type="hidden" name="choice" value="exit">
                <button type="submit">Esci dal gioco</button>
            </form>
        @endif

        @if ($isFinished)
            <form method="POST" action="{{ route('supermario.reset') }}" class="game-secondary-action">
                @csrf
                <button type="submit">Torna alla schermata iniziale</button>
            </form>
        @endif
    </main>

    <section class="win-card {{ $game['status'] === 'won' ? 'win-card-show' : '' }}" id="cardvictory">
        <p class="win-card__badge">Level Clear!</p>
        <h2>Complimenti!</h2>
        <p>Hai finito il gioco.</p>
    </section>

    <section class="win-card game-over-card {{ $game['status'] === 'lost' ? 'win-card-show' : '' }}" id="cardgameover">
        <p class="win-card__badge">Game Over</p>
        <h2>Peccato!</h2>
        <p>Hai perso la partita.</p>
    </section>

    <x-fluid-assets target="body" />
    <script>
        const marioMusic = document.querySelector('#marioMusic');
        const musicButton = document.querySelector('#musicButton');

        musicButton?.addEventListener('click', () => {
            if (!marioMusic) {
                return;
            }

            if (marioMusic.paused) {
                marioMusic.play()
                    .then(() => {
                        musicButton.textContent = 'Pausa';
                    })
                    .catch(() => {
                        musicButton.textContent = 'Musica';
                    });

                return;
            }

            marioMusic.pause();
            musicButton.textContent = 'Musica';
        });
    </script>
</body>
</html>
