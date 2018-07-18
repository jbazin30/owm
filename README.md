# owm
## Descriptif
L'application devra sur une page d'accueil afficher sous forme de vignette les informations suivantes :
- la température de la ville
- une icone (https://erikflowers.github.io/weather-icons/) représentant le temps de la ville
- le nom de la ville

Une seconde page d'administration devra permettre de lister les villes que l'on souhaite voir s'afficher sur la page d'accueil.
Une zone de saisie permettra d'ajouter de nouvelles villes.

## Spécification technique
L'application devra employer le langage PHP et l'API PHP https://github.com/cmfcmf/OpenWeatherMap-PHP-Api. Un modèle MVC sera mis en place afin de controler les données et leur visualisation en intégrant un système de templates.
Quelques évènements JS pour gérer la liste des villes dans la page d'administration.
La partie front sera faite en HTML5 et CSS3.

## Axes d'amélioration
Dans une second sprint, devra être intégrées les améliorations suivantes :
- contrôle des données _POST et _GET via les filtres PHP à intégrer dans le contrôleur principal et implémntation d'une interface pour le contrôleur
- gestion des exceptions et erreurs de traitement notamment sur l'enregistrement des données dans le JSON
- gestion des valeurs NULL et/ou vides des différentes variables
- animation de l'interface
- utilisation de Mongodb ou SQL pour le stockage des widgets sur le volume à réfléchir
