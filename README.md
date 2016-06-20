Bouw7 Yii Opdracht
==================

This project is created with Yii 2 Advanced Template.

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

#### Algemeen
- [ ] Activiteit kan meerdere categorieën bevatten (many to many relation) - (Alleen nog in database)
- Activiteit bevat:
	- [x] Naam
	- [x] Type
	- [x] Beschrijving
	- [x] Image
	- [ ] Categorieën
- [x] Categorie bevat naam
- [x] Voor omschrijving wordt een WYSIWYG veld gebruikt
- [x] Afbeelding van een activiteit wordt ook als afbeelding laten zien (niet url)
- [ ] Bij de CU operaties van een activiteit kan een bestand worden meegestuurd voor de afbeelding
- [x] Checkbox list voor het kiezen in welke categorie een activiteit zit
- [ ] Activiteit gelinked met meerdere categorieën
- [ ] Alle correct verzonden informatie bij CU operaties worden ook goed opgeslagen in de database
- [ ] Type kan aangepast worden in de READ view van een activiteit met een dropdown.

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
	- [ ] aanmaken (Validatie is nog niet helemaal compleet)
	- [ ] aanpassen (Hetzelfde als aanmaken)
	- [x] verwijderen
