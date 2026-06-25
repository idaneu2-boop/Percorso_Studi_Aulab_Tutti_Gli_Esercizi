<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrica DOM</title>
    <link rel="icon" type="image/jpeg" href="/media/Icona Contatti.jpg">
    <!-- Link Boots -->
    <link href="/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="/css/rubrica.css">
  <x-fluid-assets target="head" />
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
                            <h1 class="display-5 fw-bold mb-2">卐 La mia Rubrica 卐</h1>
                            <div class="header-actions">
                                <a class="home-button" href="home.html">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Home</span>
                                </a>
                                <div class="music-control">
                                    <i class="fa-solid fa-volume-high"></i>
                                    <button id="musicToggle" type="button" class="music-button" aria-label="Avvia musica">
                                        <img decoding="async" loading="lazy" src="/media/Icona Contatti.jpg" alt="">
                                    </button>
                                    <i class="fa-solid fa-volume-xmark"></i>
                                </div>
                            </div>
                            <audio preload="none" id="musicPlayer" src="/media/C418  - Sweden - Minecraft Volume Alpha.mp3"></audio>
                        </header>
                        
                        <!-- Card e contenuti della rubrica -->
                        <div class="row g-4">
                            <div class="col-12">
                                <!-- Form per aggiungere o modificare un contatto -->
                                <form id="contactForm" class="contact-panel">
                                    <h2 id="formTitle" class="h4 fw-bold mb-3">Nuovo contatto</h2>
                                    
                                    <!-- Nome -->
                                    <div class="mb-3">
                                        <label for="firstNameInput" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="firstNameInput" placeholder="Luca" required>
                                    </div>
                                    
                                    <!-- Cognome -->
                                    <div class="mb-3">
                                        <label for="lastNameInput" class="form-label">Cognome</label>
                                        <input type="text" class="form-control" id="lastNameInput" placeholder="Rossi" required>
                                    </div>
                                    
                                    <!-- Numero e errore -->
                                    <div class="mb-4">
                                        <label for="phoneInput" class="form-label">Numero</label>
                                        <input type="tel" class="form-control" id="phoneInput" placeholder="333 123 4567" pattern="[0-9+ ]+" required>
                                        <p id="phoneError" class="error-message d-none">Inserisci solo numeri validi.</p>
                                    </div>
                                    
                                    <!-- Bottoni -->
                                    <div class="d-grid gap-2">
                                        <button id="submitButton" type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-plus me-2"></i>Aggiungi contatto
                                        </button>
                                        <button id="cancelEditButton" type="button" class="btn btn-outline-light d-none">
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
                                            <p id="contactsCounter" class="text-secondary mb-0">Nessun contatto salvato</p>
                                        </div>
                                        <button id="mostranascondicontatti" type="button" class="btn btn-primary">
                                            Nascondi contatti
                                        </button>
                                        <div class="search-box">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            <input type="search" id="contactSearch" class="form-control" placeholder="Cerca contatto">
                                        </div>
                                    </div>
                                    
                                    <!-- Vuoto -->
                                    <div id="vuoto" class="empty-state">
                                        <i class="fa-regular fa-address-book"></i>
                                        <p class="mb-0">Nessun contatto.</p>
                                    </div>
                                    
                                    <!-- Lista creata con il DOM -->
                                    <div id="contactsList" class="contacts-list"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Link JS Bootstrap -->
    <script src="/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- Link JS -->
    <script src="/js/rubrica.js"></script>
  <x-fluid-assets target="body" />
</body>
</html>
