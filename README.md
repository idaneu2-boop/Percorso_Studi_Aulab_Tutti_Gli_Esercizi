# Esercizi Daniele - Laravel

Il sito e' stato portato in Laravel mantenendo le pagine originali come viste Blade.

## Avvio

Da terminale entra nella cartella principale del progetto:

```bash
cd C:\Users\idane\Desktop\Es-Pigliacelli-Daniele
```

Poi lancia:

```bash
php artisan serve
```

Poi apri:

```text
http://127.0.0.1:8000
```

In alternativa puoi avviare `start-laravel.bat` con doppio click dalla cartella del progetto.

La home e' disponibile anche su `/home` e i vecchi link `.html` continuano a funzionare, per esempio `/presto.html` o `/viaggi%20(4).html`.

## Struttura principale

- `routes/web.php`: route Laravel per home e pagine `.html`.
- `resources/views/*.blade.php`: copie Laravel delle pagine HTML.
- `public/css` e `public/js`: asset serviti dal browser.
- `public/media` e `public/data`: immagini, audio, video e JSON originali.
