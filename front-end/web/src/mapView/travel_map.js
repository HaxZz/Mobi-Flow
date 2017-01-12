/* Copyright 2017  Tendry
 * Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


var MAP_HTML_ID = "map";

var map = null;

function getMap()
{
	if(map == null)
	{
		map = L.map(MAP_HTML_ID);
	}

	return map;
}

function draw_initial_map_error_element()
{
    'use strict';
    console.error("id="+ MAP_HTML_ID +" was not found");
}

function draw_initial_map_error_print()
{
    'use strict';
    var map_element = document.getElementById(MAP_HTML_ID);
    if(map_element)
    {
	map_element.innerHTML = "La carte n'est pas disponible.";
    }
}

function draw_initial_map_error_api_id()
{
    'use strict';
    console.error("mapBoxId="+ mapBoxId +", mapBoxToken="+ mapBoxToken);
}

function draw_initial_map_unsafe()
{
    var map = getMap().setView([49.1846225, -0.4073643], 13);
    
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
	{
		    attribution: 'Map data &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
		    maxZoom: 18,
		    id: mapBoxId, //mapBoxId defined elsewhere
		    accessToken: mapBoxToken //mapBoxToken defined elsewhere
	}).addTo(map);
}

function placeMarker(latitude, longitude)
{
	var marker = L.marker([latitude, longitude]).addTo(getMap());
}

function draw_initial_map()
{
    'use strict';
    
    if(document.getElementById(MAP_HTML_ID) == null)
    {
	draw_initial_map_error_element();
	return false;
    }
    
    if(typeof(mapBoxId)    == "undefined" || mapBoxId    == null ||
       typeof(mapBoxToken) == "undefined" || mapBoxToken == null)
    {
	draw_initial_map_error_print();
	draw_initial_map_error_api_id();
	return false;
    }
    
    draw_initial_map_unsafe();
    return true;
}

window.addEventListener('load', draw_initial_map, false);