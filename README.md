Bouw7 Yii Opdracht
==================

Dit project is gemaakt met het Yii 2 Advanced Template.

__Eerste hoofdstuk gaat over de installatie, daarna volgen de TODO's__

## Installatie

Benodigdheden:
- Composer
- Webserver met PHP
- De (global) assets plugin `composer global require "fxp/composer-asset-plugin:~1.1.1"`

1. Clone deze repository doormiddel van `git clone https://github.com/MelleDijkstra/Bouw7YiiOpdracht.git`.
2. Voer `composer global require "fxp/composer-asset-plugin:~1.1.1"` om de bower dependencie op te halen
3. Wanneer de repository gecloned is, voer het commando `composer install` uit om alle benodigde dependencies op te halen
4. Open dan een console terminal en voer het commando `init` uit in de installatie map.
(Als het init script niet aanwezig is, voer dan `php init` uit)
5. Maak een database aan om te gebruiken, en pas `components['db']` aan in `common/config/main-local.php` met de juiste gegevens.
(Zorg er voor dat de database gebruiker rechten heeft om vanaf de applicatie bij de database te komen en CRUD + Structuur (CREATE TABLE) rechten heeft)
6. Open een console terminal en voer de migraties uit door het commando `yii migrate`.
7. Maak 2 virtualhosts aan:
	1. Voor de frontend `/path/to/Bouw7YiiOpdracht/frontend/web/` zet URL naar http://frontend.dev/ (of iets anders)
	2. Voor de backend `/path/to/Bouw7YiiOpdracht/backend/web/` zet URL naar http://backend.dev/ (of iets anders)
	
Voorbeeld voor frontend:
	
```xml
<VirtualHost *:80>
   ServerName frontend.dev
   DocumentRoot "/path/to/Bouw7YiiOpdracht/frontend/web/"

   <Directory "/path/to/Bouw7YiiOpdracht/frontend/web/">
       # use mod_rewrite for pretty URL support
       RewriteEngine on
       # If a directory or a file exists, use the request directly
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteCond %{REQUEST_FILENAME} !-d
       # Otherwise forward the request to index.php
       RewriteRule . index.php

       # use index.php as index file
       DirectoryIndex index.php

       # ...other settings...
   </Directory>
</VirtualHost>
```
	
8. Zorg er voor dat http://frontend.dev/ en http://backend.dev/ verwijzen naar 127.0.0.1 in de hosts file (`C:\Windows\System32\drivers\etc\hosts`)
9. De webserver die naar de applicatie verwijst heeft uitvoer rechten nodig

Zorg er voor dat de Apache bij de bestanden mag komen van de applicatie
voorbeeld (`httpd.conf`):

```xml    
<Directory />
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Order deny,allow
    Allow from all
</Directory>
```

10. Ga naar http://frontend.dev/ of http://backend.dev/ om de applicatie te bekijken

## TODO's

#### Algemeen
- [x] Activiteit kan meerdere categorieën bevatten en één categorie kan bij meerdere activiteiten behoren (many to many relation)
- Activiteit bevat:
	- [x] Naam
	- [x] Type
	- [x] Beschrijving
	- [ ] Image
	- [x] Categorieën
- [x] Categorie bevat naam
- [x] Voor omschrijving wordt een WYSIWYG veld gebruikt
- [x] Afbeelding van een activiteit wordt ook als afbeelding laten zien (niet url)
- [ ] Bij de CU operaties van een activiteit kan een bestand worden meegestuurd voor de afbeelding
- [x] Checkbox list voor het kiezen in welke categorie een activiteit zit
- [x] Activiteit gelinked met meerdere categorieën
- [ ] Alle correct verzonden informatie bij CU operaties worden ook goed opgeslagen in de database
- [ ] Type kan aangepast worden in de READ view van een activiteit met een dropdown.
- [ ] Image kan geupload worden
- [x] Beschrijving van activiteit kan ingevoerd worden met WYSIWYG veld en wordt als HTML laten zien

#### Yii
- [x] Gebruik van migraties
- [ ] Gebruik RBAC voor rechten

#### Gebruiker
- [x] Inloggen
- [x] Gebruiker kan alleen zijn eigen activiteiten zien
- Eigen activiteiten:
	- [x] bekijken
	- [x] aanmaken
	- [x] aanpassen
	- [x] verwijderen

#### Admin
- [x] Inloggen
- [x] Admin kan alle activiteiten zien
- Activiteiten:
	- [x] bekijken
	- [x] aanmaken
	- [x] aanpassen
	- [x] verwijderen
- Categorieën:
	- [x] bekijken
	- [x] aanmaken
	- [x] aanpassen
	- [x] verwijderen
- Gebruikers:
	- [x] bekijken
	- [ ] aanmaken (Validatie is nog niet helemaal compleet) (de "rules" van een gebruiker)
	- [ ] aanpassen (Hetzelfde als aanmaken)
	- [x] verwijderen
