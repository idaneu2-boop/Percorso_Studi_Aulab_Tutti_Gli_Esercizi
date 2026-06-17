// Esercizio 1
// Hai questo array:
// Crea una funzione  che stampi in console ogni canzone.
let playlist = ["Blinding Lights", "Donato", "Balorda Nostalgia", "Hakuna Matata"];
let canzonisingole = playlist.sort((elemento, indice)=> typeof "string");
console.log(canzonisingole);


// Esercizio 2 - Accesso al cinema
// E' uscito da poco il nuovo film Horror che tutti vogliono vedere.
// Crea una funzione che restituisce:
// "Può vedere il film" se l’età è almeno 14
// "Non può vedere il film" se l'età è sotto i 14
let varieeta = [12, 24, 10, 60];
function buttafuori(numeri) {
    if (numeri >= 14) {
        return "Può vedere il film";
    } else { 
        return "Smamma giovanotto!";
    }
}
let accesso= varieeta.map((eta)=> buttafuori(eta));
console.log(accesso);

// Esercizio 3
// Devi andare a fare una partita di calcetto ma manca il portiere.
// Hai questo array:
// Crea una funzione che aggiunga "Pagliuca" all’inizio dell’array.
let squadra = ["Luca", "Marco", "Giovanni"];
let forzanapoliuagliu = squadra.unshift("Pagliuca");
console.log(squadra);


// Esercizio 4
// Nicola Menonna ha troppa fame ma deve rimanere a dieta!
// Parti da questo array:
// Crea una funzione che rimuova l’ultimo snack e restituisca l’array aggiornato.
let snack = ["popcorn", "patatine", "nachos"];
let dieta = snack.pop();
console.log(snack);


//  Esercizio 5- Matteo può andare in battaglia? 
// Matteo deve partecipare a un LARP medievale ma è sempre in ritardo e rischia di dimenticare pezzi dell’armatura.
// Parti da questo array vuoto:
let armatura = [];
// Crea una funzione preparaMatteo(armatura) che:
// Aggiunga all’array i seguenti pezzi:
// "elmo"
// "corazza"
// "spada"
// "scudo"
// "stivali"
// Dopo di che bisogna controllare se Matteo possiede almeno l'elmo e la spada.
// Hint: è incluso?
// Se sì, allora:
// "Matteo è pronto per la battaglia!" se ha tutti i pezzi fondamentali
// "Matteo è stato sconfitto ancora prima di iniziare" se non ha elmo e spada
// Infine stampi tutti i pezzi dell’armatura uno per uno con un ciclo for classico. 
function drip(armaturozza) {
    armaturozza.push("elmo", "corazza", "spada", "scudo", "stivali");
    if (armaturozza.includes("elmo") && armaturozza.includes("spada")){
        return "Matteo è pronto per la battaglia!";
    } else {
        return "Matteo è stato sconfitto ancora prima di iniziare";
    }
}
let controllo = drip(armatura);
console.log(controllo);


// Esercizio 6
// Donato è il mega boss finale da battere su Yakuza: Like a Dragon.
// Si narra che i suoi punti ferita raggiungano i 1000LP
// Hai questo array che rappresenta i danni che puoi fare con i tuoi attacchi da nabbo:
let danni = [15, 30, 25, 10, 40, 120, 200];
// Crea una funzione che sommi tutti i danni che puoi fare e restituisca:
// "Donato è stato sconfitto" se il totale dei tuoi attacchi supera i LP di Donato
// "Donato vive, Donato regna" se non puoi farci nulla. Donato è troppo potente per noi comuni mortali
function calcolaDanni(numeroattacchi) {
    let mazzatetirate = numeroattacchi.reduce((acc, danno) => acc + danno, 0);
    if (mazzatetirate >= 1000){
        return "Donato è stato sconfitto";
    } else {
        return "Donato resiste ancora";
    }
}
let battaglia = calcolaDanni(danni);
console.log(battaglia);


// Esercizio 7
// Devi battere il capopalestra Valerio di Violapoli.
// E' risaputo che il suo Pidgeot è imbattibile!
// Serve una squadra bilanciata nei livelli.
// Partendo da questo array, con i livelli dei pokémon nella tua squadra:
let livelliPokemon = [30, 20, 6, 12, 18];
// Crea una funzione che calcoli la media della squadra e restituisca:
// "Team adatto a battere Valerio" - Se la media del team è almeno 15
// "Allena di più i tuoi pokémon" - Se la media del team è inferiore a 15
function imiegoats(troppofortipervalerio) {
    let sommalivelli = troppofortipervalerio.reduce((somma, livello)=> somma + livello, 0);
    let medialivelli = sommalivelli / troppofortipervalerio.length;
    if (medialivelli >= 15){
        return "Team adatto a battere Valerio";
    } else {
        return "Allena di più i tuoi Pokémon";
    }
}
let squadraz = imiegoats(livelliPokemon);
console.log(squadraz);


// Esercizio 8 - Voglio tutto con la N
// Marco Dentamaro sta cominciando a collezionare Anime e Manga, ma va proprio matto per quelli che iniziano con la lettera N... chissà perché...
// Partendo da questi due array:
let anime = ["Naruto", "One Piece", "Bleach"];
let manga = ["Berserk", "Death Note", "Dragon Ball"];
// Crea una funzione che prenda in ingresso gli anime e i manga, e:
// Unisca i due array in un nuovo array chiamato collezione
// Crei un nuovo array contenente solo i titoli che hanno la lettera "N"
// Restituisca il nuovo array
function soloN(anime, manga){
    let totaleam = anime.concat(manga);
    return totaleam.filter((titlez)=> titlez.includes("N"));
}
let titoliN = soloN(anime, manga);
console.log(titoliN);


// Esercizio 9
// Marco Dentamaro sta preparando un hamburger ma manca qualche ingrediente.
// Dati questi ingredienti:
let ingredienti = ["ketchup", "patatine", "insalata"];
// Crea una funzione che:
// aggiunga "maionese" alla fine dell’array
// aggiunga "hamburger" all’inizio dell’array
// restituisca l’array aggiornato
function preparaHamburger(robazozza) {
  robazozza.push("maionese");
  robazozza.unshift("hamburger");
  return robazozza;
}
let paninopronto = preparaHamburger(ingredienti)
console.log(paninopronto);


// Esercizio 10
// Reietto... cioè, volevo dire, Valerio Vacca deve preparare la coreografia per il suo prossimo concerto.
let coreografia = ['intro', 'ballata triste', 'stage diving pauroso', 'pausa imbarazzante', 'gran finale'];
// Crea una funzione che:
// rimuova il primo brano
// rimuova l'ultimo brano
// aggiunga 'apertura epica all'inizio'
// aggiunga 'finale con coriandoli' alla fine
// restituisca una stringa unica con tutte le azioni, separate da "-"
function preparacoreografia(frasi) {
  frasi.shift();
  frasi.pop();
  frasi.unshift("apertura epica");
  frasi.push("finale con coriandoli");
  return frasi.join(" - ");
}
let coreografiafinale = preparacoreografia(coreografia);
console.log(coreografiafinale);


// Esercizio 11
// Roberto Russo voleva vedere una serie TV questa sera, ma ha perso i suoi occhiali da vista.
// Aveva detto che voleva scegliere The Boys per guardarsi la puntata finale, ma gli viene difficile capire dove si trova visto che i titoli sono tutti in minuscolo e senza occhiali non vede.
// Crea una funzione che: 
// trasformi tutte le serie in maiuscolo
// stampare in console il nuovo array con i titoli in maiuscolo
// ora che Roberto può leggere meglio i titoli delle serie, chiedere a Roberto che serie vuole guardare
// stampare la scelta di Roberto in console.
let serie = ["game of thrones", "The Boys", "the witcher", "rick e morty", "upload"];
function seriedascegliere(umamusume){
    let maiuscole = umamusume.map(titolo=> titolo.toUpperCase());
    console.log(maiuscole);
    let sceltafalsa = prompt("Roberto, quale serie vuoi guardare? \n GAME OF THRONES \n THE BOYS \n THE WITCHER \n RICK E MORTY \n UPLOAD");
    if (maiuscole.includes(sceltafalsa)){
        let risposta = "Roberto hai scelto " + sceltafalsa + ", ma oggi guarderai comunque Umamusume invece di " + sceltafalsa;
        alert(risposta);
        return risposta;
    }else{
        let risposta = "Hai scritto in maniera sbagliata ti guardi comunque Umamusume";
        alert(risposta);
        return risposta;
    }
}
// seriedascegliere(serie);


// Esercizio 12
// Federica è il Dungeon Master e sta creando il suo party per DnD
// Creare una funzione che:
// controlli se nel party è presente il mago
// restituisca la posizione esatta del mago nell'array
// se il mago non esiste, restituisca: Federica ha dimenticato il mago 
let squadrozzissima = ["guerriero", "mago", "ladro", "stregone"];
function babbuino(components){
    if (components.includes("mago")) {
        let posizioneMago = components.indexOf("mago");
        return "Il mago si trova alla posizione " + posizioneMago;
    } else {
        return "Federica ha dimenticato il mago";
    }
    }
let cestannotutti = babbuino(squadrozzissima);
console.log(cestannotutti);


// Esercizio 13
// Nicola Menonna ha deciso di farsi crescere i capelli per arrivare ad una chioma degna di un protagonista Anime.
// Ha scoperto che esiste un nuovo prodotto che si chiama Gocce Madò che permettono la crescita dei capelli di tot cm a settimana.
// Ogni numero dell'array, rappresenta quanti centimetri sono cresciuti i suoi capelli in una settimana. 
// Nicola parte da una lunghezza iniziale di 2cm.
// Crea una funzione che:
// sommi tutti i centimetri di crescita
// aggiunga al totale, la lunghezza iniziale di 4cm
// stampi in console la lunghezza finale
// infine restituisca:
// Nicola può fare il codino da samurai - se la lunghezza finale è almeno 12cm
// Nicola deve ancora aspettare che crescano - in caso contrario
let crescitaSettimanale = [1, 2, 1, 3, 2];
function capellozzinicola(preghiere){
    let capelliiniz = 4;
    let crescitatot = preghiere.reduce((totale, cm)=> totale + cm, 0);
    let capellitot = crescitatot + capelliiniz;
    console.log("L'amore mio Nicola ha " + capellitot + " cm. di capelli");
    if (capellitot >= 12) {
        return "Nicola può fare il codino da samurai";
    }else{
        return "Nicola ti spalmo io le Gocce Madò";
    }
}
let quindicapelli = capellozzinicola(crescitaSettimanale);
console.log(quindicapelli);


// Esercizio 14
// Valerio ha comprato dei vinili per la sua collezione ma non ha voglia di metterli in ordine.
// Per fortuna esiste una bacchetta magica capace di ordinare automaticamente tutti i vinili nella libreria.
// Hai questi dati:
// La bacchetta magica costa 30 euro.
// Crea una funzione che:
// controlli se Valerio possiede la bacchetta magica
// se NON la possiede:
// controlli se ha abbastanza soldi per comprarla
// se può comprarla, sottragga 30 euro ai soldi e restituisca quanti soldi rimangono a Valerio
// ordini i vinili alfabeticamente
// restituisca l'array ordinato
// se NON può comprarla, restituisca: "Valerio dovrà ordinare i vinili a mano"
let vinili = ["Queen", "Nirvana", "Beatles", "Muse"];
let haBacchettaMagica = false;
let soldi = 40;
function spennemoisordi(dischi, haBacchetta, isordi) {
    if(!haBacchetta){
        if (isordi >= 30) {
            isordi -= 30;
            console.log("Valerio può comprare la bacchetta. Soldi rimasti: " + isordi + " €");
            let dischiord = dischi.sort();
            return dischiord;
        }else{
            return "Valerio è sempre disordinato";
        }
    }else{
        let dischiord = dischi.sort();
        return dischiord;
    }
}
let avemospeso = spennemoisordi(vinili, haBacchettaMagica, soldi);
console.log(avemospeso);


// Esercizio 15
// Donato Ducce ha prodotto un cinepanettone degno di Thor Ragnarok.
// Ogni numero dell'array incassi, rappresenta gli incassi giornalieri in euro, del film nelle sale italiane.
// Crea una funzione che:
// estrapoli e tenga solo gli incassi da almeno 100 euri
// aggiunga 50 euro bonus ad ogni incasso da almeno 100 euro (bravo Donato, te lo sei meritato)
// calcoli il totale finale di questi incassi e restituisca:
// "Successo Clamoroso" - se il totale di questi incassi supera 1000 euri
// "Film di nicchia ma dignitoso" - se il totale è tra 500 e 1000 euri
// "Donato deve andare a vivere sotto un pontos" - se il totale è sotto i 500 euri
let incassi = [120, 80, 300, 50, 400, 90];
function contadeisordi(incas){
    let beisordi = incas.filter((sordi)=> sordi >= 100);
    let sordiinpiu = beisordi.map((sordi)=> sordi + 50);
    let tuttisordi = beisordi.reduce((tutti, sordi)=> tutti + sordi, 0);
    console.log("I sordi in più sono stati: " + sordiinpiu);
    console.log("Ha guadagnato in totale: " + tuttisordi);
    if (tuttisordi < 1000){
        return "Grandeeee viva er DUCCE";
    }else if(tuttisordi >= 500 && tuttisordi <= 1000){
        return "Mejo Star Warse Ascesa der Camminatore der Cielo";
    }else{
        return "Donato deve migliorare la prossima uscita";
    }
}
let comeannata = contadeisordi(incassi);
console.log(comeannata);


// Esercizio finale
// Traccia finale — Il Festival del Codice di Aulab - extra
// Aulab organizza un festival nerd dove ogni partecipante porta una performance diversa.
// Hai questo array:
// Ogni stringa contiene:
// "nome - performance - voto"
// Crea una funzione festivalDelCodice(partecipanti) che:
// trasformi ogni stringa in una frase leggibile così:
// "Marco Dentamaro si esibisce con karaoke anime e prende 7"
let partecipanti = [
  "Marco Dentamaro - karaoke anime - 7",
  "Nicola Menonna - tutorial capelli - 4",
  "Valerio Vacca - assolo di vinili - 9",
  "Matteo Sisto - duello LARP - 8",
  "Donato Ducce - recensione fantasy - 5"
];
function urtimoesercizio(gliamorimiei) {
    let azioni = gliamorimiei.map((persone)=>{
        let contenuti = persone.split(" - ");
        let nome = contenuti[0];
        let performance = contenuti[1];
        let voto = contenuti[2];
        return `${nome} si esibisce con ${performance} e prende ${voto}`;
    });
    return azioni;
}
let spettacoli = urtimoesercizio(partecipanti);
console.log(spettacoli);


////////////////////////////////////////// Area Sito Esercizi ///////////////////////////////////////////
let eserciziPagina = [
    {
        numero: 1,
        argomento: "Playlist",
        titolo: "Stampa ogni canzone",
        descrizione: "Mostra le canzoni presenti nella playlist.",
        risultato: canzonisingole
    },
    {
        numero: 2,
        argomento: "Cinema",
        titolo: "Accesso al cinema",
        descrizione: "Controlla quali eta possono vedere il film.",
        risultato: accesso
    },
    {
        numero: 3,
        argomento: "Calcetto",
        titolo: "Aggiungi il portiere",
        descrizione: "Aggiunge Pagliuca all'inizio della squadra.",
        risultato: squadra
    },
    {
        numero: 4,
        argomento: "Snack",
        titolo: "Snack rimossi",
        descrizione: "Rimuove l'ultimo snack dalla lista.",
        risultato: snack
    },
    {
        numero: 5,
        argomento: "Armatura",
        titolo: "Prepara Matteo",
        descrizione: "Controlla se Matteo ha elmo e spada.",
        risultato: controllo
    },
    {
        numero: 6,
        argomento: "Boss fight",
        titolo: "Danni contro Donato",
        descrizione: "Somma i danni e controlla il risultato della battaglia.",
        risultato: battaglia
    },
    {
        numero: 7,
        argomento: "Pokemon",
        titolo: "Media del team",
        descrizione: "Calcola se la squadra e pronta per Valerio.",
        risultato: squadraz
    },
    {
        numero: 8,
        argomento: "Anime e manga",
        titolo: "Titoli con la N",
        descrizione: "Unisce anime e manga e filtra i titoli con la N.",
        risultato: titoliN
    },
    {
        numero: 9,
        argomento: "Hamburger",
        titolo: "Ingredienti pronti",
        descrizione: "Aggiunge hamburger e maionese alla lista.",
        risultato: paninopronto
    },
    {
        numero: 10,
        argomento: "Coreografia",
        titolo: "Scaletta finale",
        descrizione: "Modifica apertura e finale della coreografia.",
        risultato: coreografiafinale
    },
    {
        numero: 11,
        argomento: "Serie TV",
        titolo: "Scelta serie",
        descrizione: "Apre il prompt solo quando premi il bottone.",
        risultato: "Premi il bottone per aprire il prompt dell'esercizio 11."
    },
    {
        numero: 12,
        argomento: "DnD",
        titolo: "Trova il mago",
        descrizione: "Cerca il mago nel party e restituisce la posizione.",
        risultato: cestannotutti
    },
    {
        numero: 13,
        argomento: "Capelli",
        titolo: "Crescita settimanale",
        descrizione: "Somma la crescita dei capelli e controlla il risultato.",
        risultato: quindicapelli
    },
    {
        numero: 14,
        argomento: "Vinili",
        titolo: "Ordina i vinili",
        descrizione: "Compra la bacchetta, se possibile, e ordina i vinili.",
        risultato: avemospeso
    },
    {
        numero: 15,
        argomento: "Incassi",
        titolo: "Totale del film",
        descrizione: "Calcola il risultato degli incassi del cinepanettone.",
        risultato: comeannata
    },
    {
        numero: 16,
        argomento: "Festival",
        titolo: "Festival del Codice",
        descrizione: "Trasforma ogni partecipante in una frase leggibile.",
        risultato: spettacoli
    }
];

function formattaRisultato(risultato) {
    if (Array.isArray(risultato)) {
        return JSON.stringify(risultato, null, 2);
    }

    return String(risultato);
}

function creaCardEsercizio(esercizio) {
    let card = document.createElement("article");
    card.className = "exercise-card";

    card.innerHTML = `
        <div class="card-top">
            <span class="badge">Esercizio ${esercizio.numero}</span>
            <span class="topic">${esercizio.argomento}</span>
        </div>
        <h2>${esercizio.titolo}</h2>
        <p>${esercizio.descrizione}</p>
        <pre class="result-box is-empty">Risultato non ancora eseguito.</pre>
        <button class="exercise-button" type="button">Mostra risultato</button>
    `;

    let bottone = card.querySelector(".exercise-button");
    let risultatoBox = card.querySelector(".result-box");

    bottone.addEventListener("click", function () {
        if (esercizio.numero === 11) {
            esercizio.risultato = seriedascegliere(serie);
        }

        console.log("Esercizio " + esercizio.numero + ":", esercizio.risultato);
        risultatoBox.classList.remove("is-empty");
        risultatoBox.textContent = formattaRisultato(esercizio.risultato);
    });

    return card;
}

let grigliaEsercizi = document.querySelector("#exerciseGrid");
let contatoreEsercizi = document.querySelector("#exerciseCount");
let bottoneEseguiTutto = document.querySelector("#runAllButton");

if (grigliaEsercizi && contatoreEsercizi && bottoneEseguiTutto) {
    contatoreEsercizi.textContent = eserciziPagina.length;

    eserciziPagina.forEach(function (esercizio) {
        grigliaEsercizi.append(creaCardEsercizio(esercizio));
    });

    bottoneEseguiTutto.addEventListener("click", function () {
        document.querySelectorAll(".exercise-card .exercise-button").forEach(function (bottone) {
            bottone.click();
        });
    });
}


////////////////////////////////////////// Musica Pokédex ///////////////////////////////////////////
let bottoneMusica = document.querySelector("#musicButton");
let audioPokemon = document.querySelector("#pokemonAudio");

function aggiornaBottoneMusica() {
    if (audioPokemon.paused) {
        bottoneMusica.textContent = "Musica ON";
    } else {
        bottoneMusica.textContent = "Musica OFF";
    }
}

function avviaMusicaPokemon() {
    audioPokemon.loop = true;
    audioPokemon.volume = 0.45;

    let promessaAvvio = audioPokemon.play();

    if (promessaAvvio !== undefined) {
        promessaAvvio
            .then(function () {
                aggiornaBottoneMusica();
            })
            .catch(function () {
                bottoneMusica.textContent = "Avvia musica";
            });
    }
}

function fermaMusicaPokemon() {
    audioPokemon.pause();
    aggiornaBottoneMusica();
}

if (bottoneMusica && audioPokemon) {
    avviaMusicaPokemon();

    audioPokemon.addEventListener("ended", function () {
        audioPokemon.currentTime = 0;
        avviaMusicaPokemon();
    });

    audioPokemon.addEventListener("timeupdate", function () {
        if (!audioPokemon.paused && audioPokemon.duration && audioPokemon.duration - audioPokemon.currentTime < 0.25) {
            audioPokemon.currentTime = 0;
            avviaMusicaPokemon();
        }
    });

    bottoneMusica.addEventListener("click", function () {
        if (audioPokemon.paused) {
            avviaMusicaPokemon();
        } else {
            fermaMusicaPokemon();
        }
    });
}

