@echo off
cd /d "%~dp0"

echo Avvio Laravel da:
echo %cd%
echo.
echo Se la porta 8000 e' occupata, cambia il numero in questo file.
echo Apri nel browser: http://127.0.0.1:8000
echo Per fermare il server premi CTRL+C in questa finestra.
echo.

php artisan serve --host=127.0.0.1 --port=8000

pause
