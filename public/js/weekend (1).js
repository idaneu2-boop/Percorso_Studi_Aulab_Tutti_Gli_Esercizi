const dogForm = document.querySelector('[data-form="dog"]');
const trafficForm = document.querySelector('[data-form="traffic"]');
const snackForm = document.querySelector('[data-form="snack"]');
const heroForm = document.querySelector('[data-form="hero"]');
const averageForm = document.querySelector('[data-form="average"]');
const addGradeForm = document.querySelector('[data-form="addGrade"]');
const nicknameForm = document.querySelector('[data-form="nickname"]');

const dogResult = document.querySelector("#dogResult");
const trafficResult = document.querySelector("#trafficResult");
const snackResult = document.querySelector("#snackResult");
const heroResult = document.querySelector("#heroResult");
const studentsResult = document.querySelector("#studentsResult");
const nicknameResult = document.querySelector("#nicknameResult");
const studentBoard = document.querySelector("#studentBoard");
const studentAverageSelect = document.querySelector("#studentAverage");
const studentGradeSelect = document.querySelector("#studentGrade");
const promotedButton = document.querySelector("#promotedButton");

const snacks = ["patatine", "cioccolata", "biscotti", "caramelle"];
const aggettivi = ["potente", "oscuro", "veloce", "leggendario", "misterioso"];

const studenti = [
  { nome: "Marco", voti: [6, 7, 8] },
  { nome: "Giulia", voti: [9, 8, 10] },
  { nome: "Luca", voti: [4, 5, 6] },
  { nome: "Sara", voti: [7, 7, 6] }
];

function calcolaEtaCanina(etaUmana) {
  return etaUmana * 7;
}

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

function distributoreMerendine(snack) {
  const snackScelto = snack.toLowerCase().trim();

  if (!snacks.includes(snackScelto)) {
    return "Snack non disponibile";
  }

  const messaggi = {
    patatine: "Hai scelto le patatine: croccanti e salate.",
    cioccolata: "Hai scelto la cioccolata: pausa dolce in arrivo.",
    biscotti: "Hai scelto i biscotti: ottima scelta per la merenda.",
    caramelle: "Hai scelto le caramelle: energia zuccherata pronta."
  };

  return messaggi[snackScelto];
}

function presentaSupereroe(supereroe) {
  return `${supereroe.nome} ha ${supereroe.eta} anni e protegge ${supereroe.citta} usando il potere di ${supereroe.potere}.`;
}

function calcolaMediaStudente(studente) {
  const sommaVoti = studente.voti.reduce(function (somma, voto) {
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
  const studenteTrovato = studenti.find(function (studente) {
    return studente.nome.toLowerCase() === nomeStudente.toLowerCase().trim();
  });

  if (studenteTrovato === undefined) {
    return null;
  }

  studenteTrovato.voti.push(nuovoVoto);
  return studenteTrovato;
}

function generaNickname(nome, animale) {
  const indiceRandom = Math.floor(Math.random() * aggettivi.length);
  const aggettivoRandom = aggettivi[indiceRandom];

  return `${nome.trim()} il ${aggettivoRandom} ${animale.trim()}`;
}

function formatMedia(studente) {
  return calcolaMediaStudente(studente).toFixed(1);
}

function fillStudentSelects() {
  const options = studenti.map(function (studente) {
    return `<option value="${studente.nome}">${studente.nome}</option>`;
  }).join("");

  studentAverageSelect.innerHTML = options;
  studentGradeSelect.innerHTML = options;
}

function renderStudentBoard() {
  studentBoard.innerHTML = studenti.map(function (studente) {
    const media = calcolaMediaStudente(studente);
    const badgeClass = media >= 6 ? "badge" : "badge low";
    const label = media >= 6 ? "Promosso" : "Da aiutare";
    const voti = studente.voti.map(function (voto) {
      return `<span>${voto}</span>`;
    }).join("");

    return `
      <article class="student-tile">
        <strong>
          ${studente.nome}
          <span class="${badgeClass}">${label}</span>
        </strong>
        <div class="grades">${voti}</div>
      </article>
    `;
  }).join("");
}

dogForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const eta = Number(new FormData(dogForm).get("humanAge"));

  if (Number.isNaN(eta) || eta < 0) {
    dogResult.textContent = "Inserisci un'eta valida.";
    return;
  }

  dogResult.textContent = `${eta} anni umani valgono ${calcolaEtaCanina(eta)} anni canini.`;
});

trafficForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const colore = new FormData(trafficForm).get("trafficColor");
  trafficResult.textContent = semaforo(colore);
});

snackForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const snack = new FormData(snackForm).get("snackChoice");
  snackResult.textContent = distributoreMerendine(snack);
});

heroForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const data = new FormData(heroForm);
  const eta = Number(data.get("heroAge"));

  if (Number.isNaN(eta) || eta < 0) {
    heroResult.textContent = "Eta del supereroe non valida.";
    return;
  }

  const supereroe = {
    nome: data.get("heroName").trim(),
    potere: data.get("heroPower").trim(),
    eta: eta,
    citta: data.get("heroCity").trim()
  };

  heroResult.textContent = presentaSupereroe(supereroe);
});

averageForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const nome = new FormData(averageForm).get("studentAverage");
  const studente = studenti.find(function (item) {
    return item.nome === nome;
  });

  studentsResult.textContent = `La media di ${studente.nome} e ${formatMedia(studente)}.`;
});

addGradeForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const data = new FormData(addGradeForm);
  const nome = data.get("studentGrade");
  const voto = Number(data.get("gradeValue"));

  if (Number.isNaN(voto) || voto < 1 || voto > 10) {
    studentsResult.textContent = "Inserisci un voto da 1 a 10.";
    return;
  }

  const studente = aggiungiVoto(nome, voto);
  renderStudentBoard();
  studentsResult.textContent = `Voto ${voto} aggiunto a ${studente.nome}. Nuova media: ${formatMedia(studente)}.`;
  addGradeForm.reset();
  studentGradeSelect.value = nome;
});

promotedButton.addEventListener("click", function () {
  const promossi = studentiPromossi(studenti).map(function (studente) {
    return `${studente.nome} (${formatMedia(studente)})`;
  });

  studentsResult.textContent = `Promossi: ${promossi.join(", ")}.`;
});

nicknameForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const data = new FormData(nicknameForm);
  const nome = data.get("nickName");
  const animale = data.get("nickAnimal");

  nicknameResult.textContent = generaNickname(nome, animale);
});

fillStudentSelects();
renderStudentBoard();

