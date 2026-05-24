const searchInput = document.querySelector("#searchInput");
const categoryFilterButton = document.querySelector("#categoryFilterButton");
const categoryFilterLabel = categoryFilterButton.querySelector(".category-filter-label");
const categoryFilterMenu = document.querySelector("#categoryFilterMenu");
const cards = [...document.querySelectorAll(".exercise-card")];
const emptyState = document.querySelector("#emptyState");
const linkedPagesCount = document.querySelector("#linkedPagesCount");
const helperButton = document.querySelector("#helperButton");
const helperBubble = document.querySelector("#helperBubble");
const helperClose = document.querySelector("#helperClose");
let selectedCategory = "";

const normalizeText = (text) =>
  text
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "");

const categoryOptions = ["Console Unix", "Html", "Css", "Bootstrap", "Flowcharts", "JS"].map((label) => ({
  label,
  value: normalizeText(label),
}));

const getMacroCategory = (text) => {
  const normalizedText = normalizeText(text);

  return categoryOptions.find(({ value }) => normalizedText.includes(value))?.value || "";
};

const searchableCards = cards.map((card) => {
  const tag = card.querySelector(".card-tag")?.textContent || "";
  const title = card.dataset.title || "";

  return {
    element: card,
    category: getMacroCategory(`${tag} ${title}`),
    text: normalizeText(`${card.dataset.title || ""} ${card.textContent}`),
  };
});

linkedPagesCount.textContent = cards.length;

const applyFilters = () => {
  const query = normalizeText(searchInput.value.trim());
  let visibleCards = 0;

  searchableCards.forEach(({ element, category, text }) => {
    const matchesSearch = text.includes(query);
    const matchesCategory = selectedCategory === "" || category === selectedCategory;
    const isVisible = matchesSearch && matchesCategory;

    element.classList.toggle("is-hidden", !isVisible);
    if (isVisible) {
      visibleCards += 1;
    }
  });

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

const setActiveCategory = (category, label) => {
  selectedCategory = category;
  categoryFilterLabel.textContent = label;

  categoryFilterMenu.querySelectorAll(".category-filter-option").forEach((button) => {
    button.classList.toggle("is-active", button.dataset.category === category);
  });
};

const goToCategory = (category, label) => {
  setActiveCategory(category, label);
  applyFilters();
  closeCategoryMenu();

  const targetCard =
    category === "" ? document.querySelector("#exerciseTitle") : searchableCards.find((card) => card.category === category)?.element;
  if (targetCard?.classList.contains("is-hidden")) {
    searchInput.value = "";
    applyFilters();
  }

  targetCard?.scrollIntoView({ behavior: "smooth", block: "center" });
};

const addCategoryOption = (label, category) => {
  const button = document.createElement("button");
  button.className = "category-filter-option";
  button.type = "button";
  button.textContent = label;
  button.dataset.category = category;
  button.addEventListener("click", () => goToCategory(category, label));
  categoryFilterMenu.append(button);
};

addCategoryOption("Tutti gli esercizi", "");
categoryOptions.forEach(({ label, value }) => {
  addCategoryOption(label, value);
});

searchInput.addEventListener("input", () => {
  const query = normalizeText(searchInput.value.trim());
  const canMatchPartialCategory = query.length >= 2;
  const matchingCategory =
    query &&
    (categoryOptions.find((category) => category.value === query) ||
      (canMatchPartialCategory &&
        (categoryOptions.find((category) => category.value.startsWith(query)) ||
          categoryOptions.find((category) => category.value.includes(query)))));

  if (matchingCategory) {
    setActiveCategory(matchingCategory.value, matchingCategory.label);
  } else if (selectedCategory !== "") {
    setActiveCategory("", "Tutti gli esercizi");
  }

  applyFilters();
});
categoryFilterButton.addEventListener("click", () => {
  if (categoryFilterMenu.hidden) {
    openCategoryMenu();
  } else {
    closeCategoryMenu();
  }
});

helperButton.addEventListener("click", () => {
  if (helperBubble.hidden) {
    openHelper();
  } else {
    closeHelper();
  }
});

helperClose.addEventListener("click", closeHelper);

document.addEventListener("click", (event) => {
  if (!event.target.closest(".category-filter")) {
    closeCategoryMenu();
  }

  if (!event.target.closest(".page-helper")) {
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
});
