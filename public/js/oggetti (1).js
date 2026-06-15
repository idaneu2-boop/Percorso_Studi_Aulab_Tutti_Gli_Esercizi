(function () {
    const entries = [];
    const originalLog = console.log.bind(console);
    const originalError = console.error.bind(console);

    function formatItem(item) {
        if (typeof item === "string") {
            return item;
        }

        try {
            return JSON.stringify(item, null, 2);
        } catch (error) {
            return String(item);
        }
    }

    function renderConsole() {
        const output = document.querySelector("#console-output");

        if (!output) {
            return;
        }

        output.innerHTML = "";

        if (entries.length === 0) {
            output.textContent = "Nessun output disponibile.";
            return;
        }

        entries.forEach((entry) => {
            const row = document.createElement("div");
            row.textContent = entry.message;

            if (entry.type === "error") {
                row.className = "log-error";
            }

            output.append(row);
        });

        output.scrollTop = output.scrollHeight;
    }

    function pushEntry(type, values) {
        entries.push({
            type,
            message: values.map(formatItem).join(" ")
        });
        renderConsole();
    }

    console.log = function (...values) {
        pushEntry("log", values);
        originalLog(...values);
    };

    console.error = function (...values) {
        pushEntry("error", values);
        originalError(...values);
    };

    window.addEventListener("error", (event) => {
        pushEntry("error", [`Errore: ${event.message}`]);
    });

    window.addEventListener("DOMContentLoaded", () => {
        renderConsole();

        document.querySelectorAll("[data-action]").forEach((button) => {
            button.addEventListener("click", () => {
                const action = button.dataset.action;

                try {
                    if (action === "persona" && typeof persona !== "undefined") {
                        persona.saluta();
                    } else if (action === "garage" && typeof garage !== "undefined") {
                        garage.filtromarche("Fiat");
                    } else if (action === "rubrica" && typeof rubrica !== "undefined") {
                        rubrica.mostracontatti();
                    } else if (action === "bowling" && typeof bowling !== "undefined") {
                        bowling.classificafinale();
                    } else {
                        console.log("Questo esercizio non e ancora disponibile nella pagina.");
                    }
                } catch (error) {
                    console.error(`Errore durante l'esecuzione: ${error.message}`);
                }
            });
        });
    });
})();

