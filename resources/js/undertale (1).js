const ageForm = document.querySelector('[data-form="age"]');
const temperatureForm = document.querySelector('[data-form="temperature"]');
const tableForm = document.querySelector('[data-form="table"]');
const oddForm = document.querySelector('[data-form="odd"]');
const drinkForm = document.querySelector('[data-form="drink"]');
const diceForm = document.querySelector('[data-form="dice"]');

const ageResult = document.querySelector("#ageResult");
const temperatureResult = document.querySelector("#temperatureResult");
const tableResult = document.querySelector("#tableResult");
const oddResult = document.querySelector("#oddResult");
const drinkResult = document.querySelector("#drinkResult");
const diceResult = document.querySelector("#diceResult");
const diceBoard = document.querySelector("#diceBoard");
const hangingDog = document.querySelector(".hanging-dog");
const annoyingDog = document.querySelector(".annoying-dog-runner");
const dogsong = document.querySelector("#dogsong");
const sansTrigger = document.querySelector(".sans-trigger");
const sansImage = document.querySelector("#sansImage");
const sansSong = document.querySelector("#sansSong");

function categoriaEta(eta) {
  if (eta < 13) {
    return "Sei nella fascia bambini: energia alta e compiti bassi.";
  }

  if (eta < 18) {
    return "Sei nella fascia teenager: modalita crescita attiva.";
  }

  if (eta < 30) {
    return "Sei nella fascia giovani adulti: potenziale al massimo.";
  }

  if (eta < 65) {
    return "Sei nella fascia adulti: esperienza in caricamento continuo.";
  }

  return "Sei nella fascia senior: livello saggezza sbloccato.";
}

function messaggioTemperatura(gradi) {
  if (gradi <= -11) {
    return "Freddo estremo: meglio restare al caldo.";
  }

  if (gradi <= -1) {
    return "Fa freddo: sciarpa consigliata.";
  }

  if (gradi <= 19) {
    return "Clima fresco: giacca leggera pronta.";
  }

  if (gradi <= 29) {
    return "Temperatura piacevole: giornata perfetta per uscire.";
  }

  return "Fa caldo: acqua, ombra e pausa.";
}

function generaTabellina(numero) {
  const righe = [];

  for (let i = 1; i <= 10; i++) {
    righe.push(`${numero} x ${i} = ${numero * i}`);
  }

  return righe.join("\n");
}

function calcolaDispari(limite) {
  let totale = 0;
  let somma = 0;

  for (let i = 1; i <= limite; i++) {
    if (i % 2 !== 0) {
      totale++;
      somma += i;
    }
  }

  return {
    totale: totale,
    media: somma / totale
  };
}

function scegliBevanda(scelta) {
  switch (scelta) {
    case "1":
      return "Hai selezionato acqua.";
    case "2":
      return "Hai selezionato Coca Cola.";
    case "3":
      return "Hai selezionato birra.";
    default:
      return "Scelta non valida: prova una bevanda presente.";
  }
}

function tiraDado() {
  return Math.floor(Math.random() * 6) + 1;
}

function giocaDadi(lanci) {
  let punteggioGiocatore1 = 0;
  let punteggioGiocatore2 = 0;

  for (let i = 0; i < lanci; i++) {
    punteggioGiocatore1 += tiraDado();
    punteggioGiocatore2 += tiraDado();
  }

  let vincitore = "Pareggio";

  if (punteggioGiocatore1 > punteggioGiocatore2) {
    vincitore = "Ha vinto il Giocatore 1";
  } else if (punteggioGiocatore2 > punteggioGiocatore1) {
    vincitore = "Ha vinto il Giocatore 2";
  }

  return {
    punteggioGiocatore1: punteggioGiocatore1,
    punteggioGiocatore2: punteggioGiocatore2,
    vincitore: vincitore
  };
}

function activateDogSong() {
  hangingDog.classList.add("is-playing");
  hangingDog.setAttribute("aria-pressed", "true");
  annoyingDog.classList.remove("is-paused");
  dogsong.play().catch(function () {
    // Alcuni browser bloccano l'audio automatico fino al primo click.
  });
}

function stopDogSong() {
  dogsong.pause();
  dogsong.currentTime = 0;
  hangingDog.classList.remove("is-playing");
  hangingDog.setAttribute("aria-pressed", "false");
  annoyingDog.classList.add("is-paused");
}

ageForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const eta = Number(new FormData(ageForm).get("ageInput"));

  if (Number.isNaN(eta) || eta < 0 || eta > 120) {
    ageResult.textContent = "Inserisci un'eta valida tra 0 e 120.";
    return;
  }

  ageResult.textContent = categoriaEta(eta);
});

temperatureForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const gradi = Number(new FormData(temperatureForm).get("temperatureInput"));

  if (Number.isNaN(gradi)) {
    temperatureResult.textContent = "Inserisci una temperatura valida.";
    return;
  }

  temperatureResult.textContent = messaggioTemperatura(gradi);
});

tableForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const numero = Number(new FormData(tableForm).get("tableInput"));

  if (Number.isNaN(numero)) {
    tableResult.textContent = "Inserisci un numero valido.";
    return;
  }

  tableResult.textContent = generaTabellina(numero);
});

oddForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const limite = Number(new FormData(oddForm).get("oddLimit"));

  if (Number.isNaN(limite) || limite < 1) {
    oddResult.textContent = "Inserisci un limite maggiore di 0.";
    return;
  }

  const risultato = calcolaDispari(limite);
  oddResult.textContent = `Dispari trovati: ${risultato.totale}. Media: ${risultato.media.toFixed(2)}.`;
});

drinkForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const scelta = new FormData(drinkForm).get("drinkInput");
  drinkResult.textContent = scegliBevanda(scelta);
});

diceForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const lanci = Number(new FormData(diceForm).get("diceRounds"));

  if (Number.isNaN(lanci) || lanci < 1 || lanci > 20) {
    diceResult.textContent = "Inserisci un numero di lanci tra 1 e 20.";
    return;
  }

  const risultato = giocaDadi(lanci);
  const scores = diceBoard.querySelectorAll("span");

  scores[0].textContent = risultato.punteggioGiocatore1;
  scores[1].textContent = risultato.punteggioGiocatore2;
  diceResult.textContent = `${risultato.vincitore}. Lanci effettuati: ${lanci}.`;
});

hangingDog.addEventListener("click", function () {
  if (hangingDog.classList.contains("is-playing")) {
    stopDogSong();
    return;
  }

  activateDogSong();
});

sansTrigger.addEventListener("click", function () {
  stopDogSong();

  sansImage.src = "../../public/media/sans-meglovania.gif";
  sansTrigger.classList.add("is-active");
  sansSong.currentTime = 0;
  sansSong.play();
});

sansSong.addEventListener("ended", function () {
  window.location.href = "home.html";
});

activateDogSong();
