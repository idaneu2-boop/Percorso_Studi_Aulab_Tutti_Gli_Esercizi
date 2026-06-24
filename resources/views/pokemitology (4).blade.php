<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokéMitology</title>
    
    <!-- Icona Sito -->
    <link rel="shortcut icon" href="/media/ArceusIcon.jpg" type="image/x-icon">
    <!-- Font Titolo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <!-- Font Buttons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&family=Radley:ital@0;1&display=swap" rel="stylesheet">
    <!-- Font card h2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">
    <!-- Font p Cards Navbar -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/css/pokemitology (1).css">
  <x-fluid-assets target="head" />
</head>
<body>
    <a class="exercise-home-link" href="home.html">Torna agli esercizi</a>
    <!-- Navbar -->
    <nav>
        <!-- Bottoni -->
        <div class="gruppobottoni">
            <a class="mainButton primeButton" href="pokemitology (1).html">Home</a>
            <a class="mainButton primeButton" href="pokemitology (2).html">Creazione</a>
            <a class="mainButton primeButton" href="pokemitology (3).html">Medioevo</a>
            <a class="pre2Button preButton" href="pokemitology (4).html">Presente</a>
        </div>
        <!-- Titolo e gif -->
        <div class="gruppotitolazzo">
            <img decoding="async" loading="lazy" class="giffona1" src="/media/mew gif 2.gif" alt="gif di mewche balla">
            <a class="titolone" href="https://www.pokemon.com/it">
                
                <h1 class="title"> PokéMitology </h1>
                
            </a>
            <img decoding="async" loading="lazy" class="giffona2" src="/media/Dittoballa.gif" alt="gif di Ditto che balla">
        </div>
        <!-- Barra di ricerca e gif -->
        <div class="sezionericerca">
            <form class="barraricerca">
                <input type="search" placeholder="Acchiappali Tutti!">
                <button type="submit"><img decoding="async" loading="lazy" id="diglettGif" src="/media/diglett gif.gif" alt="diglett che sbuca e dice ok"></button>
            </form>
        </div>
        <!-- Cards -->
        <div class="container1">
            
            <a class="righette1" href="https://www.pokemonmillennium.net/rubriche/252203-arceus-e-la-creazione-del-mondo-pokemon/">
                <div class="cardhome1">
                    <img decoding="async" loading="lazy" src="/media/gif arceus.gif" alt="gif di arceus" class="gifarceus">
                    <h2 class="titolazzo">Di cosa parla PokéMitology?</h2>
                    <div>
                        <p class="testo1">Su questa pagina, parleremo di tutta la storia raccontata nei giochi <strong>Pokémon</strong>, dalla <strong>Creazione</strong> al <strong>Presente</strong>, parlando anche delle ispirazioni tratte dalla cultura folkloristica e storica reale.
                        </p>
                    </div>
            </div>
            </a>
            
            <a class="righette2" href="https://www.primevideo.com/-/it/detail/0TIOSBYKOWFF9SSXKEBHQZFIRI">
                <div class="cardhome2">
                    <img decoding="async" loading="lazy" src="/media/mew gif.gif" alt="gif di mew" class="gifarceus">
                    <h2 class="titolazzo1">Quali sono le fonti?</h2>
                    <p class="testo1">Tutto quello che viene raccolto su questo sito, è tratto dai <strong>Giochi Principali</strong>, dal famoso <strong>Teraleak</strong> e da interviste fatte ai producer di <strong>Gamefreak</strong>, come <strong>Junichi Masuda</strong>, <strong>Shigeki Morimoto</strong> e <strong>Ken Sugimori</strong>.
                    </p>
                </div>
            </a>
            
            <a class="righette3" href="https://www.youtube.com/watch?v=2JsjM0F1fqI">
                <div class="cardhome3">
                    <img decoding="async" loading="lazy" src="/media/hooh gif.gif" alt="gif di ho oh" class="gifarceus">
                    <h2 class="titolazzo2">E la Serie invece?</h2>
                    <p class="testo1">La serie televisiva, i Film e i videogiochi prodotti da case sviluppatrici come <strong>ILCA</strong>, non verranno trattati. In quanto, <strong>NON SEGUONO IL CANON</strong> dei giochi principali, perché non c'è <strong>Shigeru Ohmori</strong> dietro la scrittura.
                    </p>
                </div>
            </a>
            
            <a class="righette4" href="https://buymeacoffee.com/idane">
                <div class="cardhome4">
                    <img decoding="async" loading="lazy" src="/media/meowth gif.gif" alt="gif di meowth che piange" class="gifarceus">
                    <h2 class="titolazzo3">Piccola Donazione?</h2>
                    <p class="testo1">Se questo progetto vi piace, trovate un <strong>Link</strong> per donare su <strong>Buy Me a Coffee</strong>, nella pagina contatti o direttamente cliccando su <strong>Meowth</strong>.
                        Ci tengo a precisare che ogni contenuto su questo sito,  appartiene esclusivamente a <strong>The Pokémon Company</strong>.
                    </p>
                </div>
            </a>
            
        </div>
        
    </nav>
    <!-- Header -->
    <script>
        const diglettGif = document.getElementById("diglettGif");
        const diglettSrc = "/media/diglett gif.gif";

        setInterval(function () {
            diglettGif.src = diglettSrc + "?restart=" + Date.now();
        }, 6000);
    </script>
  <x-fluid-assets target="body" />
</body>
</html>



