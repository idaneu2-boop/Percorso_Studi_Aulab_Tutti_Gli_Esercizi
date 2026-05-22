// Es-1
// Crea 5 variabili contenenti un numero e scrivi un programma in modo da ottenere la somma tra questi numeri e la media.
// In console poi mostra la seguente frase: ‘La somma tra i numeri equivale a … e la media equivale a…’
console.log(`ESERCIZIO 1`)
let numero1 = 1;
let numero2 = 2;
let numero3 = 3;
let numero4 = 4;
let numero5 = 5;
function media(numero1, numero2, numero3, numero4, numero5) {
    let s = numero1 + numero2 + numero3 + numero4 + numero5;
    let m = s / 5;
    console.log(`La media e' ${m}`);
}
media(numero1, numero2, numero3, numero4, numero5);
console.log(`ESERCIZIO 2`)
// Es-2
// Scrivi un programma che dato un numero, 
// let num = 2
// stampi la rispettiva tabellina corrispondente.
let numericazzo = 2;
function tabelozza(numericazzo) {
    for (let p = 1; p <= 10; p++) {
        console.log(numericazzo * p);
    }
}
tabelozza(numericazzo)
console.log(`ESERCIZIO 3`);
// Es-3
// Scrivi un programma che, dato il numero (N) dei tiri da effettuare per ciascun giocatore, simuli un gioco di dadi tra due utenti, stampando il giocatore che ha totalizzato più punti. Supponendo che ogni dado abbia al massimo 6 facce, ogni giocatore tirerà il dado N volte, ciò significa che verrà generato un numero casuale ad ogni tiro che sarà sommato ai precedenti per calcolare il punteggio del giocatore 
// Usiamo questa formula per generare un numero random Math.floor(Math.random() * (max - min + 1) + min);
let N = 5;
let min = 1;
let max = 6;
function tiraDado(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}
function generaTiri(numeroTiri, min, max) {
    let tiri = [];
    for (let i = 0; i < numeroTiri; i++) {
        tiri.push(tiraDado(min, max));
    }
    return tiri;
}
function sommaTiri(tiri) {
    let somma = 0;
    for (let i = 0; i < tiri.length; i++) {
        somma += tiri[i];
    }
    return somma;
}
function mostraTiri(nomeGiocatore, tiri) {
    for (let i = 0; i < tiri.length; i++) {
        console.log(`${nomeGiocatore} tiro ${i + 1}: ${tiri[i]}`);
    }
}
function dichiaraVincitore(punteggioGiocatore1, punteggioGiocatore2) {
    if (punteggioGiocatore1 > punteggioGiocatore2) {
        console.log(`Ha vinto il Giocatore 1!`);
    } else if (punteggioGiocatore2 > punteggioGiocatore1) {
        console.log(`Ha vinto il Giocatore 2!`);
    } else {
        console.log(`Pareggio!`);
    }
}
let tiriGiocatore1 = generaTiri(N, min, max);
let tiriGiocatore2 = generaTiri(N, min, max);
let punteggioGiocatore1 = sommaTiri(tiriGiocatore1);
let punteggioGiocatore2 = sommaTiri(tiriGiocatore2);
mostraTiri(`Giocatore 1`, tiriGiocatore1);
mostraTiri(`Giocatore 2`, tiriGiocatore2);
console.log(`Punteggio finale Giocatore 1:`, punteggioGiocatore1);
console.log(`Punteggio finale Giocatore 2:`, punteggioGiocatore2);
dichiaraVincitore(punteggioGiocatore1, punteggioGiocatore2);
console.log(`ESERCIZIO 4`);
// Es-4
// Prova a farlo prima senza funzione e poi con la funzione
// Scrivi un programma che, dato un numero intero compreso tra 1 a 7
// visualizzi il corrispondente giorno della settimana. Sapendo che:
// 1 = lunedì
// 2 = martedì
// 3 = mercoledì
// ...
// 7 = domenica
// Esempi:
// Input: numero = 6
// Output: "Sabato"
// Input: numero = 10
// Output: “Errore! Giorno della settimana non valido!"
let numero = 6;
switch (numero) {
    case 1:
        console.log("Lunedì");
        break;
    case 2:
        console.log("Martedì");
        break;
    case 3:
        console.log("Mercoledì");
        break;
    case 4:
        console.log("Giovedì");
        break;
    case 5:
        console.log("Venerdì");
        break;
    case 6:
        console.log("Sabato");
        break;
    case 7:
        console.log("Domenica");
        break;
    default:
        console.log("Errore! Giorno della settimana non valido!");
}
// con funzione
let s = Number(prompt(`Inserisci un numero e io ti diro a quale giorno della settimana corrisponde`));
function scegliGiorno(s) {
    let giorni = [
        `lunedi`,
        `martedi`,
        `mercoledi`,
        `giovedi`,
        `venerdi`,
        `sabato`,
        `domenica`
    ];
    if (s >= 1 && s <= 7) {
        alert(`Hai selezionato ${s} è ${giorni[s - 1]}`);
    } else {
        alert(`Hai selezionato un numero sbagliato o una lettera. Riprova!`);
    }
}
scegliGiorno(s);
console.log(`ESERCIZIO 5`)
// Es-5
// Scrivi una funzione che permetta di stampare in console tutti i numeri da 1 a N: 
// N dovra’ rappresentare il parametro formale della funzione.
// Tutti i numeri multipli di 3 saranno sostituiti dalla stringa 'Fizz' 
// Tutti i numeri multipli di 5 saranno sostituiti dalla stringa 'Buzz'
// Tutti i numeri multipli di 15 saranno sostituiti dalla stringa 'fizzBuzz'
function creaFizzBuzz(N) {
    let numeri = [];
    for (let i = 1; i <= N; i++) {
        if (i % 15 === 0) {
            numeri.push(`fizzBuzz`);
        } else if (i % 3 === 0) {
            numeri.push(`Fizz`);
        } else if (i % 5 === 0) {
            numeri.push(`Buzz`);
        } else {
            numeri.push(i);
        }
    }
    return numeri;
}
function stampaArray(array) {
    for (let i = 0; i < array.length; i++) {
        console.log(array[i]);
    }
}
let risultatoFizzBuzz = creaFizzBuzz(30);
stampaArray(risultatoFizzBuzz);
console.log(`ESERCIZIO 6`);
// Es-6
// Scrivi una funzione che dato un numero intero (massimo 9999) conti da quante cifre è formato.
// Esempio: Input : 9 → output: 1 cifra Input : 99 → output: 2 cifre 
// HINT: le stringhe hanno la proprietà .length che conta da quante cifre é composta (vedi dalla documentazione)
function massimoDalema(n) {
   return String(n);
}
let n= massimoDalema(999);
console.log(n.length);
console.log(`ESERCIZIO 7`)
// Es-7
// Scrivi una funzione di uguaglianza che prenda in input due argomenti e restituisca TRUE se i due argomenti sono IDENTICI,
// FALSE altrimenti.
// Esempi:func
// Input: n = 2, m = 3
// Output: FALSE
// input: n = 2, m = '2'
// Output: FALSE
// Input: n = 2, m = 2
// Output: TRUE
function alfonso(n1,n2) {
    if(n1===n2){
        return `True`
    }else {
      return `False`
    }
}
console.log(alfonso(2,`2`));
console.log(alfonso(2,3));
console.log(alfonso(2,2));
console.log(`ESERCIZIO 8`);
// Es-8
// Dati i seguenti array mischiati e confusi:
// let array_1 =[ ['un', 'per', 'incatenarli.'], ['Anello', 'trovarli,'], ['ghermirli', 'e'], ['gondor', 'mark'], ];
// let array_2 = [ [['trovarli,']], ['tu,', 'sciocchi'], ['tu,', 'sciocchi', ['padron', 'Sauron']], ['nel', ['fuggite', 'gandalf']], [['domarli,', 'passare'], 'buio'] ];
// Stampa a schermo la frase: "Un Anello per domarli, un Anello per trovarli, un Anello per ghermirli e nel buio incatenarli.“
// HINT Non tutte le parole sono necessarie per la frase; Occhio agli array annidati
let array_1 =[ ['un', 'per', 'incatenarli.'], ['Anello', 'trovarli,'], ['ghermirli', 'e'], ['gondor', 'mark'], ];
let array_2 = [ [['trovarli,']], ['tu,', 'sciocchi'], ['tu,', 'sciocchi', ['padron', 'Sauron']], ['nel', ['fuggite', 'gandalf']], [['domarli,', 'passare'], 'buio'] ];
   let samvise = [array_1[0][0],array_1[1][0],array_1[0][1],array_2[4][0][0],array_1[0][0],array_1[1][0],array_1[0][1],array_1[1][1],array_1[0][0],array_1[1][0],array_1[0][1],array_1[2][0],array_1[2][1],array_2[3][0],array_2[4][1],
    array_1[0][2]
]; 
console.log(...samvise);
console.log(`ESERCIZIO 9`);
// Es-9
// Scrivi un programma che dato un array di 10 numeri interi ordinati in modo casuale li riordini in modo decrescente.
// Esempio: Input: array = [3, 7, -2, 5, 8, 1, 2, 5, 6, -4] Output: [8, 7, 6, 5, 3, 2, 1, -2, -4] Variante: Prova ad ordinali in modo crescente.
let pippobaudo = [1,5,3,9,12,34,2,90,76,900]
pippobaudo.sort(function ordineCrescente(a,b) {
return a-b})
console.log(pippobaudo);
 pippobaudo.sort(function ordineDeCrescente(a,b) {
return b-a})
 console.log(pippobaudo);
 console.log(`ESERCIZIO 10`);
//  Es-10
// Scrivere un programma che permetta di ottenere un nuovo array che abbia come valori i numeri del primo array sommati con i valori del secondo array: let numbers1 = [10, 20, 30]; let numbers2 = [40, 50, 60]; dovra’ restituire come risultato, let newArray = [50, 70, 90]
let desica = [10, 20, 30]; 
let boldi = [40, 50, 60]; 
let enzosalvi = [];
for (let i = 0; i < desica.length; i++) {
    enzosalvi.push(desica[i] + boldi[i]);
}
console.log(enzosalvi);
console.log(`ESERCIZIO 11`);
// Es-11
// Scrivi una funzione che prenda in input una stringa e restituisca TRUE se è palindroma, FALSE se non lo è. Primo step: eliminare gli spazi e i segni di punteggiatura:
// HINT Puoi eliminare spazi e segni di punteggiatura usando → str.replace(/\W/g, "") Esempio: Input: “i topi non avevano nipoti” 
let napoletani = `I topi non avevano nipoti`;
function notaio() {
    let pugliesi = napoletani.replace(/\W/g, "").toLowerCase();
    let calabresi = pugliesi.split("").reverse().join("");
    if (pugliesi == calabresi) {
    console.log(true);
    } else {
    console.log(false);
    }
}
notaio();