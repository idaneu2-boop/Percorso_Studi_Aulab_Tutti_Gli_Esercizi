const searchInput = document.querySelector("#searchInput");
const categoryFilterButton = document.querySelector("#categoryFilterButton");
const categoryFilterMenu = document.querySelector("#categoryFilterMenu");
const cards = [...document.querySelectorAll(".exercise-card")];
const emptyState = document.querySelector("#emptyState");
const linkedPagesCount = document.querySelector("#linkedPagesCount");
const totalPagesCount = document.querySelector("#totalPagesCount");
const visiblePagesCount = document.querySelector("#visiblePagesCount");
const helperButton = document.querySelector("#helperButton");
const helperBubble = document.querySelector("#helperBubble");
const helperClose = document.querySelector("#helperClose");
const scrollTopButton = document.querySelector("#scrollTopButton");
const homeThemeToggle = document.querySelector("#homeThemeToggle");
const homeFavicon = document.querySelector("#homeFavicon");
const categoryOptions = [...document.querySelectorAll(".category-filter-option")];
const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

const normalizeText = (text) => text
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "");

const searchableCards = cards.map((card) => {
    return {
        element: card,
        text: normalizeText(`${card.dataset.title || ""} ${card.textContent}`),
    };
});

const setCounter = (element, value, duration = 520) => {
    if (! element) {
        return;
    }

    if (prefersReducedMotion) {
        element.textContent = value;

        return;
    }

    const startValue = Number(element.textContent) || 0;
    const startTime = performance.now();

    const tick = (currentTime) => {
        const progress = Math.min((currentTime - startTime) / duration, 1);
        const easedProgress = 1 - ((1 - progress) ** 3);
        const currentValue = Math.round(startValue + ((value - startValue) * easedProgress));

        element.textContent = currentValue;

        if (progress < 1) {
            requestAnimationFrame(tick);
        }
    };

    requestAnimationFrame(tick);
};

setCounter(linkedPagesCount, cards.length);
setCounter(totalPagesCount, cards.length);

const applyFilters = () => {
    const query = normalizeText(searchInput.value.trim());
    let visibleCards = 0;

    searchableCards.forEach(({ element, text }, index) => {
        const isVisible = text.includes(query);

        element.classList.toggle("is-hidden", ! isVisible);
        element.style.setProperty("--reveal-delay", `${Math.min(index * 34, 420)}ms`);

        if (isVisible) {
            visibleCards += 1;
        }
    });

    setCounter(visiblePagesCount, visibleCards, 260);
    emptyState.hidden = visibleCards > 0;
};

const closeCategoryMenu = () => {
    categoryFilterMenu.hidden = true;
    categoryFilterButton.setAttribute("aria-expanded", "false");
};

const openCategoryMenu = () => {
    categoryFilterMenu.hidden = false;
    categoryFilterButton.setAttribute("aria-expanded", "true");
};

const closeHelper = () => {
    helperBubble.hidden = true;
    helperButton.setAttribute("aria-expanded", "false");
};

const openHelper = () => {
    helperBubble.hidden = false;
    helperButton.setAttribute("aria-expanded", "true");
};

searchInput.addEventListener("input", applyFilters);

categoryFilterButton.addEventListener("click", () => {
    if (categoryFilterMenu.hidden) {
        openCategoryMenu();

        return;
    }

    closeCategoryMenu();
});

categoryOptions.forEach((button) => {
    button.addEventListener("click", () => {
        const targetUrl = button.dataset.categoryUrl;

        if (targetUrl && window.location.pathname !== targetUrl) {
            window.location.assign(targetUrl);

            return;
        }

        closeCategoryMenu();
        document.querySelector("#exerciseTitle")?.scrollIntoView({ behavior: "smooth", block: "center" });
    });
});

helperButton.addEventListener("click", () => {
    if (helperBubble.hidden) {
        openHelper();

        return;
    }

    closeHelper();
});

helperClose.addEventListener("click", closeHelper);

if ("IntersectionObserver" in window && ! prefersReducedMotion) {
    const cardObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (! entry.isIntersecting) {
                return;
            }

            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
        });
    }, {
        rootMargin: "0px 0px -8% 0px",
        threshold: 0.12,
    });

    cards.forEach((card, index) => {
        card.style.setProperty("--reveal-delay", `${Math.min(index * 38, 460)}ms`);
        cardObserver.observe(card);
    });
} else {
    cards.forEach((card) => card.classList.add("is-visible"));
}

const updateScrollTopButton = () => {
    scrollTopButton?.classList.toggle("is-visible", window.scrollY > 220);
};

updateScrollTopButton();
window.addEventListener("scroll", updateScrollTopButton);

scrollTopButton?.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});

const setHomeTheme = (isLightMode) => {
    document.body.classList.toggle("light-mode", isLightMode);
    localStorage.setItem("home-theme", isLightMode ? "light" : "dark");
    homeThemeToggle?.setAttribute("aria-label", isLightMode ? "Attiva modalita dark" : "Attiva modalita light");

    if (homeThemeToggle) {
        homeThemeToggle.innerHTML = isLightMode ? '<i class="fa-solid fa-sun"></i>' : '<i class="fa-solid fa-moon"></i>';
    }

    if (homeFavicon) {
        homeFavicon.href = isLightMode ? "/media/blackholelogo2.png" : "/media/blackholelogo.webp";
    }
};

setHomeTheme(localStorage.getItem("home-theme") === "light");

homeThemeToggle?.addEventListener("click", () => {
    setHomeTheme(! document.body.classList.contains("light-mode"));
});

document.addEventListener("click", (event) => {
    if (! event.target.closest(".category-filter")) {
        closeCategoryMenu();
    }

    if (! event.target.closest(".page-helper")) {
        closeHelper();
    }
});

document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
        closeCategoryMenu();
        closeHelper();
        categoryFilterButton.blur();
        helperButton.blur();
    }

    if (event.key === "/" && document.activeElement !== searchInput) {
        event.preventDefault();
        searchInput.focus();
    }
});

applyFilters();
