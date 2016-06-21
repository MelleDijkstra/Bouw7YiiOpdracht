Bouw7 Yii Opdracht
==================

This project is created with Yii 2 Advanced Template.

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

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
