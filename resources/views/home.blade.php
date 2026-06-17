<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esercizi Daniele | aulab</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Roboto+Mono:wght@400;500;600;700&family=Zalando+Sans+SemiExpanded:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="/css/home.css">
  <link id="homeFavicon" rel="shortcut icon" href="/media/blackholelogo.webp" type="image/x-icon">
</head>
<body>
  <header class="site-header">
    <nav class="nav">
      <div class="brand">
        <a class="brand-mark" href="https://www.instagram.com/daniele.pigliacelli_/" target="_blank" rel="noopener noreferrer" aria-label="Apri Instagram di Daniele Pigliacelli">
          <img decoding="async" loading="lazy" src="/media/danielefoto.jpg" alt="Foto di Daniele Pigliacelli">
        </a>
        <a class="brand-name" href="https://www.instagram.com/daniele.pigliacelli_/" target="_blank" rel="noopener noreferrer" aria-label="Apri Instagram di Daniele Pigliacelli">Daniele Pigliacelli / Matricola: 7521788692</a>
      </div>
      <div class="category-filter">
        <button class="category-filter-button" id="categoryFilterButton" type="button" aria-expanded="false" aria-controls="categoryFilterMenu">
          <span class="category-filter-label">Tutti gli esercizi</span>
          <span class="category-filter-arrow" aria-hidden="true"></span>
        </button>
        <div class="category-filter-menu" id="categoryFilterMenu" hidden></div>
      </div>
      <button class="home-theme-toggle" id="homeThemeToggle" type="button" aria-label="Attiva modalità light">
        <i class="fa-solid fa-moon"></i>
      </button>
    </nav>
    
    <section class="hero">
      <div class="hero-content">
        <p class="eyebrow">Console Unix - Html - Git Bash&Hub - CSS - Bootstrap - Flowcharts - JS</p>
        <h1>Indice dei miei esercizi</h1>
        <p class="hero-copy">
          Una dashboard semplice e ordinata per aprire al volo tutte le pagine HTML dei miei esercizi.
        </p>
      </div>
      <div class="hero-panel" aria-label="Riepilogo esercizi">
        <span class="panel-number" id="linkedPagesCount">0</span>
        <span class="panel-label">pagine collegate</span>
      </div>
    </section>
  </header>
  
  <main>
    <section class="tools" aria-label="Strumenti di ricerca">
      <label class="search-box" for="searchInput">
        <span>Cerca</span>
        <input id="searchInput" type="search" placeholder="Scrivi il nome di un esercizio">
      </label>
    </section>
    
    <section id="esercizi" class="exercise-section">
      <div class="section-title">
        <p class="eyebrow">Link rapidi</p>
        <h2 id="exerciseTitle">Tutti gli esercizi ordinati per data</h2>
      </div>
      
      <div class="exercise-grid" id="exerciseGrid">
        <article class="exercise-card card-terminal" data-title="test comandi terminale git">
          <figure class="card-media terminal-media" aria-hidden="true">
            <span>&gt; Il primo passo.</span>
          </figure>
          <div>
            <span class="card-tag">Console Unix</span>
            <h3>Test-Comandi</h3>
            <p>27.04.2026</p>
          </div>
          <a href="index.html">Fai il primo passo</a>
        </article>
        
        <article class="exercise-card card-cucina" data-title="Cucina Abruzzese Es-Html ricette cucina">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/Timballo-scrippelle-teramano-1.jpg" alt="Timballo di scrippelle teramano">
          </figure>
          <div>
            <span class="card-tag">Html</span>
            <h3>Cucina Abruzzese e 5 Tag Html</h3>
            <p>28.04.2026</p>
          </div>
          <a href="Ricette_cucina.html">Scopri delle nuove ricette!</a>
        </article>
        
        <article class="exercise-card card-viaggi" data-title="MSD Viaggi Esercizio Git Daniele Pigliacelli viaggi blog">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/optimized/home-viaggi.jpg" alt="Aereo in viaggio">
          </figure>
          <div>
            <span class="card-tag">Html + Git-Hub</span>
            <h3>MSD Viaggi</h3>
            <p>29.04.2026</p>
          </div>
          <a href="viaggi (4).html">Apri il blog viaggi</a>
        </article>
        
        <article class="exercise-card card-pokemon-myth" data-title="PokéMitology Pokémon mitologia creazione medioevo presente">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/gif arceus.gif" alt="Arceus animato">
          </figure>
          <div>
            <span class="card-tag">CSS1 + CSS2</span>
            <h3>PokéMitology</h3>
            <p>30.04.2026</p>
          </div>
          <a href="pokemitology (1).html">Tuffati nel passato!</a>
        </article>
        
        <article class="exercise-card card-anime" data-title="Blog Anime Blog_Anime StreamWorld anime">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/chainsaw-man-denji-bound-makimas-eye-live-wallpaper.png" alt="Chainsaw Man">
          </figure>
          <div>
            <span class="card-tag">Bootstrap</span>
            <h3>StreamWorld Anime</h3>
            <p>05.05.2026</p>
          </div>
          <a href="anime.html">Clicca per guardare i migliori Anime</a>
        </article>
        
        <article class="exercise-card card-tech" data-title="Blog Telefonia Blog_Telefonia smartphone offerte">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/optimized/home-telefonia.jpg" alt="iPhone 17 Pro Max">
          </figure>
          <div>
            <span class="card-tag">Bootstrap Components</span>
            <h3>Smart4 Telefonia</h3>
            <p>06.05.2026</p>
          </div>
          <a href="telefonia.html">Sfoglia il catalogo</a>
        </article>
        
        <article class="exercise-card card-nasa" data-title="Blog Nasa Blog_Nasa spazio bootstrap">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/header.webp" alt="Scenario spaziale NASA">
          </figure>
          <div>
            <span class="card-tag">Live Coding</span>
            <h3>Nasa</h3>
            <p>07.05.2026</p>
          </div>
          <a href="nasa.html">Houston? We landed!</a>
        </article>
        
        <article class="exercise-card card-flow" data-title="Es flowchart Es-flowchart diagrammi logica">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/Screenshot 2026-05-12 150557.png" alt="Screenshot del flowchart">
          </figure>
          <div>
            <span class="card-tag">Flowcharts</span>
            <h3>Esercizio flowcharts</h3>
            <p>11.05.2026</p>
          </div>
          <a href="flowcharts.html">Clicca per vedere l'immagine</a>
        </article>
        
        <article class="exercise-card card-mario" data-title="SuperMario SuperMario_Es super mario gioco esercizio">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/d9f6x59-83bc7697-99b5-4ab1-b56c-48286f982b2b.gif" alt="Super Mario animato">
          </figure>
          <div>
            <span class="card-tag">JS - intro</span>
            <h3>Super Ma...Du..</h3>
            <p>12.05.2026</p>
          </div>
          <a href="supermario.html">Super Mario sembra strano...</a>
        </article>
        
        <article class="exercise-card card-undertale" data-title="EserciziJS2 Undertale JavaScript seconda parte">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/footer.webp" alt="Sans da Undertale">
          </figure>
          <div>
            <span class="card-tag">JS - Variabili</span>
            <h3>?????????????????????????</h3>
            <p>13.05.2026</p>
          </div>
          <a href="undertale (1).html">????????????????????????????</a>
        </article>
        
        <article class="exercise-card card-morning" data-title="MattutiniEs Mattutini esercizi mattutini">
          <figure class="card-media code-media" aria-hidden="true">
            <span>17</span>
          </figure>
          <div>
            <span class="card-tag">JS - Condizioni/Cicli</span>
            <h3>Mattutini</h3>
            <p>14.05.2026</p>
          </div>
          <a href="mattutini.html">Apri esercizio</a>
        </article>
        
        <article class="exercise-card card-pokedex" data-title="Es2005Ja Es2005ja JavaScript esercizi 20 maggio">
          <figure class="card-media pokeball-media" aria-hidden="true">
            <span></span>
          </figure>
          <div>
            <span class="card-tag">JS - Array/Funzioni</span>
            <h3>Pokédex</h3>
            <p>18.05.2026</p>
          </div>
          <a href="pokedex.html">Sfoglia il Pokédex</a>
        </article>
        
        <article class="exercise-card card-array" data-title="funzioniarray FunzioniArray funzioni array JavaScript">
          <figure class="card-media array-media" aria-hidden="true">
            <span>[ ]</span>
          </figure>
          <div>
            <span class="card-tag">JS - Ripasso: Array/Funzioni</span>
            <h3>funzioniarray</h3>
            <p>19.05.2026</p>
          </div>
          <a href="funzioni (1).html">Apri esercizio</a>
        </article>
        
        <article class="exercise-card card-aulab" data-title="oggetti OggettiEsDP Aulab oggetti JavaScript">
          <figure class="card-media">
            <img decoding="async" loading="lazy" src="/media/object-lab-hero.png" alt="Aulab Object Lab">
          </figure>
          <div>
            <span class="card-tag">JS - Oggetti</span>
            <h3>Aulab</h3>
            <p>21.05.2026</p>
          </div>
          <a href="oggetti (1).html">Valerio perderà il lavoro?</a>
        </article>
        
        <article class="exercise-card card-weekend" data-title="Weekend EserciziJaWeekend esercizi weekend JavaScript">
          <figure class="card-media weekend-media" aria-hidden="true">
            <span>JS</span>
          </figure>
          <div>
            <span class="card-tag">JS - Ripasso: Funzioni/Oggetti</span>
            <h3>Weekend</h3>
            <p>22.05.2026</p>
          </div>
          <a href="weekend (1).html">Apri esercizio</a>
        </article>

        <article class="exercise-card card-dom" data-title="Dom1 DOM JavaScript querySelector classList eventi lista contatti">
          <figure class="card-media dom-media">
            <img decoding="async" loading="lazy" src="/media/logo.svg" alt="">
          </figure>
          <div>
            <span class="card-tag">JS - DOM</span>
            <h3>Minecraft</h3>
            <p>25.05.2026</p>
          </div>
          <a href="dom1.html">Start Launcher</a>
        </article>

        <article class="exercise-card card-rubrica" data-title="Rubrica DOM JavaScript rubrica contatti">
          <figure class="card-media rubrica-media">
            <img decoding="async" loading="lazy" src="/media/logorubrica.png" alt="">
          </figure>
          <div>
            <span class="card-tag">JS - DOM</span>
            <h3>Terzo Reich</h3>
            <p>26.05.2026</p>
          </div>
          <a href="rubrica.html">Ritorna ai bei tempi</a>
        </article>

        <article class="exercise-card card-presto" data-title="Presto JDM Garage annunci auto JavaScript JSON">
          <figure class="card-media presto-media">
            <img decoding="async" loading="lazy" src="/media/logopresto.avif" alt="Logo Presto JDM Garage">
          </figure>
          <div>
            <span class="card-tag">AOS - JSON/DOM</span>
            <h3>JDM Garage</h3>
            <p>27.05.2026</p>
          </div>
          <a href="presto.html">Acquista la tua Auto Tuning</a>
        </article>
        
      </div>
      <p class="empty-state" id="emptyState" hidden>Nessun esercizio trovato.</p>
    </section>
  </main>
  
  <footer class="site-footer">
    <div class="footer-content">
      <div>
        <p>Creato per navigare velocemente tra gli esercizi.</p>
      </div>
      <address class="footer-contacts">
        <a href="mailto:idaneu2@gmail.com">idaneu2@gmail.com</a>
        <a href="tel:+393281022479">3281022479</a>
        <a href="https://www.instagram.com/daniele.pigliacelli_/" target="_blank" rel="noopener noreferrer">Daniele.Pigliacelli_</a>
      </address>
    </div>
  </footer>
  
  <aside class="page-helper" aria-label="Aiutante della pagina">
    <div class="helper-bubble" id="helperBubble" hidden>
      <button class="helper-close" id="helperClose" type="button" aria-label="Chiudi aiutante">×</button>
      <p class="helper-title">Serve aiuto?</p>
      <ul>
        <li>Usa la barra di ricerca per trovare subito un esercizio.</li>
        <li>Apri la tendina in alto per vedere le categorie.</li>
        <li>Clicca su una card per entrare nella pagina dell'esercizio.</li>
      </ul>
    </div>
    <button class="helper-button" id="helperButton" type="button" aria-expanded="false" aria-controls="helperBubble">
      <img decoding="async" loading="lazy" src="/media/aiutante.gif" alt="">
      <span>Aiuto</span>
    </button>
    <button class="scroll-top-button" id="scrollTopButton" type="button" aria-label="Torna all'inizio della pagina">
      <i class="fa-solid fa-arrow-up"></i>
    </button>
  </aside>
  
  <script src="/js/home.js"></script>
</body>
</html>
