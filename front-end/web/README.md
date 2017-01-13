# Read Me

## Tools

- A web browser (like Firefox or Chromium)
- A text editor (for HTML, CSS, JS) (like Emacs, Vim, or Geany)
- [Bootstrap](https://getbootstrap.com/) (version 3)
- [A JavaScript API for OpenStreetMap](https://wiki.openstreetmap.org/wiki/Develop/Frameworks)
- [Apache Cordova](https://cordova.apache.org/) (to create an app)
- git (optionnal, for the history of the project)

## Externals APIs used

- Our back-end, through JSON in POST, see API.md of the back-end
- [Leaflet](http://leafletjs.com/), a JavaScript library for mobile-friendly interactive maps.
  It is free/libre under a non copyleft [license](https://github.com/Leaflet/Leaflet/blob/master/LICENSE).
  It is available on [GitHub](https://github.com/Leaflet/Leaflet).
  It uses [OpenStreetMap](https://www.openstreetmap.org/).

## How it is done

It uses only HTML/CSS/JS.
It is a full client front-end.
It calls external APIs (including our back-end), but nothing of the front-end is generated with a server.
Thanks to that, the front-end can be packaged to an application (for example with Cordova).

### Changing page mechanism

Inputs of user are saved with JavaScript.
Changing page in a classic way would clear the JavaScript context.
So the front-end has only one page from a web client point of view.
Pages (from the user point of view) are loaded dynamically throught "AJAX", and inserted to replace the current one.
The pages dynamically loaded are "*.inc.html".
