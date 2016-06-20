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

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

#### Algemeen
- [ ] Activiteit kan meerdere categorien bevatten (one to many)
- [ ] Activiteit bevat:
	- [ ] Naam
	- [ ] Type
	- [ ] Beschrijving
	- [ ] Image
	- [ ] Categorie
- [ ] Categorie bevat alleen een naam
- [ ] Voor omschrijving wordt een WYSIWYG veld
- [ ] Afbeelding van een activiteit wordt ook als afbeelding laten zien (niet url)
- [ ] Bij de CU operaties van een activiteit kan een bestand worden meegestuurd voor de afbeelding
- [ ] Checkbox list voor het kiezen in welke categorie een activiteit zit
- [ ] Alle correct verzonden informatie bij CU operaties worden ook goed opegslagen in de database

#### Yii
- [ ] Gebruik van migraties
- [ ] Gebruik RBAC voor rechten

#### Gebruiker
- [ ] Inloggen
- [ ] Gebruiker kan alleen zijn eigen activiteiten zien
- [ ] Eigen activiteiten:
	- [ ] bekijken
	- [ ] aanmaken
	- [ ] aanpassen
	- [ ] verwijderen

#### Admin
- [ ] Inloggen
- [ ] Admin kan alle activiteiten zien
- [ ] Activiteiten:
	- [ ] bekijken
	- [ ] aanmaken
	- [ ] aanpassen
	- [ ] verwijderen
- [ ] Categorien:
	- [ ] bekijken
	- [ ] aanmaken
	- [ ] aanpassen
	- [ ] verwijderen
- [ ] Gebruikers:
	- [ ] bekijken
	- [ ] aanmaken
	- [ ] aanpassen
	- [ ] verwijderen
