// Esercizi Mattutini
// FACILI
// 1. Scrivere un programma che, partendo da un array di numeri, mi restituisca un nuovo array con i numeri aumentati di 1
let asort = [1, 2, 3, 4, 5];
let somm = asort.map((numeri, i)=> numeri + 1);
console.log(somm);
// 2. Scrivere un programma che, partendo da un array di numeri, mi restituisca un nuovo arrat che abbia soltanto numeri maggiori di 5
let niummeri = [2, 3, 6, 1, 10];
let sium = niummeri.filter((numeri, i)=> numeri > 5);
console.log(sium);
// 3. Scrivere un programma che mi permetta di stampare tutti gli elementi contenuti negli array restituiti dagli esercizi precedenti
let nuov = sium.concat(somm);
console.log(nuov);
// 4. Scrivere un programma che mi permetta di sapere qual è il numero più piccolo all'interno di un array di numeri
let picc = niummeri.find((numeri, i)=> numeri<= 1 );
console.log(picc);
// MEDI
// 1. Scrivere una funzione che prenda in ingresso un array di elementi di qualsiasi tipo e mi restituisca un array che contenga soltanto le stringhe dell'array originale
let como = ["ciao", 2, "come", 6, "stai?", 3];
let parole = como.filter((elemento)=> typeof elemento === "string");
console.log(...parole);
// 2. Scrivere una funzione che prenda in ingresso un array di numeri ed un numero e mi restituisca un nuovo array i cui elementi siano gli stessi dell'array iniziale moltiplicati per il numero passato
let altrinumeri = [5, 7, 9, 2, 5]
let altron = 7
let molt = altrinumeri.map((elemento,i)=> elemento * altron);
console.log(molt)
// 3. Scrivere una funzione che prenda in ingresso un qualsiasi numero di parametri numerici e mi restituisca un array in cui quegli stessi parametri siano raddoppiati.
let altr = altrinumeri.map((elemento,i)=> elemento * 2);
console.log(altr)
// 4. Scrivere una funzione che prenda in ingresso un qualsiasi numero di parametri numerici e mi restituisca la loro media.
let summa = altrinumeri.reduce((acc, elemento)=> acc + elemento, 0);
let med = summa / altrinumeri.length;
console.log(med)
// DIFFICILI
// 1. Scrivere una funzione che prenda in ingresso due array ed una stringa. Il valore della stringa dovrà essere uno tra questi:
// 'somma'
// 'sottrazione'
// 'moltiplicazione'
// 'divisione'
// La funzione dovrà restituire un nuovo array i cui valori siano quelli dei due array mandati come parametri a cui sia applicata l'operazione indicata tra gli elementi con lo stesso indice.
// Es. input= [1,2,3], [4,5,6], 'somma'      output= [5,7,9]
const ditoinculo = (operazione, ...gliarray) =>{
    let [array1, array2] = gliarray;
    console.log(operazione);
    return array1.map((num, i) => {
        if (operazione === "somma") {
        return num + array2[i];
        }
    });
};
console.log( ditoinculo("somma", [1,2,3], [4,5,6]));
// Es.Giornalieri
// FACILI
// Traccia 1:
// Scrivere un programma che dato un array contenente dati di qualsiasi tipo, per ogni elemento stampi in console il suo tipo di dato.
let varidatti = [10, "bella regà", true, undefined, null];
let tipidati = varidatti.map((elemento, i)=> typeof elemento);
console.log(tipidati);
// Traccia 2:
// Scrivere un programma che dato un array restituisca un nuovo array con soltanto gli elementi che abbiano indice minore di 3
let mundus = [10, 20, 30, 40, 50];
let manus = mundus.filter((elemento, i)=> i < 3);
console.log(manus);
// Traccia 3:
// Scrivere un programma che dato un array restituisca un nuovo array i cui elementi con indice pari siano sostituiti dalla stringa 'Pari' mentre quelli con indice dispari siano sostituiti dalle stringa 'Dispari'
let fortissax = mundus.map((elemento, i)=> i % 2 == 0 ? "Dispari" : "Pari");
console.log(...fortissax);
// MEDI
// Traccia 4:
// Scrivere una funzione che prenda in ingresso un array di numeri e restituisca un nuovo array che abbia gli elementi invertiti di posizione e raddoppiati
let gwyn = mundus.reverse().map((numeri)=> numeri * 2);
console.log(gwyn);
// Traccia 5:
// Scrivere una funzione che prenda in ingresso un qualsiasi numero di parametri e restituisca un array che contenga soltanto i dati passati di tipo numerico
let varie = [72, "mr. president", 69, "they've hit", 911, "the second tower"];
let scritta = varie.filter((elemento, indice)=> typeof elemento === "string");
console.log(...scritta);
// Traccia 6:
// Scrivere una funzione che prenda in ingresso due array e restituisca l'array che contiene più elementi, in caso in cui gli array contengano lo stesso numero di elementi dovrà restituire la stringa 'Questi array contengono lo stesso numero di elementi'
function piselloPiugrande(array1, array2) {
    if (array1.length > array2.length) {
    return array1;
    } 
    else if (array2.length > array1.length) {
    return array2;
    }
    else {
    return "Questi array hanno il pisello lungo uguale";
    }
}
console.log(piselloPiugrande([1, 2, 3], [4, 5]));
console.log(piselloPiugrande([1], [2, 3, 4]));
console.log(piselloPiugrande([1, 2], ["a", "b"]));
// DIFFICILI
// Traccia 7:
// Scrivere una funzione che prenda in ingresso due array contenenti numeri. Questa funzione dovrà restituire un nuovo array che contenga 2 elementi. Il primo elemento dovrà essere la somma dei numeri del primo array mentre il secondo elemento dovrà essere la somma dei numeri del secondo array.
let naruto = [80, 13, 99];
let sasuke = [25, 74, 33];
let somma1 = naruto.reduce((acc, numero)=> acc + numero, 0);
let somma2 = sasuke.reduce((acc, numero)=> acc + numero, 0);
let sakura = somma1 + somma2;
console.log(sakura);
// Traccia 8:
// Scrivere una funzione che prenda in ingresso un array. Questa funzione dovrà restituire la media degli elementi numerici dell'array passato (l'array può potenzialmente contenere anche elementi non numerici)
let goku = [4, "mi scopo junior", 20, "Z", 7, "Dragon Ball GT siamo tutti qui"]
let junior = goku.filter((elemento)=> typeof elemento === "number");
let chichi = junior.reduce((acc, numero)=>acc + numero, 0);
let gohan = chichi / junior.length;
console.log(gohan);
// Traccia 9:
// Scrivere una funzione che prenda in funzione due array numeri. Questa funzione dovrà restituire un nuovo array con tutti i numeri presenti in entrambi gli array, ordinati in maniera crescente e raddoppiati (rivedete anche i metodi visti nella scorsa lezione)
// Primo modo function
function gandalf(array1, array2) {
    return array1.concat(array2).sort((a, b) => a - b)
    .map(numero => numero * 2);
}
let frodo = gandalf([4, 1, 7], [2, 9, 3]);
console.log(frodo);
// Secondo modo concatenazione+function array
let gatsu = [4, 1, 7];
let griffith = [2, 9, 3];
let caska = gatsu.concat(griffith).sort((a, b)=> a - b).map((numeri)=> numeri *2);
console.log(caska);