<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/supermario.css">
    <link rel="shortcut icon" href="/media/images.png" type="image/x-icon">
    <title>Super Mario JS</title>
    
</head>
<body>
    <a class="exercise-home-link" href="home.html">Home</a>
    <button class="play-button" id="playButton" type="button">Play</button>
    <audio preload="none" id="musica" loop>
        <source src="/media/Original Super Mario Bros Soundtrack Full.mp3" type="audio/mpeg">
    </audio>
    <button class="music-button" id="musicButton" type="button" onclick="musica.paused ? (musica.play(), this.textContent = 'Pausa') : (musica.pause(), this.textContent = 'Musica')">Musica</button>
    <h1 class="game-title">
        <a href="https://www.youtube.com/watch?v=UmnxcjRk37Q&t=66s" target="_blank">Super Mario Bros.</a>
    </h1>
    <section class="win-card" id="cardvictory">
        <p class="win-card__badge">Level Clear!</p>
        <h2>Complimenti!</h2>
        <p>Hai finito il gioco.</p>
    </section>
    <section class="win-card game-over-card" id="cardgameover">
        <p class="win-card__badge">Game Over</p>
        <h2>Peccato!</h2>
        <p>Hai perso la partita.</p>
    </section>
    <img decoding="async" loading="lazy" class="sup" src="/media/d9f6x59-83bc7697-99b5-4ab1-b56c-48286f982b2b.gif" alt="gif di super mario che salta sopra un tubo">
</body>
<script src="/js/supermario.js"></script>
</html>

