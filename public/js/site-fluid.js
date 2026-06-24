(() => {
    const boot = () => {
        const body = document.body;
        const root = document.documentElement;

        if (! body || body.dataset.fluidReady === "true") {
            return;
        }

        body.dataset.fluidReady = "true";
        body.classList.add("fluid-enhanced");

        const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        const hasFinePointer = window.matchMedia("(pointer: fine)").matches;

        document.querySelectorAll("img:not([loading]), iframe:not([loading])").forEach((media) => {
            media.setAttribute("loading", "lazy");
        });

        document.querySelectorAll("img:not([decoding])").forEach((image) => {
            image.setAttribute("decoding", "async");
        });

        let progressBar = document.querySelector("[data-scroll-progress]");

        if (! progressBar) {
            progressBar = document.createElement("div");
            progressBar.className = "fluid-scroll-progress";
            progressBar.setAttribute("data-fluid-scroll-progress", "");
            progressBar.setAttribute("aria-hidden", "true");
            body.prepend(progressBar);
        }

        const updateScrollEffects = () => {
            const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = scrollableHeight > 0 ? window.scrollY / scrollableHeight : 0;
            const clampedProgress = Math.min(Math.max(progress, 0), 1);

            progressBar.style.transform = `scaleX(${clampedProgress})`;
            root.style.setProperty("--fluid-scroll-ratio", clampedProgress.toFixed(3));
            root.style.setProperty("--fluid-hero-y", `${Math.min(window.scrollY * 0.08, 36)}px`);
        };

        updateScrollEffects();
        window.addEventListener("scroll", updateScrollEffects, { passive: true });
        window.addEventListener("resize", updateScrollEffects);

        const revealCandidates = [
            "main > *",
            "section",
            "article",
            ".card",
            ".grid > *",
            ".exercise-grid > *",
            ".annunci-grid > *",
            ".feature-grid > *",
            "form",
            "footer",
        ];

        const revealElements = [...new Set([...document.querySelectorAll(revealCandidates.join(","))])]
            .filter((element) => {
                if (! (element instanceof HTMLElement)) {
                    return false;
                }

                const style = window.getComputedStyle(element);

                return style.display !== "none" &&
                    style.visibility !== "hidden" &&
                    style.transform === "none" &&
                    ! element.closest("[data-no-fluid]") &&
                    ! element.classList.contains("carousel-item");
            })
            .slice(0, 120);

        revealElements.forEach((element, index) => {
            element.classList.add("fluid-reveal");
            element.style.setProperty("--fluid-reveal-delay", `${Math.min(index * 35, 420)}ms`);
        });

        if ("IntersectionObserver" in window && ! prefersReducedMotion) {
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (! entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add("is-fluid-visible");
                    observer.unobserve(entry.target);
                });
            }, {
                rootMargin: "0px 0px -8% 0px",
                threshold: 0.12,
            });

            revealElements.forEach((element) => revealObserver.observe(element));
        } else {
            revealElements.forEach((element) => element.classList.add("is-fluid-visible"));
        }

        document.addEventListener("click", (event) => {
            const anchor = event.target.closest("a[href^='#']");

            if (! anchor) {
                return;
            }

            const targetId = anchor.getAttribute("href");

            if (! targetId || targetId === "#") {
                return;
            }

            let target = null;

            try {
                target = document.querySelector(targetId);
            } catch {
                return;
            }

            if (! target) {
                return;
            }

            event.preventDefault();
            target.scrollIntoView({
                behavior: prefersReducedMotion ? "auto" : "smooth",
                block: "start",
            });

            history.pushState(null, "", targetId);
        });

        const currentPage = decodeURIComponent(window.location.pathname.split("/").pop() || "home");

        document.querySelectorAll("a[href]").forEach((link) => {
            const href = link.getAttribute("href");

            if (! href || href.startsWith("#") || href.startsWith("http") || href.startsWith("mailto:") || href.startsWith("tel:")) {
                return;
            }

            const linkPage = decodeURIComponent(href.split("/").pop() || "");

            if (linkPage === currentPage) {
                link.setAttribute("aria-current", "page");
            }
        });

        if (! document.querySelector(".back-to-top, .scroll-top-button, .fluid-scroll-top")) {
            const scrollTopButton = document.createElement("button");
            scrollTopButton.className = "fluid-scroll-top";
            scrollTopButton.type = "button";
            scrollTopButton.setAttribute("aria-label", "Torna all'inizio");
            scrollTopButton.textContent = "\u2191";
            body.append(scrollTopButton);

            const updateScrollTopButton = () => {
                scrollTopButton.classList.toggle("is-visible", window.scrollY > 260);
            };

            updateScrollTopButton();
            window.addEventListener("scroll", updateScrollTopButton, { passive: true });

            scrollTopButton.addEventListener("click", () => {
                window.scrollTo({
                    top: 0,
                    behavior: prefersReducedMotion ? "auto" : "smooth",
                });
            });
        }

        if (hasFinePointer && ! prefersReducedMotion) {
            const tiltElements = [...document.querySelectorAll(".card, article, .exercise-card, .annuncio-card, .feature-card, .trailer-card, .announcement-card")]
                .filter((element) => {
                    if (! (element instanceof HTMLElement)) {
                        return false;
                    }

                    const style = window.getComputedStyle(element);

                    return style.transform === "none" && ! element.closest("[data-no-fluid]");
                })
                .slice(0, 80);

            tiltElements.forEach((element) => {
                element.classList.add("fluid-tiltable");

                element.addEventListener("pointermove", (event) => {
                    const rect = element.getBoundingClientRect();
                    const x = ((event.clientX - rect.left) / rect.width - 0.5) * 8;
                    const y = ((event.clientY - rect.top) / rect.height - 0.5) * -8;

                    element.style.setProperty("--fluid-tilt-x", `${y.toFixed(2)}deg`);
                    element.style.setProperty("--fluid-tilt-y", `${x.toFixed(2)}deg`);
                });

                element.addEventListener("pointerleave", () => {
                    element.style.removeProperty("--fluid-tilt-x");
                    element.style.removeProperty("--fluid-tilt-y");
                });
            });
        }
    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", boot, { once: true });

        return;
    }

    boot();
})();
