<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrica DOM</title>
    <link rel="icon" type="image/png" href="/media/logorubrica.png">
    <!-- Link Boots -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Link Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="/css/rubrica.css">
</head>
<body>
    <!-- Contenitore principale della pagina -->
    <main class="app-shell">
        <section class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="main-card">
                        <!-- Titolo pagina -->
                        <header class="app-header mb-4">
                            <h1 class="display-5 fw-bold mb-2">卍 La mia Rubrica 卍</h1>
                            <div class="header-actions">
                                <a class="home-button" href="home.html">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Home</span>
                                </a>
                                <div class="music-control">
                                    <i class="fa-solid fa-bell"></i>
                                    <button id="musicToggle" type="button" class="music-button" aria-label="Avvia musica">
                                        <img src="/media/logorubrica.png" alt="">
                                    </button>
                                    <i class="fa-solid fa-bell-slash"></i>
                                </div>
                            </div>
                            <audio id="musicPlayer" src="/media/Erika (Rare Version).mp3"></audio>
                        </header>
                        
                        <!-- Card e contenuti della rubrica -->
                        <div class="row g-4">
                            <div class="col-12">
                                <!-- Form per aggiungere o modificare un contatto -->
                                <form id="scrivicontatto" class="contact-panel">
                                    <h2 id="titolezzo" class="h4 fw-bold mb-3">Nuovo contatto</h2>
                                    
                                    <!-- Nome -->
                                    <div class="mb-3">
                                        <label for="scrivinome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="scrivinome" placeholder="Heinrich" required>
                                    </div>
                                    
                                    <!-- Cognome -->
                                    <div class="mb-3">
                                        <label for="scrivicognome" class="form-label">Cognome</label>
                                        <input type="text" class="form-control" id="scrivicognome" placeholder="Himmler" required>
                                    </div>
                                    
                                    <!-- Numero e errore -->
                                    <div class="mb-4">
                                        <label for="scrivinumerozzo" class="form-label">Numero</label>
                                        <input type="tel" class="form-control" id="scrivinumerozzo" placeholder="333 123 4567" pattern="[0-9+ ]+" required>
                                        <p id="haisbagliatonumerozzo" class="error-message d-none">Inserisci solo numeri coglione.</p>
                                    </div>
                                    
                                    <!-- Bottoni -->
                                    <div class="d-grid gap-2">
                                        <button id="buttanone" type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-plus me-2"></i>Aggiungi contatto
                                        </button>
                                        <button id="cancellacontattozzo" type="button" class="btn btn-outline-light d-none">
                                            Annulla modifica
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                <!-- Lista contatti -->
                                <section class="contact-panel">
                                    <!-- Contatore, mostra, nascondi e ricerca -->
                                    <div class="d-flex flex-column flex-md-row gap-3 justify-content-between align-items-md-center mb-3">
                                        <div>
                                            <h2 class="h4 fw-bold mb-1">Contatti</h2>
                                            <p id="contadeifrocioni" class="text-secondary mb-0">Ti odiano tutti</p>
                                        </div>
                                        <button id="mostranascondicontatti" type="button" class="btn btn-primary">
                                            Nascondi contatti
                                        </button>
                                        <div class="search-box">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            <input type="search" id="rastrellailghetto" class="form-control" placeholder="Cerca contatto">
                                        </div>
                                    </div>
                                    
                                    <!-- Vuoto -->
                                    <div id="vuoto" class="empty-state">
                                        <i class="fa-regular fa-address-book"></i>
                                        <p class="mb-0">Nessun contatto.</p>
                                    </div>
                                    
                                    <!-- Lista creata con il DOM -->
                                    <div id="listafrocioni" class="contacts-list"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Link JS -->
    <script src="/js/rubrica.js"></script>
</body>
</html>

