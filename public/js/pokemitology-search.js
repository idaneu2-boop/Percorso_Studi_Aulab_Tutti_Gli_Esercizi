const searchForm = document.querySelector("[data-pokemitology-search]");
const searchStatus = document.querySelector("[data-pokemitology-search-status]");
const searchRoots = [...document.querySelectorAll(".container1, .pokemitology-main")];

const normalizeSearchText = (text) => text
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "");

const setSearchStatus = (message, isEmpty = false) => {
    if (! searchStatus) {
        return;
    }

    searchStatus.textContent = message;
    searchStatus.classList.toggle("is-visible", message.length > 0);
    searchStatus.classList.toggle("is-empty", isEmpty);
};

const restoreSearchHighlights = () => {
    document.querySelectorAll("mark.pokemitology-search-match").forEach((highlight) => {
        const parent = highlight.parentNode;

        highlight.replaceWith(document.createTextNode(highlight.textContent));
        parent?.normalize();
    });
};

const buildSearchMap = (text) => {
    let normalizedText = "";
    const positions = [];

    [...text].forEach((character, index) => {
        const normalizedCharacter = normalizeSearchText(character);

        [...normalizedCharacter].forEach((searchCharacter) => {
            normalizedText += searchCharacter;
            positions.push(index);
        });
    });

    return { normalizedText, positions };
};

const findRanges = (text, query) => {
    const { normalizedText, positions } = buildSearchMap(text);
    const normalizedQuery = normalizeSearchText(query);
    const ranges = [];
    let searchFrom = 0;

    if (normalizedQuery === "") {
        return ranges;
    }

    while (searchFrom < normalizedText.length) {
        const matchIndex = normalizedText.indexOf(normalizedQuery, searchFrom);

        if (matchIndex === -1) {
            break;
        }

        const start = positions[matchIndex];
        const end = positions[matchIndex + normalizedQuery.length - 1] + 1;

        if (start !== undefined && end !== undefined) {
            ranges.push({ start, end });
        }

        searchFrom = matchIndex + normalizedQuery.length;
    }

    return ranges;
};

const createHighlightedFragment = (text, ranges) => {
    const fragment = document.createDocumentFragment();
    let cursor = 0;

    ranges.forEach(({ start, end }) => {
        if (start > cursor) {
            fragment.append(document.createTextNode(text.slice(cursor, start)));
        }

        const mark = document.createElement("mark");
        mark.className = "pokemitology-search-match";
        mark.textContent = text.slice(start, end);
        fragment.append(mark);
        cursor = end;
    });

    if (cursor < text.length) {
        fragment.append(document.createTextNode(text.slice(cursor)));
    }

    return fragment;
};

const collectSearchTextNodes = () => {
    const nodes = [];
    const ignoredTags = new Set(["SCRIPT", "STYLE", "TEXTAREA", "INPUT", "BUTTON"]);

    searchRoots.forEach((root) => {
        const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, {
            acceptNode(node) {
                const parent = node.parentElement;

                if (! parent || ignoredTags.has(parent.tagName) || ! node.textContent.trim()) {
                    return NodeFilter.FILTER_REJECT;
                }

                return NodeFilter.FILTER_ACCEPT;
            },
        });

        while (walker.nextNode()) {
            nodes.push(walker.currentNode);
        }
    });

    return nodes;
};

const applyPokemitologySearch = (shouldScroll = false) => {
    const input = searchForm?.querySelector('input[type="search"]');
    const query = input?.value.trim() ?? "";

    restoreSearchHighlights();

    if (query === "") {
        setSearchStatus("");

        return;
    }

    let matchCount = 0;

    collectSearchTextNodes().forEach((node) => {
        const ranges = findRanges(node.textContent, query);

        if (ranges.length === 0) {
            return;
        }

        matchCount += ranges.length;
        node.replaceWith(createHighlightedFragment(node.textContent, ranges));
    });

    const highlights = [...document.querySelectorAll("mark.pokemitology-search-match")];
    const firstMatch = highlights[0];

    if (! firstMatch) {
        setSearchStatus("Nessun risultato", true);

        return;
    }

    firstMatch.classList.add("is-current");
    setSearchStatus(`${matchCount} ${matchCount === 1 ? "risultato" : "risultati"}`);

    if (shouldScroll) {
        firstMatch.scrollIntoView({ behavior: "smooth", block: "center" });
    }
};

if (searchForm) {
    const input = searchForm.querySelector('input[type="search"]');
    let searchTimeout;

    input?.addEventListener("input", () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => applyPokemitologySearch(false), 120);
    });

    searchForm.addEventListener("submit", (event) => {
        event.preventDefault();
        applyPokemitologySearch(true);
    });
}
