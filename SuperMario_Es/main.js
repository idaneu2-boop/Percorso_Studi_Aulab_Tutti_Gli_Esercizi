// Partendo da questa struttura, creare un programma che simuli il gioco di super Mario Bros.
const gameButton = document.getElementById('playButton');
gameButton.addEventListener('click' , playz);
const musica = document.getElementById('musica');

musica.addEventListener('timeupdate', function () {
  if (!musica.paused && musica.duration && musica.duration - musica.currentTime < 0.35) {
    musica.currentTime = 0;
    musica.play();
  }
});

function playz() {
  nascondereCard();
  
    let startGame = prompt(`Sei pronto a iniziare la partita? \n (1) Inizia partita \n (2) Esci dal gioco `);
  
  let counter = 0;
  counter++;
  
  while (startGame != `1` && startGame != `2` && counter < 5) {
    startGame = prompt(`Sei pronto a iniziare la partita? \n (1) Inizia partita \n (2) Esci dal gioco `);
    counter++;
  }
  
  if (startGame === `1`) {
    alert(`Si parte!`);
    let victory = 0;
    let attempts = 0;
    let gameOver = false;
    let gameWin = false;
    while (!gameOver && attempts < 5 && !gameWin && victory < 5){
      let enemy = prompt(`Attento c'e' un nemico! Premi: \n (1) Salta e corri \n (2) Salta sopra al nemico ed eliminalo \n (3) Saluta Mario`);
      switch (enemy) {
        case `1`:
        alert(`C'e' mancato poco! Sei riuscito a schivare il nemico!`);
        break;
        case `2`:
        alert(`Wow! Bravissimo! L'hai superato! Continua cosi'!`);
        break;
        case `3`:
        victory++;
        alert(`Avanti tutta! \n Obiettivi rimasti: ${5 - victory}`);
        
        if (victory == 5) {alert(`Hai completato la missione!`)
          gameWin = true;
          vincere();
          break;
        }
        break;
        default:
        attempts++;
        if (attempts < 5){
          alert(`Colpito! \n Tentativi rimasti: ${5 - attempts}`)
        }else{
          alert(`Peccato, sei stato troppo lento... GAME OVER!`);
          gameOver = true;
          perdere(); }
          break;
        }
      }
    } else if(counter >= 5) {
      alert(`Hai superato il numero massimo di tentativi. Riprova con più calma.`);
    } else {
      alert(`Partita annullata. Alla prossima!`);
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
  
