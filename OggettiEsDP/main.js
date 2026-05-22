// Esercizio 1:
// Crea un oggetto persona con le seguenti caratteristiche:
// nome
// cognome
// eta'
// un metodo che permetta di salutare
let persona = {
  "nome": "Maurizio",
  "cognome": "Costanzo",
  "eta": 84,
  saluta: function () {
    console.log(`Ciao! Il mio nome e' ${this.nome} ${this.cognome} e ho ${this.eta} anni.`);
  }
};

persona.saluta();

// Esercizio 2:
// Realizzare un oggetto che rappresenti un garage:
// Dovrà contenere una lista di automobili.
// Ciascuna automobile dovrà avere una marca (es. Fiat) ed un modello (es. Panda).
// Scrivere un metodo che prenda in input una marca e stampi i modelli presenti nel garage di quella stessa marca.
let garage = {
  "auto": [
    { "marca": "Fiat", "modello": "Panda" },
    { "marca": "Fiat", "modello": "124 Spider" },
    { "marca": "Fiat", "modello": "500" },
    { "marca": "Nissan", "modello": "Qashqai" },
    { "marca": "Nissan", "modello": "Juke" },
    { "marca": "Nissan", "modello": "Vision Gran Turismo" },
    { "marca": "Volkswagen", "modello": "Polo" },
    { "marca": "Volkswagen", "modello": "Golf" },
    { "marca": "Volkswagen", "modello": "Taigo" },
    { "marca": "Alfa Romeo", "modello": "Giulia" },
    { "marca": "Alfa Romeo", "modello": "8C" },
    { "marca": "Alfa Romeo", "modello": "Montreal" }
  ],
  "filtromarche": function (marca) {
    let modelliTrovati = this.auto.filter((auto) => auto.marca === marca);

    if (modelliTrovati.length > 0) {
      console.log(`Modelli della marca ${marca}:`);
      modelliTrovati.forEach((auto) => {
        console.log(auto.modello);
      });
    } else {
      console.log(`Nessun modello trovato per la marca ${marca}`);
    }
  }
};

garage.filtromarche("Fiat");

// Esercizio 3:
// Crea un oggetto agenda con una proprietà che comprenda una lista di contatti con un nome e un numero di telefono, ed abbia diverse funzionalità tra cui:
// mostrare tutti i contatti dell'agenda
// mostrare un singolo contatto
// eliminare un contatto dall'agenda
// aggiungere un nuovo contatto
// modificare un contatto esistente
// HINT:
let rubrica = {
  "contacts": [
    { "nome": "Angela", "telefono": "3331111111" },
    { "nome": "Annalisa", "telefono": "3332222222" },
    { "nome": "Paola", "telefono": "3333333333" },
    { "nome": "Emilia", "telefono": "3334444444" }
  ],
  "mostracontatti": function () {
    console.log("Contatti in rubrica:");
    this.contacts.forEach((contatto) => {
      console.log(`${contatto.nome} - ${contatto.telefono}`);
    });
  },
  "trovacontatti": function (nome) {
    let contatto = this.contacts.find((conta) => conta.nome === nome);

    if (contatto) {
      console.log(`${contatto.nome} - ${contatto.telefono}`);
    } else {
      console.log(`Contatto non trovato`);
    }
  },
  "aggiungicontatto": function (nome, telefono) {
    this.contacts.push({ nome, telefono });
    console.log(`Contatto aggiunto!`);
  },
  "eliminacontatto": function (nome) {
    let lunghezzaIniziale = this.contacts.length;
    this.contacts = this.contacts.filter((conta) => conta.nome !== nome);

    if (this.contacts.length < lunghezzaIniziale) {
      console.log(`Contatto eliminato!`);
    } else {
      console.log(`Contatto non trovato`);
    }
  },
  "modificacontatto": function (nome, nuovoNumero) {
    let contatto = this.contacts.find((conta) => conta.nome === nome);

    if (contatto) {
      contatto.telefono = nuovoNumero;
      console.log(`Contatto modificato!`);
    } else {
      console.log(`Contatto non trovato, riprova`);
    }
  }
};

rubrica.trovacontatti("Paola");
rubrica.aggiungicontatto("Nicola", "333337777555");
rubrica.modificacontatto("Angela", "00000000000");
rubrica.eliminacontatto("Emilia");
rubrica.mostracontatti();

// Esercizio Extra:
// Crea un oggetto bowling con le seguenti caratteristiche:
// una proprietà che comprenda una lista di giocatori con un nome e i relativi punteggi
// diverse funzionalità tra cui:
// creare 10 punteggi casuali per ogni giocatore:
// Suggerimento: questo metodo dovrà ciclare tutti i giocatori, presenti nell'oggetto bowling, e aggiungere ad ogni proprietà scores, dieci punteggi casuali ad ogni giocatore
// Per generare un punteggio casuale da 1 a 10 -> Math.floor(Math.random() * (10 - 1 + 1) + 1)
// trovare il punteggio finale per ogni giocatore:
// Suggerimento: ordinare l'array in ordine decrescente (Attenzione! È un array di oggetti: Array.prototype.sort() - JavaScript | MDN)
// aggiungere un nuovo giocatore e creare 10 punti casuali anche per lui
// determinare il vincitore
// EXTRA:
// Crea un metodo per stilare la classifica finale dei giocatori
// DATI DI PARTENZA:
let bowling = {
  "players": [
    { "name": "Livio", "scores": [] },
    { "name": "Paola", "scores": [] },
    { "name": "Filippo", "scores": [] },
    { "name": "Giuseppe", "scores": [] }
  ],
  creapunteggi: function () {
    this.players.forEach((player) => {
      player.scores = [];

      for (let i = 0; i < 10; i++) {
        let punteggio = Math.floor(Math.random() * (10 - 1 + 1) + 1);
        player.scores.push(punteggio);
      }
    });
  },
  calcolatotale: function (player) {
    return player.scores.reduce((totale, score) => totale + score, 0);
  },
  mostrapunteggifinali: function () {
    this.players.forEach((player) => {
      console.log(`${player.name}: ${this.calcolatotale(player)} punti`);
    });
  },
  aggiungigiocatore: function (nome) {
    let nuovoGiocatore = {
      name: nome,
      scores: []
    };

    for (let i = 0; i < 10; i++) {
      let punteggio = Math.floor(Math.random() * (10 - 1 + 1) + 1);
      nuovoGiocatore.scores.push(punteggio);
    }

    this.players.push(nuovoGiocatore);
  },
  classificafinale: function () {
    this.players.sort((a, b) => this.calcolatotale(b) - this.calcolatotale(a));

    console.log("Classifica finale:");
    this.players.forEach((player, index) => {
      console.log(`${index + 1}. ${player.name} - ${this.calcolatotale(player)} punti`);
    });
  },
  determinavincitore: function () {
    let vincitore = this.players.reduce((migliore, player) => {
      if (this.calcolatotale(player) > this.calcolatotale(migliore)) {
        return player;
      }

      return migliore;
    });

    console.log(`Il vincitore è ${vincitore.name} con ${this.calcolatotale(vincitore)} punti!`);
  }
};

bowling.creapunteggi();
bowling.mostrapunteggifinali();
bowling.aggiungigiocatore("Marco");
bowling.classificafinale();
bowling.determinavincitore();
