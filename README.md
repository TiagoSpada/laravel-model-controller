# Laravel Template

Questa repo template contiene una versione modificata del pacchetto `laravel/laravel`. Tale versione differisce nei seguenti punti:

-   `PostCSS` è stato rimosso
-   È stato installato `SASS`
-   È stato installato `Bootstrap`
-   La cartella `resources/css` è stata rimossa
-   È stata aggiunta la cartella `resources/scss` contenente il file `app.scss`
-   Il file `vite.config.js` è stato modificato al fine di includere i file `resources/scss/app.scss` e `resources/js/app.js` nella compilazione. Sono stati inoltre aggiunti gli alias per le cartelle `/resources/` e `node_modules/bootstrap`
-   Nella view `welcome`:
    -   Sono stati inclusi gli asset tramite direttiva `@vite`
    -   È stato rimosso lo stile preesistente
    -   È stato modificato il contenuto

## Passi da effettuare per RIPRODURRE questo template

1. Eseguire il comando `npm remove postcss` per rimuovere PostCSS
2. Eseguire il comando `npm i` per installare tutti i pacchetti di NPM (comprese le versioni aggiornate di `vite` e `laravel-vite-plugin`)
3. Eseguire il comando `npm i --save-dev sass` per installare SASS
4. Rinominare la cartella `css` che si trova nella cartella `resources/` in `scss`
5. Rinominare il file `app.css` che si trova nella nuova cartella `resources/scss` in `app.scss`
6. Modificare il file vite.config.js:
    - Cambiare la sezione `laravel(...)` in:
    ```
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js'
            ],
            refresh: true
        })
    ```
    per includere i file `resources/scss/app.scss` e `resources/js/app.js` nella compilazione (`npm run dev`/`build`)
    - Aggiungere la sezione:
    ```
        resolve: {
            alias: {
                '~resources': '/resources/',
            }
        },
    ```
    dopo la sezione `plugins: [...]` per creare un alias della cartella `/resources/` (evitandoci di doverla richiamare in questo modo tutte le volte)
7. Aggiungere la riga import `'~resources/scss/app.scss';` nel file `resources/js/app.js` per importare tramite JS il file SCSS principale
8. Aggiungere la direttiva `@vite('resources/js/app.js')` nella sezione `<head>` del file `resources/views/welcome.blade.php` per includere gli asset nella view
9. Aggiungere le righe:
    ```
        import.meta.glob([
            '../img/**'
        ]);
    ```
    nel file `resources/js/app.js` per istruire Vite e Blade affinché processino correttamente i nostri asset
10. Aggiungere la riga `package-lock.json` nel file `.gitignore` che si trova nella `root` del progetto per evitare di pubblicarlo nella repo (è un file che viene generato ed aggiornato automaticamente dopo l'esecuzione del comando `npm i`)
11. Installare `Bootstrap`:
    1. Eseguire il comando `npm i --save bootstrap @popperjs/core` per installare sia la parte `CSS` che la parte `JS` di `Bootstrap`
    2. Aggiungere la riga `import path from path` nel file `vite.config.js`
    3. Aggiungere la riga `'~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')` nell'oggetto `resolve.alias` nel file `vite.config.js`
    4. Aggiungere la riga `@import "~bootstrap/scss/bootstrap";` in alto nel file `resources/scss/app.scss` per importare la parte `CSS` di Bootstrap
    5. Aggiungere la riga `import * as bootstrap from 'bootstrap';` nel file `resources/js/app.js` per importare la parte `JS` di Bootstrap

## Passi da effettuare per UTILIZZARE questo template

1. Aprire questa repository su github e cliccare sul pulsante `Use this template > Create a new repository`
2. Clonare la repository appena creata su `VS Code`
3. Aprire il `terminale`
4. Copiare il file `.env.example` e rinominarlo in `.env` (cp.env.example .env)
5. Eseguire il comando `composer install`
6. Eseguire il comando `php artisan key:generate`
7. Eseguire il comando `npm i` o `npm install`
8. Aprire un secondo `terminale`
9. In uno dei due terminali, eseguire il comando `php artisan serve`. Nell'altro, `npm run dev`s

## Creare una template repository

1. Aprire la repo su github
2. Cliccare su `Settings`
3. Spuntare la casella `Template repository`
