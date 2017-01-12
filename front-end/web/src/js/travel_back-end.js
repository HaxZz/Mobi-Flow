/* Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


var BACKEND_URL = "http://192.168.12.65";
var TRAVEL_BACKEND_URL = BACKEND_URL +"/TODO";

var departure_string = "TODO";
var arrival_string   = "TODO";
var date = Date.now(); // TODO


function get_json_to_send_for_travel(departure_string, arrival_string, date)
{
    'use strict';
    
    return {
	"departure": departure_string,
	"arrival"  : arrival_string,
	"datetime-departure":
	{
		"date":
		{
			'year' : date.getYear(),
			'month': date.getMonth(),
			'day'  : date.getDay()
		},
		"time":
		{
			"hour"  : date.getHours(),
			"minute": date.getMinutes()
		}
	}
    };
}

function get_json_to_send_for_travel_from_form()
{
	var beginning = document.getElementById("departure").innerHTML;
	var ending = document.getElementById("arrival").innerHTML;
	var date = Date.now();
    return get_json_to_send_for_travel(beginning, ending, date);
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

var form = document.querySelector("form");
form.onsubmit = function()
{	
	alert("normalement");
	var departure = document.getElementById("departure").value;
	var arrival = document.getElementById("arrival").value;

	var beginning = getGPScoordinates(departure);
	var ending = getGPScoordinates(arrival);
	
	var dateTravel = getDateForCurrentTravel();

	var request = getXMLHttpRequest();
    var method = 'POST';

    /*
    var data = JSON.stringify(
    	{
    		"beginning" : 
    		{ 
    			"longitude" : beginning["longitude"], 
    			"latitude" : beginning["latitude"] 
    		},
    		"ending" : 
    		{ 
    			"longitude" : ending["longitude"], 
    			"latitude" : ending["latitude"] 
    		}, 
    		"datetime_departure" :
    		{
    			"date":
				{
					"year" : dateTravel.getFullYear(),
					"month": dateTravel.getMonth(),
					"day"  : dateTravel.getDay()
				},
				"time":
				{
					"hour"  : dateTravel.getHours(),
					"minute": dateTravel.getMinutes()
				}
			},
			"user-id": 3
		});
	*/
	var data =
	{
	"beginning": {"longitude" : "00", "latitude" : "00" },
    "ending"  : {"longitude" : "00", "latitude" : "00" },
	"datetime_departure" :
	{
		"date":
		{
			"year" : "2017",
			"month": "01",
			"day"  : "20"
		},
		"time":
		{
			"hour"  : "18",
			"minute": "44"
		}
	},
	"user-id": 3
	};
	
    alert(data);
    request.open(method, "192.168.0.5/MOBIFLOW/back-end/src/mobiflow_api/travel.php", true);

    request.onreadystatechange = function()
    {    
    if(this.readyState == 4)
    {
        if(this.status == 200)
        {
	        var json_received_string = this	.responseText.trim();
	        var json_received = JSON.parse(json_received_string);
	        alert(json_received);
        }
    }
    };

    sendXMLHttpRequest(request, data);

	goto_page("success");

	return false;    	
};

window.addEventListener('load', get_travels, false);
