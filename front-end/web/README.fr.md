# A lire

## Outils

- Un navigateur web (comme Firefox ou Chromium)
- Un éditeur de texte (for HTML, CSS, JS) (comme Emacs, Vim, ou Geany)
- [Bootstrap](https://getbootstrap.com/) (version 3)
- [Une API JavaScript pour OpenStreetMap](https://wiki.openstreetmap.org/wiki/Develop/Frameworks)
- [Apache Cordova](https://cordova.apache.org/) (pour créer une application)
- git (optionel, pour l'historique du projet)

## APIs externes

- Notre back-end, via du JSON en POST, voir API.md du back-end
- [Leaflet](http://leafletjs.com/), une bibliotheque JavaScript responsive interactive pour des cartes.
  C'est libre sous une [license](https://github.com/Leaflet/Leaflet/blob/master/LICENSE) sans copyleft.
  C'est disponible via [GitHub](https://github.com/Leaflet/Leaflet).
  Elle utilise [OpenStreetMap](https://www.openstreetmap.org/).

## Comment c'est fait

Il utilise HTML/CSS/JS.
C'est un client pur front-end.
Il appelle des APIs externes (dont notre back-end), mais rien du front-end est généré via le serveur.
Cela permet au front-end d'être empaqueté dans une application (par exemple avec Cordova).

### Mécanisme de changement de page

Les entrées de l'utilisateur/utilisatrice sont sauvegardées via JavaScript.
Un changement de page "classique" viderait le contexte JavaScript.
Donc le front-end a juste une page du point de vue du client web.
Les pages (du point de vue l'utilisateur/utilisatrice) sont chargées dynamiquement via "AJAX", et insérer pour remplacer l'actuelle.
Les pages dynamiquement chargées sont "*.inc.html".
