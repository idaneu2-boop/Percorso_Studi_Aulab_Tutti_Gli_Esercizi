<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test-comandi</title>
  <link rel="shortcut icon" href="/media/logo-test-comandi.png" type="image/png">
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      display: grid;
      place-items: center;
      font-family: Arial, sans-serif;
      color: #171717;
      background: #f6f7f8;
    }

    main {
      width: min(680px, calc(100% - 32px));
      padding: 32px;
      border: 1px solid #e6e6e6;
      border-radius: 8px;
      background: #ffffff;
    }

    a {
      color: #e30613;
      font-weight: 700;
    }

    .exercise-home-link {
      display: inline-flex;
      padding: 10px 14px;
      border: 1px solid #30363d;
      border-radius: 6px;
      background: #171717;
      color: #f6f7f8;
      font-family: Consolas, "Courier New", monospace;
      text-decoration: none;
      box-shadow: 0 4px 0 #e30613;
    }

    .mini-terminal {
      margin-top: 24px;
      border: 1px solid #30363d;
      border-radius: 6px;
      overflow: hidden;
      background: #171717;
      color: #f6f7f8;
      font-family: Consolas, "Courier New", monospace;
      box-shadow: 0 4px 0 #e30613;
    }

    .terminal-bar {
      display: flex;
      gap: 6px;
      padding: 10px 12px;
      border-bottom: 1px solid #30363d;
      background: #22272e;
    }

    .terminal-bar span {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #e30613;
    }

    .terminal-bar span:nth-child(2) {
      background: #f2c94c;
    }

    .terminal-bar span:nth-child(3) {
      background: #27ae60;
    }

    .terminal-body {
      padding: 18px;
      font-size: 18px;
      font-weight: 700;
    }

    .terminal-body::before {
      content: "> ";
      color: #e30613;
    }
  </style>
  <x-fluid-assets target="head" />
</head>
<body>
  <main>
    <a class="exercise-home-link" href="home.html">cd ../home</a>
    <h1>test-comandi</h1>
    <p>Pagina creata per collegare questa cartella alla home degli esercizi.</p>
    <section class="mini-terminal" aria-label="Terminale">
      <div class="terminal-bar" aria-hidden="true">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="terminal-body">Il primo passo.</div>
      <div>-Riguardare la lezione, per ricordare meglio i comandi.</div>
      <div>-Riguardare la parte finale della lezione dove spiego come consegnare gli esercizi (questo ci servir&agrave; da domani). Esercitarsi con la console.</div>
      <div>Installare GitBash (solo per Windows): trovate il link per scaricarlo allegato alla lezione di ieri. Usare il terminale pre-installato per Mac o Linux.</div>
      <div>Seguite le istruzioni indicate e cercate di associare i comandi richiesti, studiati durante la lezione di ieri.</div>
      <div>-Aprire il terminale e assicurarsi di essere nella tilde ~.</div>
      <div>-Creare la cartella "wa" e spostarsi al suo interno.</div>
      <div>-Creare una cartella all'interno di wa e chiamarla "test-comandi".</div>
      <div>-Entrare nella cartella appena creata.</div>
      <div>-Nella cartella "test-comandi" creare un file chiamato "ciao.txt".</div>
      <div>-Scrivere nel file appena creato, tramite vim, e salvare.</div>
      <div>-Vedere il contenuto del file da console.</div>
      <div>-Rimanendo nella cartella corrente "test-comandi", creare tre cartelle:</div>
      <div>"musica"</div>
      <div>"immagini"</div>
      <div>"testi"</div>
      <div>-Spostare il file "ciao.txt" nella cartella "testi".</div>
      <div>-Rimanendo nella cartella corrente "test-comandi", creare un nuovo file chiamato "brani.txt".</div>
      <div>-Copiare il file "brani.txt" nella cartella "musica", rimanendo nella cartella corrente.</div>
      <div>-Spostarsi nella cartella "musica" e vedere il contenuto della cartella, accertandosi della presenza del file appena copiato.</div>
      <div>-Rimanendo nella cartella "musica", eliminare il file "brani.txt" presente nella cartella padre "test-comandi".</div>
      <div>-Tornare indietro nella cartella "test-comandi".</div>
      <div>-Nella cartella "test-comandi", creare una nuova cartella di nome "logs".</div>
      <div>-Entrare nella cartella "logs".</div>
      <div>-Creare 2 cartelle: "browser" e "server".</div>
      <div>-Nella cartella "logs", creare un file chiamato "logs.txt".</div>
      <div>-Copiare contemporaneamente il file "logs.txt" nelle cartelle "browser" e "server" con un solo comando.</div>
      <div>Suggerimento: cp nome_file destinazione && cp nome_file destinazione</div>
      <div>-Accertarsi che nelle cartelle "browser" e "server" ci sia il file "logs.txt".</div>
      <div>-Tornare nella cartella "test-comandi".</div>
      <div>-Infine, eliminare la cartella "logs" con tutto il suo contenuto (attenzione: &egrave; una cartella piena).</div>
      <div></div>
    </section>
  </main>
  <x-fluid-assets target="body" />
</body>
</html>
