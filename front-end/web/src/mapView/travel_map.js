var mymap = L.map('mapid').setView([49.1846225, -0.4073643], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', 
{
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: mapBoxId, //mapBoxId defined elsewhere
    accessToken: mapBoxToken //mapBoxToken defined elsewhere
}).addTo(mymap);