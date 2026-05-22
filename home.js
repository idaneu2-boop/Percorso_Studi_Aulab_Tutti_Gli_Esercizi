const searchInput = document.querySelector("#searchInput");
const cards = [...document.querySelectorAll(".exercise-card")];
const emptyState = document.querySelector("#emptyState");

searchInput.addEventListener("input", () => {
  const query = searchInput.value.trim().toLowerCase();
  let visibleCards = 0;

  cards.forEach((card) => {
    const title = card.dataset.title.toLowerCase();
    const isVisible = title.includes(query);

    card.hidden = !isVisible;
    if (isVisible) {
      visibleCards += 1;
    }
  });

  emptyState.hidden = visibleCards > 0;
});
