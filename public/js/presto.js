let nav = document.querySelector(".street-nav");
let backToTop = document.querySelector(".back-to-top");
let backgroundMusic = document.querySelector(".background-music");
let musicToggle = document.querySelector(".music-toggle");
// Cambia lo stile della navbar appena la pagina viene scrollata.
if (nav || backToTop) {
    let updateScrollState = () => {
        let isScrolled = window.scrollY > 0;
        if (nav) {
            nav.classList.toggle("is-scrolled", isScrolled);
        }
        if (backToTop) {
            backToTop.classList.toggle("is-visible", isScrolled);
        }
    };
    updateScrollState();
    window.addEventListener("scroll", updateScrollState);
}
// Gestisce la musica di sottofondo: parte al caricamento e il bottone fa play/pausa.
let setupBackgroundMusic = () => {
    if (!backgroundMusic || !musicToggle) {
        return;
    }

    let setMusicButton = (isPlaying) => {
        musicToggle.setAttribute("aria-label", isPlaying ? "Metti in pausa la musica" : "Avvia la musica");
        musicToggle.innerHTML = isPlaying
            ? '<span class="fa-stack music-toggle-stack"><i class="fa-solid fa-music fa-stack-1x"></i><i class="fa-solid fa-slash fa-stack-1x"></i></span>'
            : '<i class="fa-solid fa-music"></i>';
    };
    let playMusic = () => {
        backgroundMusic.play()
            .then(() => {
                setMusicButton(true);
            })
            .catch(() => {
                setMusicButton(false);
            });
    };

    backgroundMusic.currentTime = 0;
    playMusic();

    musicToggle.addEventListener("click", () => {
        if (backgroundMusic.paused) {
            playMusic();
            return;
        }
        backgroundMusic.pause();
        setMusicButton(false);
    });
};
setupBackgroundMusic();
// Inizializza AOS.
if (window.AOS) {
    AOS.init({
        duration: 800,
        once: false,
        mirror: true,
        offset: 80,
    });
}
// Gestisce gli effetti hover degli elementi.
let addHoverEffect = (selector, hoverStyles) => {
    document.querySelectorAll(selector).forEach((element) => {
        element.style.transition = "transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease, background 0.2s ease";
        element.addEventListener("pointerenter", () => {
            Object.assign(element.style, hoverStyles);
        });
        element.addEventListener("pointerleave", () => {
            Object.keys(hoverStyles).forEach((property) => {
                element.style[property] = "";
            });
        });
    });
};
addHoverEffect(".brand-logo", {
    transform: "scale(1.08)",
    boxShadow: "5px 5px 0 var(--red), -4px -4px 0 var(--violet)",
});
addHoverEffect(".brand-sub, .brand-annunci, .brand-home-index", {
    transform: "scale(1.08)",
});
addHoverEffect(".nav-car-images img", {
    transform: "scale(1.08)",
    filter: "drop-shadow(4px 4px 0 rgba(252, 0, 2, 0.78))",
});
addHoverEffect(".cars-dropdown-toggle", {
    transform: "scale(1.08)",
    boxShadow: "6px 6px 0 var(--red)",
});
addHoverEffect(".theme-toggle", {
    transform: "scale(1.08)",
    boxShadow: "6px 6px 0 var(--red)",
});
addHoverEffect(".cars-dropdown-menu a", {
    transform: "scale(1.05)",
    background: "rgba(255, 255, 255, 0.16)",
});
// Popola la tendina Auto usando gli stessi modelli presenti nel JSON degli annunci.
let setupCarsDropdown = () => {
    let dropdownMenus = document.querySelectorAll(".cars-dropdown-menu");
    if (!dropdownMenus.length) {
        return;
    }

    fetch("/data/annuncipresto.json")
        .then((response) => response.json())
        .then((annunci) => {
            let models = [...new Set(annunci.map((annuncio) => annuncio.model).filter(Boolean))];
            dropdownMenus.forEach((menu) => {
                menu.innerHTML = "";
                models.forEach((model) => {
                    let link = document.createElement("a");
                    link.href = `./prestoannunci.html?model=${encodeURIComponent(model)}#annunci`;
                    link.textContent = model;
                    link.setAttribute("aria-label", `Vai agli annunci ${model}`);
                    menu.appendChild(link);
                });
            });
            addHoverEffect(".cars-dropdown-menu a", {
                transform: "scale(1.05)",
                background: "rgba(255, 255, 255, 0.16)",
            });
        });
};
setupCarsDropdown();
addHoverEffect(".hero-poster img", {
    transform: "rotate(3deg) scale(1.05)",
    boxShadow: "12px 12px 0 var(--red), -8px -8px 0 var(--violet)",
});
addHoverEffect(".hero-strip span", {
    transform: "scale(1.08)",
    boxShadow: "6px 6px 0 var(--red)",
});
addHoverEffect(".hero-strip img", {
    transform: "scale(1.08)",
    filter: "drop-shadow(5px 6px 0 rgba(6, 5, 10, 0.5))",
});
addHoverEffect(".intro-car-img", {
    transform: "scale(1.04)",
});
addHoverEffect(".toyota-engine-img, .toyota-supra-img", {
    transform: "scale(1.04)",
});
addHoverEffect(".engine-stats", {
    transform: "scale(1.04)",
    boxShadow: "12px 12px 0 var(--red), -8px -8px 0 var(--violet)",
});
addHoverEffect(".sales-counter", {
    transform: "scale(1.06)",
});
addHoverEffect(".year-badge", {
    transform: "scale(1.06)",
    boxShadow: "10px 10px 0 var(--red), -6px -6px 0 var(--blue)",
});
addHoverEffect(".toyota-badge", {
    transform: "scale(1.06)",
    boxShadow: "10px 10px 0 var(--red), -6px -6px 0 var(--blue)",
});
addHoverEffect(".third-link", {
    transform: "scale(1.06)",
    boxShadow: "8px 8px 0 var(--red)",
});
// Collega le barre di ricerca alla pagina annunci usando il testo scritto dall'utente.
let setupSearchForms = () => {
    let currentSearch = new URLSearchParams(window.location.search).get("search") || "";
    document.querySelectorAll(".nav-search, .hero-strip-search, .annunci-section-search").forEach((form) => {
        let input = form.querySelector('input[type="search"]');
        let button = form.querySelector("button");
        if (!input) {
            return;
        }
        input.value = currentSearch;

        let searchCars = (event) => {
            event.preventDefault();
            let query = input.value.trim();
            let searchUrl = "./prestoannunci.html";
            if (query) {
                searchUrl += `?search=${encodeURIComponent(query)}`;
            }
            searchUrl += "#annunci";
            window.location.href = searchUrl;
        };

        form.addEventListener("submit", searchCars);
        if (button) {
            button.addEventListener("click", searchCars);
        }
    });
};
setupSearchForms();
// Bottone Light e Dark Mode.
let themeToggle = document.querySelector(".theme-toggle");
if (themeToggle) {
    let savedTheme = localStorage.getItem("presto-theme");
    if (savedTheme === "light") {
        document.body.classList.add("light-mode");
        themeToggle.setAttribute("aria-label", "Attiva dark mode");
        themeToggle.innerHTML = '<i class="fa-solid fa-moon"></i>';
    }
    themeToggle.addEventListener("click", () => {
        document.body.classList.toggle("light-mode");
        let isLightMode = document.body.classList.contains("light-mode");
        localStorage.setItem("presto-theme", isLightMode ? "light" : "dark");
        themeToggle.setAttribute("aria-label", isLightMode ? "Attiva dark mode" : "Attiva light mode");
        themeToggle.innerHTML = isLightMode ? '<i class="fa-solid fa-moon"></i>' : '<i class="fa-solid fa-sun"></i>';
    });
}
// Riempie le barre motore ogni volta che il box statistiche entra bene nello schermo.
let engineStats = document.querySelector(".engine-stats");
if (engineStats) {
    let engineStatsObserver = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            engineStats.classList.remove("is-visible");
            void engineStats.offsetWidth;
            engineStats.classList.add("is-visible");
        } else {
            engineStats.classList.remove("is-visible");
        }
    }, { threshold: 0.25 });
    engineStatsObserver.observe(engineStats);
}
// Anima il numero delle auto vendute quando il contatore entra nello schermo.
let salesCounter = document.querySelector(".sales-counter");
if (salesCounter) {
    let target = Number(salesCounter.dataset.target);
    let counterInterval;
    let animateCounter = () => {
        let currentNumber = 0;
        let increment = Math.ceil(target / 100);
        clearInterval(counterInterval);
        salesCounter.textContent = 0;
        counterInterval = setInterval(() => {
            currentNumber += increment;
            if (currentNumber >= target) {
                salesCounter.textContent = target;
                clearInterval(counterInterval);
            } else {
                salesCounter.textContent = currentNumber;
            }
        }, 8);
    };
    let observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            animateCounter();
        } else {
            clearInterval(counterInterval);
            salesCounter.textContent = 0;
        }
    }, { threshold: 0.45 });
    observer.observe(salesCounter);
}

