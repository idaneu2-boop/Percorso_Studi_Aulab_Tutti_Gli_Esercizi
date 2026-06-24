<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DOM Lab | Esercizi JS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Roboto+Mono:wght@500;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="/media/logo.svg" type="image/svg+xml">
  <link rel="stylesheet" href="/css/dom1.css">
  <x-fluid-assets target="head" />
</head>
<body>
  <header class="topbar">
    <a class="back-link" href="home.html">Torna alla home</a>
    <button class="audio-toggle" id="audioToggle" type="button" aria-label="Ferma o avvia musica">
      <img decoding="async" loading="lazy" class="page-logo" src="/media/logo.svg" alt="" aria-hidden="true">
    </button>
    <span class="lesson-badge">JavaScript DOM</span>
  </header>

  <audio id="pageMusic" src="/media/C418  - Sweden - Minecraft Volume Alpha.mp3" loop preload="none"></audio>

  <main>
    <section class="hero" aria-labelledby="pageTitle">
      <div class="hero-copy">
        <p class="eyebrow">Esercizio 23.05.2026</p>
        <h1 id="pageTitle">DOM Lab</h1>
        <p>
          Una piccola palestra interattiva per provare selettori, classi, stili inline,
          eventi e creazione dinamica di elementi.
        </p>
      </div>

      <div class="hero-visual" aria-hidden="true">
        <span class="node node-a"></span>
        <span class="node node-b"></span>
        <span class="node node-c"></span>
        <div class="code-window">
          <span>document.querySelector()</span>
          <strong>.classList.toggle()</strong>
          <span>appendChild()</span>
        </div>
      </div>
    </section>

    <section class="exercise-board" aria-label="Esercizi sul DOM">
      <article class="panel intro-panel">
        <p class="panel-kicker">Esercizi 1-3</p>
        <h2 id="mainHeading">Titolo principale</h2>
        <h3 id="classHeading">Titolo con classe dinamica</h3>
        <h3 id="textHeading">Testo aggiornabile</h3>
      </article>

      <article class="panel controls-panel">
        <p class="panel-kicker">Esercizio 4</p>
        <h2>Paragrafi interattivi</h2>
        <div class="paragraph-list" id="paragraphList">
        <p>Primo paragrafo da modificare</p>
        <p>Secondo paragrafo da evidenziare</p>
        <p>Terzo paragrafo da mostrare o nascondere</p>
        </div>

        <div class="actions" aria-label="Azioni sui paragrafi">
        <button id="colorButton" type="button">Cambia colore</button>
        <button id="boldButton" type="button">Grassetto</button>
        <button id="toggleParagraphs" type="button">Mostra/nascondi</button>
        </div>
      </article>

      <article class="panel list-panel">
        <p class="panel-kicker">Esercizio 5</p>
        <h2>Lista contatti generata</h2>
        <ul id="contactsList" class="contacts-list"></ul>
      </article>
    </section>
  </main>

  <script src="/js/dom1.js"></script>
  <x-fluid-assets target="body" />
</body>
</html>

