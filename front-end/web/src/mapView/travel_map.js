/* Copyright 2017  Tendry
 * Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


var MAP_HTML_ID = "map";

function draw_initial_map_error()
{
    'use strict';
    
    var map_element = document.getElementById(MAP_HTML_ID);
    if(map_element)
    {
	map_element.innerHTML = "La carte n'est pas disponible.";
	alert.error("mapBoxId="+ mapBoxId +", mapBoxToken="+ mapBoxToken);
    }
    else
    {
	alert.error("Map element not available");
    }
}

function draw_initial_map_unsafe()
{
    var mymap = L.map(MAP_HTML_ID).setView([49.1846225, -0.4073643], 13);
    
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
		{
		    attribution: 'Map data &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
		    maxZoom: 18,
		    id: mapBoxId, //mapBoxId defined elsewhere
		    accessToken: mapBoxToken //mapBoxToken defined elsewhere
		}).addTo(mymap);
}

function draw_initial_map()
{
    'use strict';
    
    if(typeof(mapBoxId)    == "undefined" || mapBoxId == null ||
       typeof(mapBoxToken) == "undefined" || mapBoxToken == null)
    {
	draw_initial_map_error();
    }
    else
    {
	draw_initial_map_unsafe();
    }
}

window.addEventListener('load', draw_initial_map, false);
