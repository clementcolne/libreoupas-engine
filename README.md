# libreoupas-engine/illkirsh

## Description
libreoupas est un site Internet permettant aux étudiant de la Faculté des Strasbourg illkirsh d'avoir accès aux disponibilités 
des salles informatiques.

## Une salle ne devrait pas être affichée ? Une salle est manquante ? Aucun cours ne s'affiche ?
Si une salle qui ne devrait pas s'affiche sur libreoupas, elle peut être retirée en suivant la démarche suivante :
- Forker le projet sur votre github
- Cloner le projet en local sur votre machine
- Créez une nouvelle branche
- Dans le fichier `libreoupas-engine/constants.php` :
  * Si une salle ne devrait pas être affichée, ajouter le nom de cette salle dans le tableau IGNORED_ROOMS
  * Si une salle est manquante, ajouter le nom de cette salle dans le tableau ROOMS
  * Si aucun cours ne s'affiche le lien URL est probablement mort, il suffit de récupérer un nouveau lien
- Pushez les modifications sur votre dépôt distant
- Depuis l'interface github en ligne de votre dépôt, cliquez sur le bouton "Compare & pull request"
- Cliquez sur le bouton "Create pull request" afin d'ouvrir la pull request

Un tutoriel expliquant comment faire une pull request est accessible [ici](https://opensource.com/article/19/7/create-pull-request-github).

## Structure du projet
Le projet se découpe en 2 parties.
`libreoupas-front` qui est le front-end de libreoupas, s'occupant uniquement de l'affichage des données des salles, des filtres et du thème.
`libreoupas-engine` qui est le moteur de libreoupas, s'occupant de récupérer les informations relatives aux salles informatiques et de les interpréter.
`libreoupas-engine` est placé à l'intérieur de `libreoupas-front` de telle sorte que l'arborescende du projet final soit `libreoupas-front/libreoupas-engine`.

Le dépôt github de `libreoupas-front` est accessible [ici](https://github.com/clementcolne/libreoupas-front).

## Fonctionnalités
- Affichage des salles par disponibilité (libre uniquement/libre+occupées)
- Affichage des salles par OS (Linus/Windows/Linux+Windows)
- Code couleur (vert = libre, rouge = occupé, orange = bientôt libre)
- Compteur de visiteurs (journalier + total)
