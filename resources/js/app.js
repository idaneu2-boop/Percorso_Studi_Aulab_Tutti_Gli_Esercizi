import "../css/app.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import AOS from "aos";

const themeRoot = document.documentElement;
const storedTheme = localStorage.getItem("site-theme") || "dark";
const scrollProgress = document.querySelector("[data-scroll-progress]");
const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

const setTheme = (theme) => {
    const isLight = theme === "light";

    themeRoot.dataset.theme = theme;
    themeRoot.dataset.bsTheme = theme;
    localStorage.setItem("site-theme", theme);

    document.querySelectorAll("[data-theme-toggle]").forEach((button) => {
        const icon = button.querySelector("[data-theme-icon]");
        const label = button.querySelector("[data-theme-label]");

        button.setAttribute("aria-pressed", String(isLight));
        button.setAttribute("aria-label", isLight ? "Attiva dark mode" : "Attiva light mode");

        if (icon) {
            icon.className = isLight ? "bi bi-moon-stars-fill" : "bi bi-sun-fill";
        }

        if (label) {
            label.textContent = isLight ? "Dark" : "Light";
        }
    });
};

setTheme(storedTheme);

AOS.init({
    duration: 700,
    easing: "ease-out-cubic",
    once: true,
    offset: 80,
    disable: () => prefersReducedMotion,
});

const updateScrollProgress = () => {
    if (! scrollProgress) {
        return;
    }

    const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = scrollableHeight > 0 ? window.scrollY / scrollableHeight : 0;

    scrollProgress.style.transform = `scaleX(${Math.min(Math.max(progress, 0), 1)})`;
    themeRoot.style.setProperty("--hero-shift", `${Math.min(window.scrollY * 0.08, 34)}px`);
};

updateScrollProgress();
window.addEventListener("scroll", updateScrollProgress, { passive: true });

document.querySelectorAll("[data-theme-toggle]").forEach((button) => {
    button.addEventListener("click", () => {
        const nextTheme = themeRoot.dataset.theme === "light" ? "dark" : "light";

        setTheme(nextTheme);
    });
});

document.querySelectorAll("[data-range-output]").forEach((rangeInput) => {
    const output = document.querySelector(rangeInput.dataset.rangeOutput);

    if (! output) {
        return;
    }

    const updateValue = () => {
        output.textContent = rangeInput.value;
    };

    updateValue();
    rangeInput.addEventListener("input", updateValue);
});

document.querySelectorAll("[data-spoiler-toggle]").forEach((button) => {
    const spoilerContent = document.querySelector(button.dataset.spoilerToggle);
    const label = button.querySelector("span");

    if (! spoilerContent) {
        return;
    }

    button.addEventListener("click", () => {
        const isVisible = spoilerContent.classList.toggle("is-visible");
        const labelText = isVisible ? "Nascondi contenuto" : "Mostra contenuto";

        button.setAttribute("aria-expanded", String(isVisible));

        if (label) {
            label.textContent = labelText;

            return;
        }

        button.textContent = labelText;
    });
});

document.querySelectorAll(".trailer-card, .announcement-card, .feature-card").forEach((card) => {
    card.addEventListener("pointermove", (event) => {
        if (prefersReducedMotion) {
            return;
        }

        const rect = card.getBoundingClientRect();
        const x = ((event.clientX - rect.left) / rect.width - 0.5) * 10;
        const y = ((event.clientY - rect.top) / rect.height - 0.5) * -10;

        card.style.setProperty("--tilt-x", `${y}deg`);
        card.style.setProperty("--tilt-y", `${x}deg`);
    });

    card.addEventListener("pointerleave", () => {
        card.style.removeProperty("--tilt-x");
        card.style.removeProperty("--tilt-y");
    });
});
