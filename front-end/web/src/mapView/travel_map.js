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
    'use strict';
    if(map == null)
    {
	if(L && L.map)
	{
	    map = L.map(MAP_HTML_ID);
	}
	else
	{
	    console.error(L);
	}
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
    'use strict';
    
    var map = getMap().setView([44.8637064, -0.6563529], 13);
    
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
    'use strict';
    var marker = L.marker([latitude, longitude]).addTo(getMap());
}

function placePath(array, color)
{
    'use strict';
    var polyline = L.polyline(array, {color: color}).addTo(getMap());
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

function get_travel_from_back_end(backendUrl)
{
    'use strict';
    
    var request = getXMLHttpRequest();
    var method = 'POST';
    request.open(method, backendUrl, false);

    var json_returned = null;

    request.onreadystatechange = function()
    {
	'use strict';
	if(request.readyState == 4)
	{
	    if(request.status == 200)
	    {
		var json_received_string = request.responseText.trim();
		var json_received = JSON.parse(json_received_string);
		json_returned = json_received;
	    }
	}
    };
    sendXMLHttpRequest(request, "");
    return json_returned;
}

function draw_map_from_json(jsonContent)
{
	var switcher = 1;

	// For each trajet
	for (var i = 0; i < jsonContent.length; i++) 
	{
		var trajet = jsonContent[i]["trajet"];

		// For each segment
		for (var j = 0; j < trajet.length; j++) 
		{
			var segment = trajet[j];
			var arrayToDraw = [];

			if(segment["traceCoordonnees"] != null)
			{
				// For each trace coordinate of a segment
				for (var k = 0; k < segment["traceCoordonnees"].length; k++) 
				{
				    var node = segment["traceCoordonnees"][k];

				    // If first node place a marker
				    if(j == 0 && k == 0)
				    {
					placeMarker(node["latitude"], node["longitude"]);
				    }

					arrayToDraw[k] = new L.LatLng(node["latitude"], node["longitude"]);
					
					//If last node place a marker
				    if(k == segment["traceCoordonnees"].length-1 &&
				       j == trajet.length-1)
				    {
					placeMarker(node["latitude"], node["longitude"]);
				    }
				}
			    
				// Change color for each segment
				var color;
				var r = Math.floor(Math.random() * 255);
				var g = Math.floor(Math.random() * 255);
				var b = Math.floor(Math.random() * 255);
				color = "rgb("+r+" ,"+g+","+ b+")";
			    
				placePath(arrayToDraw, color);
			}
		}
	}
}

window.addEventListener('load', draw_initial_map, false);
draw_initial_map();
