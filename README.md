Pre requisiti:
- php (php^>=7.2.5,<8.3)
- composer (https://getcomposer.org/)

Per eseguire il test di scrittura alla fine di un foglio Smartsheet:
- eseguire il `git clone` del progetto
- creare una copia del file `.env.example` con nome `.env`
- completare il file `.env` inserendo il token API generato dalla piattaforma (Account > Impostazioni personali... > Accesso API) tramite un account Amministratore
    - `SMARTSHEET_API_TOKEN`
- da terminare eseguire il comando `composer update`
- in riga `10` dello script `write-test.php` impostare uno `sheetId` di un foglio Smartsheet
- da terminale eseguire il comando `php write-test.php`

Documentazione API Smartsheet:
- https://smartsheet.redoc.ly/



