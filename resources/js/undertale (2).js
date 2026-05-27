// Es.1

// let v = Number(prompt(`Inserisci un numero per verificare la fascia d'età`));

// if(v >= 0 && v < 18){
//     console.log(`Sei minorenne`);
// }else if(v >= 18 && v <= 21){
//     console.log(`Nuovo adulto`);
// }else if(v >= 22 && v <= 24){
//     console.log(`Fascia giovane adulta`);
// }else if(v >=25 && v <= 27){
//     console.log(`Fascia adulta`);
// }else if(v >=28 && v <=29){
//     console.log(`Fascia avanzata`);
// }else if(v == 30){
//     console.log(`Valore massimo raggiunto`);
// }else{console.log(`Valore non valido`);
// }

// Es.2

// let c = Number(prompt(`Inserisci la temperatura attuale in gradi C.`));

// if(c >= 0 && c <= 19){
//     console.log(`non ci sono più le mezze stagioni`);   
// }else if(c >= 30){
//     console.log(`lu mare, lu sule e lu ientu`);
// }else if(c <= 29 && c >= 20){
//     console.log(`se semo presi ncalippo e na bira`);  
// }else if(c <= -1 && c >= -10){
//     console.log(`sciarpina contro il freddo`);
// }else if(c <= -11){
//     console.log(`Fa davvero molto freddo`);
// }else{console.log(`Temperatura non valida`);
// }

// Es.3

// let tabellina = Number(prompt(`Inserisci il numero che verrà moltiplicato per 2`))
// console.log(tabellina);

// for(let i = 2; i <= 10; i++){
//     console.log(i * tabellina);
// }

// Es.4
// let e = 0;

// let totale = 0;

// for(let i = 1; i <= 20; i++){
//     if(i % 2 == 0){
//        console.log(i);
//     }else{
//         totale ++;
//         e = e + i;
//     }}
//     let mediadis = e / totale;
//     console.log(`Numeri dispari in totale ${totale}`);
//     console.log(`Media dei numeri dispari ${mediadis}`);

// Es.5

// while(true) {
// let bevande = Number(prompt(`Inserisci una moneta e scegli una bevanda! \n Scegli tra: \n - 1 \n - 2 \n - 3 `));

// switch (bevande){
//     case 1:
//         alert(`E' stata selezionata l’acqua`);
//         break;
//     case 2:
//         alert(`E' stata selezionata coca cola`);
//         break;
//     case 3:
//         alert(`E' stata selezionata birra`);
//         break;
//     default:
//         console.log("Scelta non valida, riprova.");
//         continue;
// }
// break;
// }

// Es.6

// let N = 5;

// let punteggioGiocatore1 = 0;
// let punteggioGiocatore2 = 0;

// let min = 1;
// let max = 6;

// for (let i = 0; i < N; i++) {
//     let tiro = Math.floor(Math.random() * (max - min + 1) + min);
//     console.log("Giocatore 1 ha tirato:", tiro);
//     punteggioGiocatore1 += tiro;
// }

// for (let i = 0; i < N; i++) {
//     let tiro = Math.floor(Math.random() * (max - min + 1) + min);
//     console.log("Giocatore 2 ha tirato:", tiro);
//     punteggioGiocatore2 += tiro;
// }

// console.log("Punteggio finale Giocatore 1:", punteggioGiocatore1);
// console.log("Punteggio finale Giocatore 2:", punteggioGiocatore2);

// if (punteggioGiocatore1 > punteggioGiocatore2) {
//     console.log("Ha vinto il Giocatore 1!");
// } else if (punteggioGiocatore2 > punteggioGiocatore1) {
//     console.log("Ha vinto il Giocatore 2!");
// } else {
//     console.log("Pareggio!");
// }
