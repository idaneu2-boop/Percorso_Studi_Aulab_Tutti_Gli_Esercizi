<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex JavaScript</title>
    <link rel="stylesheet" href="/css/pokedex.css">
</head>
<body>
    <a class="exercise-home-link" href="home.html" aria-label="Home">Home</a>
    <header class="site-header">
        <div>
            <p class="eyebrow">Professor DUX Lab</p>
            <h1>Pokédex JavaScript</h1>
            <p class="subtitle">Ogni esercizio è una scheda: premi il bottone e guarda il risultato qui sotto oppure nella console.</p>
        </div>
        <div class="header-actions">
            <button class="music-button" id="musicButton" type="button">Musica ON</button>
            <button class="run-all" id="runAllButton" type="button">Sfida completa</button>
        </div>
    </header>

    <main>
        <section class="toolbar" aria-label="Riepilogo esercizi">
            <div>
                <span class="stat-number" id="exerciseCount">0</span>
                <span class="stat-label">schede degli schiavi nel Pokédex</span>
            </div>
            <div class="console-hint">Apri DevTools con F12 per vedere i log coglione.</div>
        </section>

        <section class="exercise-grid" id="exerciseGrid" aria-label="Lista degli esercizi"></section>
    </main>

    <audio id="pokemonAudio" src="/media/Pok%C3%A9mon%20Diamond%2C%20Pearl%20%26%20Platinum%20-%20Prof%20Rowan%20Laboratory%20Music%20(HQ).mp3" loop preload="none"></audio>
    <script src="/js/pokedex.js"></script>
</body>
</html>
