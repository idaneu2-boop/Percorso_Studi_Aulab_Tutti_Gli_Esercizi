// Collegamenti agli elementi HTML
const scrivicontatto = document.querySelector("#scrivicontatto");
const titolezzo = document.querySelector("#titolezzo");
const scrivinome = document.querySelector("#scrivinome");
const scrivicognome = document.querySelector("#scrivicognome");
const scrivinumerozzo = document.querySelector("#scrivinumerozzo");
const haisbagliatonumerozzo = document.querySelector("#haisbagliatonumerozzo");
const buttanone = document.querySelector("#buttanone");
const cancellacontattozzo = document.querySelector("#cancellacontattozzo");
const rastrellailghetto = document.querySelector("#rastrellailghetto");
const listafrocioni = document.querySelector("#listafrocioni");
const vuoto = document.querySelector("#vuoto");
const contadeifrocioni = document.querySelector("#contadeifrocioni");
const mostranascondicontatti = document.querySelector("#mostranascondicontatti");
const musicToggle = document.querySelector("#musicToggle");
const musicPlayer = document.querySelector("#musicPlayer");

// Stato dell'applicazione
let editingContactId = null;
let contattiVisibili = true;
let current = 0;

// Contatti iniziali
const frocioni = [
    {
        id: 1,
        name: "Adolf",
        surname: "Hitler",
        phone: "333 123 4567",
        favorite: true
    },
    {
        id: 2,
        name: "Benito",
        surname: "Mussolini",
        phone: "347 987 6543",
        favorite: false
    }
];

// Aggiorna il contatore dei contatti
function contadeifroci(list) {
    const total = frocioni.length;
    const visible = list.length;
    if (rastrellailghetto.value.trim() !== "") {
        contadeifrocioni.textContent = `${visible} risultati su ${total} contatti`;
        return;
    }
    contadeifrocioni.textContent = total === 0 ? "Ti odiano tutti" : total === 1 ? "1 contatto salvato" : `${total} contatti salvati`;
}

// Crea una card contatto usando il DOM
function creacontattozzo(contact) {
    const article = document.createElement("article");
    article.className = "contact-card";
    const avatar = document.createElement("div");
    avatar.className = "contact-avatar";
    avatar.innerHTML = `<i class="fa-solid fa-circle-user"></i>`;
    const info = document.createElement("div");
    info.className = "contact-info";
    const name = document.createElement("h3");
    name.textContent = `${contact.name} ${contact.surname}`;
    const phone = document.createElement("p");
    phone.className = "contact-phone";
    const phoneIcon = document.createElement("i");
    phoneIcon.className = "fa-solid fa-phone";
    phone.append(phoneIcon, contact.phone);
    info.append(name, phone);
    const actions = document.createElement("div");
    actions.className = "contact-actions";
    
    // Bottone modifica
    const editButton = document.createElement("button");
    editButton.type = "button";
    editButton.className = "icon-button";
    editButton.setAttribute("aria-label", "Modifica contatto");
    editButton.innerHTML = `<i class="fa-solid fa-pen"></i>`;
    editButton.addEventListener("click", () => modificaricchione(contact.id));
    
    // Bottone preferito
    const favoriteButton = document.createElement("button");
    favoriteButton.type = "button";
    favoriteButton.className = contact.favorite ? "icon-button active" : "icon-button";
    favoriteButton.setAttribute("aria-label", "Segna come preferito");
    favoriteButton.innerHTML = `<i class="${contact.favorite ? "fa-solid" : "fa-regular"} fa-star"></i>`;
    favoriteButton.addEventListener("click", () => cameratofavorito(contact.id));
    
    // Bottone elimina
    const deleteButton = document.createElement("button");
    deleteButton.type = "button";
    deleteButton.className = "icon-button danger";
    deleteButton.setAttribute("aria-label", "Elimina contatto");
    deleteButton.innerHTML = `<i class="fa-solid fa-trash"></i>`;
    deleteButton.addEventListener("click", () => eliminaricchione(contact.id));
    actions.append(editButton, favoriteButton, deleteButton);
    article.append(avatar, info, actions);
    return article;
}

// Renderizza, filtra e ordina la lista contatti
function nuovocontattozzov() {
    const searchText = rastrellailghetto.value.trim().toLowerCase();
    const filteredContacts = frocioni
    .filter((contact) => {
        return contact.name.toLowerCase().includes(searchText)
        || contact.surname.toLowerCase().includes(searchText)
        || contact.phone.includes(searchText);
    })
    .sort((a, b) => Number(b.favorite) - Number(a.favorite) || a.surname.localeCompare(b.surname));
    listafrocioni.innerHTML = "";
    filteredContacts.forEach((contact) => {
        listafrocioni.append(creacontattozzo(contact));
    });
    listafrocioni.classList.toggle("d-none", !contattiVisibili);
    vuoto.classList.toggle("d-none", !contattiVisibili || filteredContacts.length > 0);
    contadeifroci(filteredContacts);
}

// Mostra o nasconde la lista contatti
function mostraonascondifrocioni() {
    contattiVisibili = !contattiVisibili;
    listafrocioni.classList.toggle("d-none", !contattiVisibili);
    vuoto.classList.toggle("d-none", !contattiVisibili || frocioni.length > 0);
    mostranascondicontatti.textContent = contattiVisibili ? "Nascondi contatti" : "Mostra contatti";
}

// Aggiunge un nuovo contatto o salva una modifica
function aggiungifrocione(event) {
    event.preventDefault();
    const name = scrivinome.value.trim();
    const surname = scrivicognome.value.trim();
    const phone = scrivinumerozzo.value.trim();
    const phoneIsValid = /^[0-9+ ]+$/.test(phone);
    haisbagliatonumerozzo.classList.toggle("d-none", phoneIsValid);
    if (!name || !surname || !phone || !phoneIsValid) {
        return;
    }
    if (editingContactId !== null) {
        const contact = frocioni.find((item) => item.id === editingContactId);
        if (contact) {
            contact.name = name;
            contact.surname = surname;
            contact.phone = phone;
        }
        resetta();
        nuovocontattozzov();
        return;
    }
    frocioni.push({
        id: Date.now(),
        name,
        surname,
        phone,
        favorite: false
    });
    resetta();
    nuovocontattozzov();
}

// Avvia o annulla la modifica di un contatto
function modificaricchione(id) {
    if (editingContactId === id) {
        resetta();
        return;
    }
    const contact = frocioni.find((item) => item.id === id);
    if (!contact) {
        return;
    }
    editingContactId = id;
    scrivinome.value = contact.name;
    scrivicognome.value = contact.surname;
    scrivinumerozzo.value = contact.phone;
    haisbagliatonumerozzo.classList.add("d-none");
    titolezzo.textContent = "Modifica contatto";
    buttanone.innerHTML = `<i class="fa-solid fa-floppy-disk me-2"></i>Salva modifiche`;
    cancellacontattozzo.classList.remove("d-none");
    scrivinome.focus();
}

// Resetta il form allo stato iniziale
function resetta() {
    editingContactId = null;
    scrivicontatto.reset();
    haisbagliatonumerozzo.classList.add("d-none");
    titolezzo.textContent = "Nuovo contatto";
    buttanone.innerHTML = `<i class="fa-solid fa-plus me-2"></i>Aggiungi contatto`;
    cancellacontattozzo.classList.add("d-none");
    scrivinome.focus();
}

// Attiva o disattiva il preferito
function cameratofavorito(id) {
    const contact = frocioni.find((item) => item.id === id);
    
    if (contact) {
        contact.favorite = !contact.favorite;
        nuovocontattozzov();
    }
}

// Elimina un contatto
function eliminaricchione(id) {
    const contactIndex = frocioni.findIndex((item) => item.id === id);
    if (contactIndex !== -1) {
        frocioni.splice(contactIndex, 1);
        if (editingContactId !== null) {
            resetta();
        }
        nuovocontattozzov();
    }
}

// Eventi della pagina
scrivicontatto.addEventListener("submit", aggiungifrocione);
cancellacontattozzo.addEventListener("click", resetta);
scrivinumerozzo.addEventListener("input", () => {
    haisbagliatonumerozzo.classList.add("d-none");
});
rastrellailghetto.addEventListener("input", nuovocontattozzov);
mostranascondicontatti.addEventListener("click", mostraonascondifrocioni);
musicToggle.addEventListener("click", () => {
    if (musicPlayer.paused) {
        musicPlayer.currentTime = current;
        musicPlayer.play().then(() => {
            musicToggle.classList.add("is-playing");
            musicToggle.setAttribute("aria-label", "Ferma musica");
        }).catch(() => {});
        return;
    }
    current = musicPlayer.currentTime;
    musicPlayer.pause();
    musicToggle.classList.remove("is-playing");
    musicToggle.setAttribute("aria-label", "Avvia musica");
});
musicPlayer.addEventListener("ended", () => {
    current = 0;
    musicToggle.classList.remove("is-playing");
    musicToggle.setAttribute("aria-label", "Avvia musica");
});

// Avvio iniziale
nuovocontattozzov();
