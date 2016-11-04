# Documentation Duck TV

## Prérequis

- Git
- Composer
- Serveur local (MAMP, XAMPP, WAMP) ou en ligne

## Recommandations

- Chrome avec AdBlock et AdBlock pour YouTube
- Bonne connexion internet
- Écran d'au moins 17 pouces avec résolution en 1920*1080

## Installation

Pour récupérer le projet via Git, il faut taper cette ligne dans la commande :

	git clone https://github.com/qboot/duckTV.git

Le projet Symfony est bien récupéré. Il faut maintenant mettre à jour les différents Bundles :

	composer update

On s'assure que les entités sont bien actualisées en faisant un : 

	php bin/console doctrine:generate:entities DuckTVAppBundle

Nous pouvons maintenant créer la base de données :

	php bin/console doctrine:database:create

Maintenant que la base de données est crée, il faut la mettre à jour en fonction des modifications apportées :

	php bin/console doctrine:schema:update --force

Enfin, pour remplir les bases de données avec les données que nous avons apportées de base (vidéo/grille), il suffit de rentrer la commande suivante :

	php bin/console doctrine:fixtures:load

À noter, cela peut prendre un peu de temps... L'application fait une requête vers l'API Youtube Data V3 pour chacune des 205 vidéos présentes dans les fixtures !

## Fonctionnement

> Mais du coup comment, comment ça s'utilise ?

**Dashboard**
Une grille par défaut est générée via les data fixtures.
À la première connexion de la semaine d'un client sur le site, la grille de la semaine courante est créée.
Il s'agit d'une copie de la semaine par défaut. Celle-ci peut-être modifiée par l'administrateur.
Attention la modification n'est possible que pour les jours à venir et pour le jour courant si l'admin se connecte AVANT 6h00 du matin.

La grille de la semaine prochaine est créée vide de base. Cependant il y a un bouton pour la remplir avec la grille par défaut.

**WebTV**
- on est dans un créneau : on récupère les vidéos du créneau et la fin théorique du créneau -> setTimeout jusqu'à fin théorique -> nouvelle requête AJAX
- on est dans une transition : on récupère les transitions et la fin théorique des transitions
- on est hors d'un créneau et d'une transition : on recherche la date de début de la prochaine vidéo et on refera une requête AJAX à temps voulu


## Utilisation

On peut se connecter en admin en accédant au site /admin
L'admin à la possibilité :
- de modifier/supprimer/ajouter une vidéo
- de modifier/supprimer/ajouter une catégorie
- de gérer la grille de diffusion par défaut, la grille de diffusion courante et la grille de diffusion de la semaine prochaine

Sur une grille, l'admin peut soit mettre uniquement à jour une vidéo, ou un créneau entier, ou un jour entier ou directement une semaine entière.
Il peut également réorganiser les diffusions d'une journée via cliqué/glissé et peut ajouter des urls en glissant les miniatures dans les inputs directement plutôt que d'aller chercher l'url sur youtube.
Ceci est possible grâce à la libraire JQuery UI et rend la programmation d'une semaine plus facile. Bien entendu l'admin peut aussi ajouter plusieurs vidéos à la fois (autant qu'il le souhaite !).

Les sources des vidéos en motion design (Ai, mp4, etc) sont disponibles au téléchargement en cliquant sur le bon menu de la navigation.