const contactForm = document.querySelector("#contactForm");
const formTitle = document.querySelector("#formTitle");
const firstNameInput = document.querySelector("#firstNameInput");
const lastNameInput = document.querySelector("#lastNameInput");
const phoneInput = document.querySelector("#phoneInput");
const phoneError = document.querySelector("#phoneError");
const submitButton = document.querySelector("#submitButton");
const cancelEditButton = document.querySelector("#cancelEditButton");
const contactSearch = document.querySelector("#contactSearch");
const contactsList = document.querySelector("#contactsList");
const emptyState = document.querySelector("#vuoto");
const contactsCounter = document.querySelector("#contactsCounter");
const toggleContactsButton = document.querySelector("#mostranascondicontatti");
const musicToggle = document.querySelector("#musicToggle");
const musicPlayer = document.querySelector("#musicPlayer");

let editingContactId = null;
let contactsVisible = true;
let currentAudioTime = 0;

const contacts = [
    {
        id: 1,
        name: "Luca",
        surname: "Rossi",
        phone: "333 123 4567",
        favorite: true,
    },
    {
        id: 2,
        name: "Giulia",
        surname: "Bianchi",
        phone: "347 987 6543",
        favorite: false,
    },
];

const updateContactsCounter = (list) => {
    const total = contacts.length;
    const visible = list.length;

    if (contactSearch.value.trim() !== "") {
        contactsCounter.textContent = `${visible} risultati su ${total} contatti`;

        return;
    }

    contactsCounter.textContent = total === 0
        ? "Nessun contatto salvato"
        : total === 1
            ? "1 contatto salvato"
            : `${total} contatti salvati`;
};

const createContactCard = (contact) => {
    const article = document.createElement("article");
    article.className = "contact-card";

    const avatar = document.createElement("div");
    avatar.className = "contact-avatar";
    avatar.innerHTML = '<i class="fa-solid fa-circle-user"></i>';

    const info = document.createElement("div");
    info.className = "contact-info";

    const name = document.createElement("h3");
    name.textContent = `${contact.name} ${contact.surname}`;

    const phone = document.createElement("p");
    phone.className = "contact-phone";

    const phoneIcon = document.createElement("i");
    phoneIcon.className = "fa-solid fa-phone";

    const phoneNumber = document.createElement("span");
    phoneNumber.textContent = contact.phone;

    phone.append(phoneIcon, phoneNumber);
    info.append(name, phone);

    const actions = document.createElement("div");
    actions.className = "contact-actions";

    const editButton = document.createElement("button");
    editButton.type = "button";
    editButton.className = "icon-button";
    editButton.setAttribute("aria-label", "Modifica contatto");
    editButton.innerHTML = '<i class="fa-solid fa-pen"></i>';
    editButton.addEventListener("click", () => editContact(contact.id));

    const favoriteButton = document.createElement("button");
    favoriteButton.type = "button";
    favoriteButton.className = contact.favorite ? "icon-button active" : "icon-button";
    favoriteButton.setAttribute("aria-label", "Segna come preferito");
    favoriteButton.innerHTML = `<i class="${contact.favorite ? "fa-solid" : "fa-regular"} fa-star"></i>`;
    favoriteButton.addEventListener("click", () => toggleFavoriteContact(contact.id));

    const deleteButton = document.createElement("button");
    deleteButton.type = "button";
    deleteButton.className = "icon-button danger";
    deleteButton.setAttribute("aria-label", "Elimina contatto");
    deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
    deleteButton.addEventListener("click", () => deleteContact(contact.id));

    actions.append(editButton, favoriteButton, deleteButton);
    article.append(avatar, info, actions);

    return article;
};

const renderContacts = () => {
    const searchText = contactSearch.value.trim().toLowerCase();
    const filteredContacts = contacts
        .filter((contact) => {
            return contact.name.toLowerCase().includes(searchText)
                || contact.surname.toLowerCase().includes(searchText)
                || contact.phone.includes(searchText);
        })
        .sort((firstContact, secondContact) => Number(secondContact.favorite) - Number(firstContact.favorite)
            || firstContact.surname.localeCompare(secondContact.surname));

    contactsList.innerHTML = "";
    filteredContacts.forEach((contact) => {
        contactsList.append(createContactCard(contact));
    });

    contactsList.classList.toggle("d-none", ! contactsVisible);
    emptyState.classList.toggle("d-none", ! contactsVisible || filteredContacts.length > 0);
    updateContactsCounter(filteredContacts);
};

const toggleContactsVisibility = () => {
    contactsVisible = ! contactsVisible;
    contactsList.classList.toggle("d-none", ! contactsVisible);
    emptyState.classList.toggle("d-none", ! contactsVisible || contacts.length > 0);
    toggleContactsButton.textContent = contactsVisible ? "Nascondi contatti" : "Mostra contatti";
};

const resetForm = () => {
    editingContactId = null;
    contactForm.reset();
    phoneError.classList.add("d-none");
    formTitle.textContent = "Nuovo contatto";
    submitButton.innerHTML = '<i class="fa-solid fa-plus me-2"></i>Aggiungi contatto';
    cancelEditButton.classList.add("d-none");
    firstNameInput.focus();
};

const saveContact = (event) => {
    event.preventDefault();

    const name = firstNameInput.value.trim();
    const surname = lastNameInput.value.trim();
    const phone = phoneInput.value.trim();
    const phoneIsValid = /^[0-9+ ]+$/.test(phone);

    phoneError.classList.toggle("d-none", phoneIsValid);

    if (! name || ! surname || ! phone || ! phoneIsValid) {
        return;
    }

    if (editingContactId !== null) {
        const contact = contacts.find((item) => item.id === editingContactId);

        if (contact) {
            contact.name = name;
            contact.surname = surname;
            contact.phone = phone;
        }

        resetForm();
        renderContacts();

        return;
    }

    contacts.push({
        id: Date.now(),
        name,
        surname,
        phone,
        favorite: false,
    });

    resetForm();
    renderContacts();
};

const editContact = (id) => {
    if (editingContactId === id) {
        resetForm();

        return;
    }

    const contact = contacts.find((item) => item.id === id);

    if (! contact) {
        return;
    }

    editingContactId = id;
    firstNameInput.value = contact.name;
    lastNameInput.value = contact.surname;
    phoneInput.value = contact.phone;
    phoneError.classList.add("d-none");
    formTitle.textContent = "Modifica contatto";
    submitButton.innerHTML = '<i class="fa-solid fa-floppy-disk me-2"></i>Salva modifiche';
    cancelEditButton.classList.remove("d-none");
    firstNameInput.focus();
};

const toggleFavoriteContact = (id) => {
    const contact = contacts.find((item) => item.id === id);

    if (contact) {
        contact.favorite = ! contact.favorite;
        renderContacts();
    }
};

const deleteContact = (id) => {
    const contactIndex = contacts.findIndex((item) => item.id === id);

    if (contactIndex === -1) {
        return;
    }

    contacts.splice(contactIndex, 1);

    if (editingContactId !== null) {
        resetForm();
    }

    renderContacts();
};

contactForm.addEventListener("submit", saveContact);
cancelEditButton.addEventListener("click", resetForm);
phoneInput.addEventListener("input", () => {
    phoneError.classList.add("d-none");
});
contactSearch.addEventListener("input", renderContacts);
toggleContactsButton.addEventListener("click", toggleContactsVisibility);

if (musicToggle && musicPlayer) {
    musicToggle.addEventListener("click", () => {
        if (musicPlayer.paused) {
            musicPlayer.currentTime = currentAudioTime;
            musicPlayer.play().then(() => {
                musicToggle.classList.add("is-playing");
                musicToggle.setAttribute("aria-label", "Ferma musica");
            }).catch(() => {});

            return;
        }

        currentAudioTime = musicPlayer.currentTime;
        musicPlayer.pause();
        musicToggle.classList.remove("is-playing");
        musicToggle.setAttribute("aria-label", "Avvia musica");
    });

    musicPlayer.addEventListener("ended", () => {
        currentAudioTime = 0;
        musicToggle.classList.remove("is-playing");
        musicToggle.setAttribute("aria-label", "Avvia musica");
    });
}

renderContacts();
