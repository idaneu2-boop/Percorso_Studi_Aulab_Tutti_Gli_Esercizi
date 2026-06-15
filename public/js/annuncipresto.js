// Effetti hover specifici della pagina annunci.
addHoverEffect(".annunci-header-logo, .annunci-header-poster", {
    transform: "scale(1.06)",
});
addHoverEffect(".annuncio-modal-close", {
    transform: "scale(1.08)",
    boxShadow: "6px 6px 0 var(--red)",
});
// Riferimenti agli elementi principali: griglia dinamica, filtro categorie e modale Info.
let cardWrapper = document.querySelector("#cardWrapper");
let categoryWrapper = document.querySelector("#categoryWrapper");
let priceRange = document.querySelector("#priceRange");
let priceValue = document.querySelector("#priceValue");
let annuncioModal = document.querySelector(".annuncio-modal");
let annuncioModalTitle = document.querySelector("#annuncio-modal-title");
let annuncioModalImage = document.querySelector(".annuncio-modal-img");
let annuncioModalText = document.querySelector(".annuncio-modal-box p");
let annuncioModalClose = document.querySelector(".annuncio-modal-close");
let pageParams = new URLSearchParams(window.location.search);
let selectedModel = pageParams.get("model");
let selectedSearch = pageParams.get("search") || "";
let selectedCategory = "Tutte";
let selectedMaxPrice = 0;
let annuncioCardObserver;
let fallbackCarImage = "/media/cars1.png";
// Apre la modale riempiendola con immagine, titolo e descrizione della card selezionata.
let openAnnuncioModal = (title, text, imageSrc, imageAlt) => {
    if (!annuncioModal || !annuncioModalTitle || !annuncioModalText) {
        return;
    }
    annuncioModalTitle.textContent = title;
    if (annuncioModalImage) {
        annuncioModalImage.src = imageSrc || fallbackCarImage;
        annuncioModalImage.alt = imageAlt || title;
    }
    annuncioModalText.textContent = text;
    annuncioModal.classList.add("is-open");
    annuncioModal.setAttribute("aria-hidden", "false");
};
if (annuncioModalImage) {
    annuncioModalImage.addEventListener("error", () => {
        annuncioModalImage.src = fallbackCarImage;
    });
}
// Chiude la modale e la rende di nuovo nascosta agli screen reader.
let closeAnnuncioModal = () => {
    if (!annuncioModal) {
        return;
    }
    annuncioModal.classList.remove("is-open");
    annuncioModal.setAttribute("aria-hidden", "true");
};
if (annuncioModal && annuncioModalClose) {
    annuncioModalClose.addEventListener("click", closeAnnuncioModal);
    annuncioModal.addEventListener("click", (event) => {
        if (event.target === annuncioModal) {
            closeAnnuncioModal();
        }
    });
}
// Osserva ogni card: le barre si riempiono ogni volta che la card rientra nello schermo.
let observeAnnuncioCards = () => {
    if (annuncioCardObserver) {
        annuncioCardObserver.disconnect();
    }
    annuncioCardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            let card = entry.target;
            if (entry.isIntersecting) {
                card.classList.remove("is-visible");
                void card.offsetWidth;
                card.classList.add("is-visible");
            } else {
                card.classList.remove("is-visible");
            }
        });
    }, { threshold: 0.08 });

    document.querySelectorAll(".annuncio-card").forEach((card) => {
        annuncioCardObserver.observe(card);
    });
};

// Crea una singola riga statistica con etichetta e barra percentuale.
let createStat = (label, value) => {
    let stat = document.createElement("div");
    stat.classList.add("annuncio-stat");
    let statLabel = document.createElement("span");
    statLabel.textContent = label;
    let bar = document.createElement("div");
    bar.classList.add("annuncio-bar");
    let fill = document.createElement("i");
    fill.style.setProperty("--bar-width", `${value}%`);
    bar.appendChild(fill);
    stat.append(statLabel, bar);
    return stat;
};
// Converte il prezzo numerico del JSON in formato euro leggibile nella card.
let formatPrice = (price) => {
    return new Intl.NumberFormat("it-IT", {
        style: "currency",
        currency: "EUR",
        maximumFractionDigits: 0,
    }).format(price);
};
// Normalizza il testo per confrontare ricerche anche con maiuscole/minuscole diverse.
let normalizeText = (text) => {
    return String(text).toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
};
// Verifica se una parola dell'annuncio inizia con il testo cercato dall'utente.
let matchesSearch = (annuncio) => {
    if (!selectedSearch) {
        return true;
    }
    let query = normalizeText(selectedSearch);
    let searchableText = [
        annuncio.brand,
        annuncio.model,
        annuncio.category,
        annuncio.year,
        annuncio.detail,
    ].join(" ");
    return normalizeText(searchableText).split(/[\s-]+/).some((word) => word.startsWith(query));
};
// Costruisce una card auto usando i dati arrivati dal file JSON.
let createCard = (annuncio, index) => {
    let card = document.createElement("article");
    card.classList.add("annuncio-card");
    card.setAttribute("data-aos", "fade-up");
    card.setAttribute("data-aos-duration", "700");
    card.setAttribute("data-aos-delay", String((index % 4) * 80));
    let image = document.createElement("img");
    image.classList.add("annuncio-img");
    image.src = annuncio.image || fallbackCarImage;
    image.alt = annuncio.alt;
    image.addEventListener("error", () => {
        image.src = fallbackCarImage;
    }, { once: true });
    let body = document.createElement("div");
    body.classList.add("annuncio-body");
    let brand = document.createElement("span");
    brand.classList.add("annuncio-brand");
    brand.textContent = annuncio.brand;
    let title = document.createElement("h3");
    title.textContent = annuncio.model;
    let date = document.createElement("p");
    date.classList.add("annuncio-date");
    date.textContent = `Costruita nel ${annuncio.year}`;
    let price = document.createElement("p");
    price.classList.add("annuncio-price");
    price.textContent = formatPrice(annuncio.price);
    let stats = document.createElement("div");
    stats.classList.add("annuncio-stats");
    stats.append(
        createStat("Potenza", annuncio.stats.potenza),
        createStat("Handling", annuncio.stats.handling),
        createStat("Stile", annuncio.stats.stile)
    );
    let button = document.createElement("button");
    button.classList.add("annuncio-info-btn");
    button.type = "button";
    button.textContent = "Info";
    button.addEventListener("click", () => {
        openAnnuncioModal(annuncio.model, annuncio.detail, annuncio.image, annuncio.alt);
    });
    body.append(brand, title, date, price, stats, button);
    card.append(image, body);
    return card;
};
// Svuota la griglia e mostra le card in ordine dal prezzo piu basso al piu alto.
let showCards = (annunci) => {
    if (!cardWrapper) {
        return;
    }
    cardWrapper.innerHTML = "";
    if (!annunci.length) {
        cardWrapper.innerHTML = '<p class="annunci-empty">Nessun annuncio trovato.</p>';
        return;
    }
    let orderedAnnunci = [...annunci].sort((firstAnnuncio, secondAnnuncio) => {
        return firstAnnuncio.price - secondAnnuncio.price;
    });
    orderedAnnunci.forEach((annuncio, index) => {
        cardWrapper.appendChild(createCard(annuncio, index));
    });
    observeAnnuncioCards();
    addHoverEffect(".annuncio-card, .annuncio-info-btn", {
        transform: "scale(1.03)",
    });
    if (window.AOS) {
        AOS.refreshHard();
    }
};
// Filtro globale: applica insieme categoria, prezzo massimo e ricerca testuale.
let globalFilter = (annunci) => {
    selectedModel = "";
    window.history.replaceState(null, "", window.location.pathname);
    let filteredAnnunci = annunci.filter((annuncio) => {
        let matchesCategory = selectedCategory === "Tutte" || annuncio.category === selectedCategory;
        let matchesPrice = annuncio.price <= selectedMaxPrice;
        return matchesCategory && matchesPrice && matchesSearch(annuncio);
    });
    showCards(filteredAnnunci);
};

// Aggiorna gli annunci mentre si scrive o cancella testo nella barra di ricerca.
let setLiveSearchFilter = (annunci) => {
    document.querySelectorAll('.nav-search input[type="search"], .hero-strip-search input[type="search"], .annunci-section-search input[type="search"]').forEach((input) => {
        input.value = selectedSearch;
        input.addEventListener("input", () => {
            selectedSearch = input.value.trim();
            document.querySelectorAll('.nav-search input[type="search"], .hero-strip-search input[type="search"], .annunci-section-search input[type="search"]').forEach((otherInput) => {
                if (otherInput !== input) {
                    otherInput.value = selectedSearch;
                }
            });
            globalFilter(annunci);
        });
    });
};

// Trova gli annunci da mostrare quando la navbar passa un modello nell'URL.
let getInitialAnnunci = (annunci) => {
    if (selectedSearch) {
        return annunci.filter((annuncio) => matchesSearch(annuncio));
    }
    if (!selectedModel) {
        return annunci;
    }
    return annunci.filter((annuncio) => annuncio.model === selectedModel);
};
// Genera i filtri categoria partendo dalle categorie presenti nel JSON.
let setCategoryFilter = (annunci, initialAnnunci) => {
    if (!categoryWrapper) {
        return;
    }
    let categories = ["Tutte", ...new Set(annunci.map((annuncio) => annuncio.category))];
    categoryWrapper.innerHTML = "";
    categories.forEach((category, index) => {
        let option = document.createElement("span");
        option.textContent = category;
        option.tabIndex = 0;
        option.dataset.category = category;
        option.setAttribute("role", "button");
        option.setAttribute("aria-pressed", "false");
        if (index === 0 && initialAnnunci === annunci) {
            option.classList.add("is-active");
            option.setAttribute("aria-pressed", "true");
        }
        let filterCards = () => {
            selectedCategory = category;
            categoryWrapper.querySelectorAll("span").forEach((span) => {
                span.classList.toggle("is-active", span === option);
                span.setAttribute("aria-pressed", span === option ? "true" : "false");
            });
            globalFilter(annunci);
        };
        option.addEventListener("click", filterCards);
        option.addEventListener("keydown", (event) => {
            if (event.key === "Enter" || event.key === " ") {
                event.preventDefault();
                filterCards();
            }
        });
        categoryWrapper.appendChild(option);
    });
    addHoverEffect(".annunci-filter-dropdown summary, .annunci-filter-menu span", {
        transform: "scale(1.03)",
    });
};
// Imposta il range prezzo dal prezzo piu basso al prezzo piu alto presenti nel JSON.
let setPriceFilter = (annunci) => {
    if (!priceRange || !priceValue) {
        return;
    }
    let minPrice = Math.min(...annunci.map((annuncio) => annuncio.price));
    let maxPrice = Math.max(...annunci.map((annuncio) => annuncio.price));
    selectedMaxPrice = maxPrice;
    priceRange.min = String(minPrice);
    priceRange.max = String(maxPrice);
    priceRange.step = "1000";
    priceRange.value = String(maxPrice);
    priceValue.textContent = formatPrice(maxPrice);
    priceRange.addEventListener("input", () => {
        selectedMaxPrice = Number(priceRange.value);
        priceValue.textContent = formatPrice(selectedMaxPrice);
        globalFilter(annunci);
    });
};
// Carica gli annunci dal JSON e inizializza filtri e card dinamiche.
fetch("/data/annuncipresto.json")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Impossibile caricare gli annunci.");
        }
        return response.json();
    })
    .then((annunci) => {
        let initialAnnunci = getInitialAnnunci(annunci);
        let hasModelMatch = selectedModel && initialAnnunci.length;
        setPriceFilter(annunci);
        setCategoryFilter(annunci, hasModelMatch ? initialAnnunci : annunci);
        setLiveSearchFilter(annunci);
        showCards(initialAnnunci.length ? initialAnnunci : annunci);
    })
    .catch((error) => {
        if (cardWrapper) {
            cardWrapper.innerHTML = '<p class="annunci-empty">Annunci non disponibili.</p>';
        }
        console.error(error);
    });

