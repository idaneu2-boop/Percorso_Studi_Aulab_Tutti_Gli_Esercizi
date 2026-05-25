const mainHeading = document.querySelector("#mainHeading");
const classHeading = document.querySelector("#classHeading");
const textHeading = document.querySelector("#textHeading");
const paragraphs = document.querySelectorAll("#paragraphList p");
const colorButton = document.querySelector("#etniabtn");
const boldButton = document.querySelector("#mcbtn");
const toggleButton = document.querySelector("#fuckisrael");
const contactsList = document.querySelector("#contactsList");

mainHeading.style.color = "#e30613";
classHeading.classList.add("highlight-title");
textHeading.textContent = "Ritorneremo prima o dopo!";

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
