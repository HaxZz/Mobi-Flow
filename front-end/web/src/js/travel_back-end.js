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
	var departure = document.getElementById("departure").value;
	var arrival = document.getElementById("arrival").value;

	var beginning = getGPScoordinates(departure);
	var ending = getGPScoordinates(arrival);
	
	var dateTravel = getDateForCurrentTravel();

	var request = getXMLHttpRequest();
    var method = 'POST';

	var dateMonth = dateTravel.getMonth();
	dateMonth++;
	if(dateMonth < 10)
		dateMonth = "0" + dateMonth;

	var dateDay = dateTravel.getDate();
	if(dateDay < 10)
		dateDay = "0" + dateDay;

	var dateHour = dateTravel.getHours();
	if(dateHour < 10)
		dateHour= "0" + dateHour;

	var dateMins = dateTravel.getMinutes();
	if(dateMins < 10)
		dateMins = "0" + dateMins;

	var data = JSON.stringify(
	{
	"beginning": {"longitude" : beginning["longitude"], "latitude" : beginning["latitude"] },
    "ending"  : {"longitude" : ending["longitude"], "latitude" : ending["latitude"] },
	"datetime_beginning" :
	{
		"date":
		{
			"year" : dateTravel.getFullYear(),
			"month": dateMonth,
			"day"  : dateDay
		},
		"time":
		{
			"hour"  : dateHour,
			"minute": dateDay
		}
	},
	"user-id": 3
	});

    request.open(method, "http://192.168.0.5/MOBIFLOW/back-end/src/mobiflow_api/travel.php", false);

    request.onreadystatechange = function()
    {    
    if(this.readyState == 4)
    {
        if(this.status == 200)
        {
        	alert(this.responseText);
        	/*
	        var json_received_string = this	.responseText.trim();
	        var json_received = JSON.parse(json_received_string);
	        alert(json_received);
	        */
        }
    }
    };

    sendXMLHttpRequest(request, data);

	goto_page("success");

	return false;    	
};

window.addEventListener('load', get_travels, false);
