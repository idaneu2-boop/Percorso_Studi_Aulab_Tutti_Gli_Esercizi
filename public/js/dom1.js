const mainHeading = document.querySelector("#mainHeading");
const classHeading = document.querySelector("#classHeading");
const textHeading = document.querySelector("#textHeading");
const paragraphs = document.querySelectorAll("#paragraphList p");
const colorButton = document.querySelector("#colorButton");
const boldButton = document.querySelector("#boldButton");
const toggleButton = document.querySelector("#toggleParagraphs");
const contactsList = document.querySelector("#contactsList");
const pageMusic = document.querySelector("#pageMusic");
const audioToggle = document.querySelector("#audioToggle");

mainHeading.style.color = "#e30613";
classHeading.classList.add("highlight-title");
textHeading.textContent = "Testo aggiornato dal DOM!";

const getRandomColor = () => {
  const red = Math.floor(Math.random() * 205) + 30;
  const green = Math.floor(Math.random() * 205) + 30;
  const blue = Math.floor(Math.random() * 205) + 30;

  return `rgb(${red}, ${green}, ${blue})`;
};

colorButton.addEventListener("click", () => {
  paragraphs.forEach((paragraph) => {
    paragraph.style.color = getRandomColor();
  });
});

boldButton.addEventListener("click", () => {
  paragraphs.forEach((paragraph) => {
    paragraph.classList.toggle("is-bold");
  });
});

toggleButton.addEventListener("click", () => {
  paragraphs.forEach((paragraph) => {
    paragraph.classList.toggle("is-hidden");
  });
});

const contacts = [
  { id: 1, name: "Valerio", role: "Docente" },
  { id: 2, name: "Donato", role: "Tutor" },
  { id: 3, name: "Lucia", role: "Studentessa" },
  { id: 4, name: "Daniele", role: "Studente" },
];

contacts.forEach((contact) => {
  const item = document.createElement("li");
  item.innerHTML = `
    <span>${contact.id.toString().padStart(2, "0")}</span>
    <strong>${contact.name}</strong>
    <small>${contact.role}</small>
  `;
  contactsList.appendChild(item);
});

const setAudioState = () => {
  audioToggle.classList.toggle("is-playing", !pageMusic.paused);
  audioToggle.setAttribute("aria-pressed", String(!pageMusic.paused));
};

const playMusic = () => {
  pageMusic.volume = 0.35;
  pageMusic.muted = false;
  pageMusic.play().then(setAudioState).catch(setAudioState);
};

playMusic();
document.addEventListener("DOMContentLoaded", playMusic);
window.addEventListener("load", playMusic);

audioToggle.addEventListener("click", () => {
  if (pageMusic.paused) {
    playMusic();
  } else {
    pageMusic.pause();
    setAudioState();
  }
});

pageMusic.addEventListener("play", setAudioState);
pageMusic.addEventListener("pause", setAudioState);

