// Partendo da questa struttura, creare un programma che simuli il gioco di super Mario Bros.
const GIOCOSUPERDUCE = document.getElementById('playButton');
GIOCOSUPERDUCE.addEventListener('click' , playz);
const musica = document.getElementById('musica');

musica.addEventListener('timeupdate', function () {
  if (!musica.paused && musica.duration && musica.duration - musica.currentTime < 0.35) {
    musica.currentTime = 0;
    musica.play();
  }
});

function playz() {
  nascondereCard();
  
  let startGame = prompt(`Camerato è pronto a servire la patria?! \n (1) Inizia partita \n (2) Esci dal gioco `);
  
  let counter = 0;
  counter++;
  
  while (startGame != `1` && startGame != `2` && counter < 5) {
    startGame = prompt(`Camerato è pronto a servire la patria?! \n (1) Inizia partita \n (2) Esci dal gioco `);
    counter++;
  }
  
  if (startGame === `1`) {
    alert(`Vincere e Vinceremo!`);
    let victory = 0;
    let attempts = 0;
    let gameOver = false;
    let gameWin = false;
    while (!gameOver && attempts < 5 && !gameWin && victory < 5){
      let enemy = prompt(`Attento c'e' un nemico! Premi: \n (1) Salta e corri \n (2) Salta sopra al nemico ed eliminalo \n (3) Saluta il Duce`);
      switch (enemy) {
        case `1`:
        alert(`C'e' mancato poco! Sei riuscito a schivare il pisello!`);
        break;
        case `2`:
        alert(`Wow! Bravissimo! L'hai scappellato! Continua cosi'!`);
        break;
        case `3`:
        victory++;
        alert(`Uomini di Terra, di Mare e di Aria avanzate! \n Conquista di Africonia: ${5 - victory}`);
        
        if (victory == 5) {alert(`I Fascisti sono arrivati su Marte!`)
          gameWin = true;
          vincere();
          break;
        }
        break;
        default:
        attempts++;
        if (attempts < 5){
          alert(`Hai preso il cazzo nel culo! \n Tentativi rimasti prima delle emorroidi: ${5 - attempts}`)
        }else{
          alert(`Peccato sei stato troppo lento...ti è esploso l'ano... GAME OVER!`);
          gameOver = true;
          perdere(); }
          break;
        }
      }
    } else if(counter >= 5) {
      alert(`Ti hanno sparato alle mani? O ti ammazzi di seghe tutti i giorni? Riprova quando ti sarà passato il Parkinson`);
    } else {
      alert(`Fottutissimo comunista fucilatelo sul posto!`);
    } 
  }
  
  function vincere() {
    const VINCEREEVINCEREMO = document.getElementById("cardvictory");
    VINCEREEVINCEREMO.classList.add("win-card-show");
  }
  
  function perdere() {
    const GAMEOVER = document.getElementById("cardgameover");
    GAMEOVER.classList.add("win-card-show");
  }
  
  function nascondereCard() {
    const VINCEREEVINCEREMO = document.getElementById("cardvictory");
    const GAMEOVER = document.getElementById("cardgameover");
    VINCEREEVINCEREMO.classList.remove("win-card-show");
    GAMEOVER.classList.remove("win-card-show");
  }
  
