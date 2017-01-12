/* Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


var BACKEND_URL = "http://192.168.12.65";
var TRAVEL_BACKEND_URL = BACKEND_URL +"/TODO";

var departure_string = $('#departure').val();
var arrival_string   = $('#arrival').val();
var date = Date.now(); // TODO


function get_json_to_send_for_travel(departure_string, arrival_string, date)
{
    'use strict';
    
    return {
	'departure': departure_string,
	'arrival'  : arrival_string,
	'datetime-departure':
	{
		'date':
		{
			'year' : date.getYear(),
			'month': date.getMonth(),
			'day'  : date.getDay()
		},
		'time':
		{
			'hour'  : date.getHour(),
			'minute': date.getMinutes()
		}
	}
    };
}

function get_json_to_send_for_travel_from_form()
{
    // TODO
}

function get_travels()
{
    'use strict';
    
    var request = getXMLHttpRequest();
    var method = 'POST';
    request.open(method, TRAVEL_BACKEND_URL, true);
    request.onreadystatechange = function()
    {
	'use strict';
	if(request.readyState == 4)
	{
	    if(request.status == 200)
	    {
		var json_received_string = request.responseText.trim();
		var json_received = JSON.parse(json_received_string);
		// TODO
	    }
	}
    };
    var json_to_send = get_json_to_send_for_travel_from_form();
    sendXMLHttpRequest(request, json_to_send);
}

window.addEventListener('load', get_travels, false);
