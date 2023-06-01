# Gestionale di Famiglia
Piccolo sistema di gestione famigliare. 
Al momento sono presenti:

 - Gestione delle Entrate e uscite con possibilità di inserimento delle foto degli scontrini ed eventuali documenti in PDF.
 - Possibilità di importare gli estratti conto da un file excel o csv.
 - Un sistema di gestione delle letture dei contatori per il GAS e per l'Energia elettrica
 - Un sistema di gestione delle autovetture e relative operazioni effettuate su di esse.
 - Una rubrica telefonica e degli indirizzi
 - Una gestione dei progetti (ancora in sviluppo) 
 - Una gestione degli utenti e dei gruppi e relativi permessi.

*Sviluppato in php, mysql, jquery su framework Laravel*.


## Installazione
 - clonare il repository
 - copiare il file ```.env.example``` in ```.env```
 - inserire le informazioni del database (username,password,dbname)
 - lanciare ``` composer install ```
 - lanciare ``` php artisan migrate --seed``` 
 - preparare Apache copiando e modificando secondo le proprie impostazioni il file ``` bubofamily.conf ``` in ```/etc/apache2/sites-available ``` e quindi impostare in ```/etc/hosts``` il proprio fqdn relativo al gestionale. Ora applicare la modifica ad apache digitando ``` a2ensite bubofamily.conf``` e poi ``` systemctl apache2 restart```
 - di default si crea l'utente ``` admin ``` con password ```admin ``` per accedere la prima volta.
 

## Sviluppatori (attualmente)
Flavio Barachino <flavio.barachino@lavorain.cloud>

### Vuoi partecipare?
Scrivimi con le tue proposte, le tue critiche, i tuoi suggerimenti.
