var mymap = L.map('mapid').setView([49.1846225, -0.4073643], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', 
{
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: mapBoxId, //mapBoxId defined elsewhere
    accessToken: mapBoxToken //mapBoxToken defined elsewhere
}).addTo(mymap);

function placeMarker(adress)
{
	'use strict';
    
	var words = adress.split(" ");

    var request = getXMLHttpRequest();
    var method = 'GET';
    request.open(method, TRAVEL_BACKEND_URL, true);
    request.onreadystatechange = function()
    {
	'use strict';
	if(request.readyState == 4)
	{
	    if(request.status == 200)
	    {
		var json_received_string = request.reponseText.trim();
		var json_received = JSON.parse(json_received_string);
		// TODO
	    }
	}
    };
    var json_to_send = get_json_to_send_for_travel_from_form();
    sendXMLHttpRequest(request, json_to_send);
}