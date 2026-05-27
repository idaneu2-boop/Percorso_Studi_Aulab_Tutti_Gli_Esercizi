const averageForm = document.querySelector('[data-form="average"]');
const tableForm = document.querySelector('[data-form="table"]');
const diceForm = document.querySelector('[data-form="dice"]');
const dayForm = document.querySelector('[data-form="day"]');
const fizzBuzzForm = document.querySelector('[data-form="fizzbuzz"]');
const digitsForm = document.querySelector('[data-form="digits"]');
const equalityForm = document.querySelector('[data-form="equality"]');
const sortForm = document.querySelector('[data-form="sort"]');
const sumArraysForm = document.querySelector('[data-form="sumArrays"]');
const palindromeForm = document.querySelector('[data-form="palindrome"]');

const averageResult = document.querySelector("#averageResult");
const tableResult = document.querySelector("#tableResult");
const diceResult = document.querySelector("#diceResult");
const diceBoard = document.querySelector("#diceBoard");
const dayResult = document.querySelector("#dayResult");
const fizzBuzzResult = document.querySelector("#fizzBuzzResult");
const digitsResult = document.querySelector("#digitsResult");
const equalityResult = document.querySelector("#equalityResult");
const phraseResult = document.querySelector("#phraseResult");
const phraseButton = document.querySelector("#phraseButton");
const sortResult = document.querySelector("#sortResult");
const sumArraysResult = document.querySelector("#sumArraysResult");
const palindromeResult = document.querySelector("#palindromeResult");

function parseNumbers(value) {
  return value.split(",").map(function (item) {
    return Number(item.trim());
  });
}

function hasInvalidNumber(numbers) {
  return numbers.some(function (number) {
    return Number.isNaN(number);
  });
}

function calcolaSommaMedia(numbers) {
  const somma = numbers.reduce(function (totale, numero) {
    return totale + numero;
  }, 0);

  return {
    somma: somma,
    media: somma / numbers.length
  };
}

function generaTabellina(numero) {
  const righe = [];

  for (let i = 1; i <= 10; i++) {
    righe.push(`${numero} x ${i} = ${numero * i}`);
  }

  return righe.join("\n");
}

function tiraDado() {
  return Math.floor(Math.random() * 6) + 1;
}

function giocaDadi(tiri) {
  const giocatore1 = [];
  const giocatore2 = [];

  for (let i = 0; i < tiri; i++) {
    giocatore1.push(tiraDado());
    giocatore2.push(tiraDado());
  }

  const totale1 = giocatore1.reduce((somma, tiro) => somma + tiro, 0);
  const totale2 = giocatore2.reduce((somma, tiro) => somma + tiro, 0);
  let vincitore = "Pareggio";

  if (totale1 > totale2) {
    vincitore = "Ha vinto il Giocatore 1";
  } else if (totale2 > totale1) {
    vincitore = "Ha vinto il Giocatore 2";
  }

  return { totale1, totale2, vincitore };
}

function scegliGiorno(numero) {
  const giorni = ["lunedi", "martedi", "mercoledi", "giovedi", "venerdi", "sabato", "domenica"];
  return giorni[numero - 1] || "Errore! Giorno della settimana non valido.";
}

function creaFizzBuzz(limite) {
  const numeri = [];

  for (let i = 1; i <= limite; i++) {
    if (i % 15 === 0) {
      numeri.push("fizzBuzz");
    } else if (i % 3 === 0) {
      numeri.push("Fizz");
    } else if (i % 5 === 0) {
      numeri.push("Buzz");
    } else {
      numeri.push(String(i));
    }
  }

  return numeri.join(", ");
}

function contaCifre(numero) {
  return String(Math.abs(numero)).length;
}

function convertValue(value, type) {
  if (type === "number") {
    return Number(value);
  }

  return value;
}

function ricostruisciFrase() {
  const array1 = [["un", "per", "incatenarli."], ["Anello", "trovarli,"], ["ghermirli", "e"], ["gondor", "mark"]];
  const array2 = [[[ "trovarli," ]], ["tu,", "sciocchi"], ["tu,", "sciocchi", ["padron", "Sauron"]], ["nel", ["fuggite", "gandalf"]], [["domarli,", "passare"], "buio"]];

  const parole = [
    array1[0][0],
    array1[1][0],
    array1[0][1],
    array2[4][0][0],
    array1[0][0],
    array1[1][0],
    array1[0][1],
    array1[1][1],
    array1[0][0],
    array1[1][0],
    array1[0][1],
    array1[2][0],
    array1[2][1],
    array2[3][0],
    array2[4][1],
    array1[0][2]
  ];

  return parole.join(" ").replace(/^un/, "Un");
}

function ordinaNumeri(numbers, direction) {
  return numbers.slice().sort(function (a, b) {
    return direction === "asc" ? a - b : b - a;
  });
}

function sommaArray(arrayOne, arrayTwo) {
  return arrayOne.map(function (number, index) {
    return number + arrayTwo[index];
  });
}

function isPalindroma(frase) {
  const pulita = frase.replace(/\W/g, "").toLowerCase();
  const invertita = pulita.split("").reverse().join("");
  return pulita === invertita;
}

averageForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const numbers = parseNumbers(new FormData(averageForm).get("averageInput"));

  if (numbers.length !== 5 || hasInvalidNumber(numbers)) {
    averageResult.textContent = "Inserisci esattamente 5 numeri validi separati da virgola.";
    return;
  }

  const result = calcolaSommaMedia(numbers);
  averageResult.textContent = `La somma equivale a ${result.somma} e la media equivale a ${result.media.toFixed(2)}.`;
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

diceForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const tiri = Number(new FormData(diceForm).get("diceRounds"));

  if (Number.isNaN(tiri) || tiri < 1 || tiri > 20) {
    diceResult.textContent = "Inserisci un numero di tiri tra 1 e 20.";
    return;
  }

  const result = giocaDadi(tiri);
  const scores = diceBoard.querySelectorAll("span");
  scores[0].textContent = result.totale1;
  scores[1].textContent = result.totale2;
  diceResult.textContent = `${result.vincitore}. Tiri effettuati: ${tiri}.`;
});

dayForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const numero = Number(new FormData(dayForm).get("dayInput"));
  dayResult.textContent = scegliGiorno(numero);
});

fizzBuzzForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const limite = Number(new FormData(fizzBuzzForm).get("fizzBuzzInput"));

  if (Number.isNaN(limite) || limite < 1 || limite > 100) {
    fizzBuzzResult.textContent = "Inserisci un limite tra 1 e 100.";
    return;
  }

  fizzBuzzResult.textContent = creaFizzBuzz(limite);
});

digitsForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const numero = Number(new FormData(digitsForm).get("digitsInput"));

  if (Number.isNaN(numero) || numero < 0 || numero > 9999) {
    digitsResult.textContent = "Inserisci un numero intero tra 0 e 9999.";
    return;
  }

  digitsResult.textContent = `${numero} e formato da ${contaCifre(numero)} cifre.`;
});

equalityForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const data = new FormData(equalityForm);
  const valueA = convertValue(data.get("valueA"), data.get("typeA"));
  const valueB = convertValue(data.get("valueB"), data.get("typeB"));

  equalityResult.textContent = valueA === valueB ? "TRUE: i valori sono identici." : "FALSE: i valori non sono identici.";
});

phraseButton.addEventListener("click", function () {
  phraseResult.textContent = ricostruisciFrase();
});

sortForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const data = new FormData(sortForm);
  const numbers = parseNumbers(data.get("sortInput"));

  if (hasInvalidNumber(numbers)) {
    sortResult.textContent = "Inserisci solo numeri separati da virgola.";
    return;
  }

  sortResult.textContent = `[${ordinaNumeri(numbers, data.get("sortDirection")).join(", ")}]`;
});

sumArraysForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const data = new FormData(sumArraysForm);
  const arrayOne = parseNumbers(data.get("arrayOne"));
  const arrayTwo = parseNumbers(data.get("arrayTwo"));

  if (hasInvalidNumber(arrayOne) || hasInvalidNumber(arrayTwo) || arrayOne.length !== arrayTwo.length) {
    sumArraysResult.textContent = "Inserisci due array numerici della stessa lunghezza.";
    return;
  }

  sumArraysResult.textContent = `[${sommaArray(arrayOne, arrayTwo).join(", ")}]`;
});

palindromeForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const frase = new FormData(palindromeForm).get("palindromeInput");
  palindromeResult.textContent = isPalindroma(frase) ? "TRUE: la frase e palindroma." : "FALSE: la frase non e palindroma.";
});
