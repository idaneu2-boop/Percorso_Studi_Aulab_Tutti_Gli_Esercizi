// Calcolatore di eta canina
// Crea una funzione che riceve l'eta di una persona e restituisce l'eta equivalente di un cane.
// Regola:
// eta canina = eta umana * 7

function calcolaEtaCanina(etaUmana) {
  return etaUmana * 7;
}

let etaUtente = null;

if (typeof prompt === "function") {
  etaUtente = prompt("Inserisci l'eta umana da trasformare in eta canina");
}

if (etaUtente !== null) {
  let etaConvertita = Number(etaUtente);

  if (Number.isNaN(etaConvertita)) {
    console.log("Eta canina: inserisci un numero valido");
  } else {
    console.log("Eta canina:", calcolaEtaCanina(etaConvertita));
  }
}




// Il semaforo parlante
// Crea una funzione semaforo(colore) che riceve un colore e restituisce un'azione.
// Regole:
// "rosso" -> "Fermati"
// "giallo" -> "Rallenta"
// "verde" -> "Vai"
// Per qualsiasi altro colore:
// "Colore non valido"
// Hint
// Puoi usare if/else oppure switch.

function semaforo(colore) {
  switch (colore.toLowerCase().trim()) {
    case "rosso":
      return "Fermati";
    case "giallo":
      return "Rallenta";
    case "verde":
      return "Vai";
    default:
      return "Colore non valido";
  }
}

let coloreUtente = null;

if (typeof prompt === "function") {
  coloreUtente = prompt("Inserisci un colore del semaforo: rosso, giallo o verde");
}

if (coloreUtente !== null) {
  console.log("Semaforo:", semaforo(coloreUtente));
}




// Il distributore di merendine
// Crea una funzione che riceve il nome di uno snack e restituisce un messaggio diverso a seconda dello snack scelto.
// Gli snack li potra scegliere l'utente con un prompt, ma la lista degli snack presenti e data da un array:
// let snacks = ["patatine", "cioccolata", "biscotti", "caramelle"];

let snacks = ["patatine", "cioccolata", "biscotti", "caramelle"];

function distributoreMerendine(snack) {
  let snackScelto = snack.toLowerCase().trim();

  if (!snacks.includes(snackScelto)) {
    return "Snack non disponibile";
  }

  switch (snackScelto) {
    case "patatine":
      return "Hai scelto le patatine: croccanti e salate!";
    case "cioccolata":
      return "Hai scelto la cioccolata: pausa dolce in arrivo!";
    case "biscotti":
      return "Hai scelto i biscotti: ottima scelta per la merenda!";
    case "caramelle":
      return "Hai scelto le caramelle: un po' di energia zuccherata!";
    default:
      return "Snack non disponibile";
  }
}

let snackUtente = null;

if (typeof prompt === "function") {
  snackUtente = prompt("Scegli uno snack: patatine, cioccolata, biscotti o caramelle");
}

if (snackUtente !== null) {
  console.log("Distributore:", distributoreMerendine(snackUtente));
}




// La carta d'identita del supereroe
// Crea un oggetto chiamato supereroe con queste proprieta:
// nome
// potere
// eta
// citta
// Successivamente crea una funzione chiamata:
// presentaSupereroe()
// La funzione deve restituire una frase di presentazione del supereroe usando le proprieta dell'oggetto.
// Output desiderato
// "Spider Byte ha 18 anni e protegge Milano usando il potere di controllare i computer."

let supereroe = {
  nome: "",
  potere: "",
  eta: 0,
  citta: ""
};

function presentaSupereroe() {
  return `${supereroe.nome} ha ${supereroe.eta} anni e protegge ${supereroe.citta} usando il potere di ${supereroe.potere}.`;
}

if (typeof prompt === "function") {
  let nomeSupereroe = prompt("Inserisci il nome del supereroe");
  let potereSupereroe = prompt("Inserisci il potere del supereroe");
  let etaSupereroe = prompt("Inserisci l'eta del supereroe");
  let cittaSupereroe = prompt("Inserisci la citta protetta dal supereroe");

  if (
    nomeSupereroe !== null &&
    potereSupereroe !== null &&
    etaSupereroe !== null &&
    cittaSupereroe !== null
  ) {
    supereroe.nome = nomeSupereroe;
    supereroe.potere = potereSupereroe;
    supereroe.eta = Number(etaSupereroe);
    supereroe.citta = cittaSupereroe;

    if (Number.isNaN(supereroe.eta)) {
      console.log("Supereroe: eta non valida");
    } else {
      console.log("Supereroe:", presentaSupereroe());
    }
  }
}




// Mini gestionale studenti
// Hai un array di oggetti che contiene lo studente e i voti presi a lezione
// let studenti = [
//   { nome: "Marco", voti: [6, 7, 8] },
//   { nome: "Giulia", voti: [9, 8, 10] },
//   { nome: "Luca", voti: [4, 5, 6] },
//   { nome: "Sara", voti: [7, 7, 6] }
// ];
// Crea 3 funzioni:
// calcolaMediaStudente calcola la media dei voti di uno studente
// studentiPromossi restituisce gli studenti con media maggiore o uguale a 6
// aggiungiVoto aggiunge un nuovo voto allo studente indicato
// Hint:
// Le funzioni vanno create fuori dall'array, studenti non e un oggetto, ma un array di oggetti

let studenti = [
  { nome: "Marco", voti: [6, 7, 8] },
  { nome: "Giulia", voti: [9, 8, 10] },
  { nome: "Luca", voti: [4, 5, 6] },
  { nome: "Sara", voti: [7, 7, 6] }
];

function calcolaMediaStudente(studente) {
  let sommaVoti = studente.voti.reduce(function (somma, voto) {
    return somma + voto;
  }, 0);

  return sommaVoti / studente.voti.length;
}

function studentiPromossi(listaStudenti) {
  return listaStudenti.filter(function (studente) {
    return calcolaMediaStudente(studente) >= 6;
  });
}

function aggiungiVoto(nomeStudente, nuovoVoto) {
  let studenteTrovato = studenti.find(function (studente) {
    return studente.nome.toLowerCase() === nomeStudente.toLowerCase().trim();
  });

  if (studenteTrovato === undefined) {
    return "Studente non trovato";
  }

  studenteTrovato.voti.push(nuovoVoto);
  return studenteTrovato;
}

if (typeof prompt === "function") {
  let nomePerMedia = prompt("Di quale studente vuoi calcolare la media? Marco, Giulia, Luca o Sara");

  if (nomePerMedia !== null) {
    let studentePerMedia = studenti.find(function (studente) {
      return studente.nome.toLowerCase() === nomePerMedia.toLowerCase().trim();
    });

    if (studentePerMedia === undefined) {
      console.log("Media studente: studente non trovato");
    } else {
      console.log(`Media ${studentePerMedia.nome}:`, calcolaMediaStudente(studentePerMedia));
    }
  }

  console.log("Studenti promossi:", studentiPromossi(studenti));

  let nomePerNuovoVoto = prompt("A quale studente vuoi aggiungere un voto? Marco, Giulia, Luca o Sara");
  let votoDaAggiungere = prompt("Quale voto vuoi aggiungere?");

  if (nomePerNuovoVoto !== null && votoDaAggiungere !== null) {
    let votoConvertito = Number(votoDaAggiungere);

    if (Number.isNaN(votoConvertito)) {
      console.log("Aggiungi voto: voto non valido");
    } else {
      console.log("Aggiungi voto:", aggiungiVoto(nomePerNuovoVoto, votoConvertito));
    }
  }
}




// Generatore di nickname fantasy
// Crea una funzione che riceva il nome di una persona e un animale e generi una frase completa, aggiungendo un aggettivo tra quelli proposti.
// Esempio:
// generaNickname("Luca", "drago")
// Output
// "Luca il potente drago"
// Aggettivi da usare
// let aggettivi = ["potente","oscuro","veloce","leggendario","misterioso"];
// Hint:
// prendi randomicamente un aggettivo dall'array
// Math.floor(Math.random() * aggettivi.length)

let aggettivi = ["potente", "oscuro", "veloce", "leggendario", "misterioso"];

function generaNickname(nome, animale) {
  let indiceRandom = Math.floor(Math.random() * aggettivi.length);
  let aggettivoRandom = aggettivi[indiceRandom];

  return `${nome} il ${aggettivoRandom} ${animale}`;
}

if (typeof prompt === "function") {
  let nomeNickname = prompt("Inserisci il nome per il nickname fantasy");
  let animaleNickname = prompt("Inserisci l'animale per il nickname fantasy");

  if (nomeNickname !== null && animaleNickname !== null) {
    console.log("Nickname fantasy:", generaNickname(nomeNickname, animaleNickname));
  }
}
