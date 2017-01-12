/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


function getGPScoordinatesFromXml(xml)
{
    'use strict';
    
    var placeTags = xml.getElementsByTagName("place");
    if(!placeTags || placeTags.length == 0)
    {
	return null;
    }
    
    var placeTag = placeTags[0];
    if(!placeTag)
    {
	return null;
    }

    return {
	"longitude": placeTag.getAttribute("lon"),
    "latitude" : placeTag.getAttribute("lat")
    };
}

function getGPScoordinatesFromRequestOk(request)
{
    'use strict';
    
    if(request && request.responseXML)
    {
	return getGPScoordinatesFromXml(request.responseXML);
    }
    
    console.error(request);
    return null;
}

function gps_coordinates_request_statechange(request)
{
    'use strict';
    
    if(!isXMLHttpRequest(request))
    {
	if(isXMLHttpRequest(this))
	{
	    request = this;
	}
	else if(typeof(this) == "object" &&
		"target" in this &&
	       isXMLHttpRequest(this.target))
	{
	    request = this.target;
	}
	else
	{
	    throw new Exception("no argument");
	}
    }
    
    if(request.readyState == 4)
    {
	if(request.status == 200)
	{
	    return getGPScoordinatesFromRequestOk(request);
	}
	else
	{
	    console.error(request);
	}
    }
    return null;
}

/**
 * @brief  gets the GPS coordinates given an address string
 * @param  String address a string describing a street adress, give a ZIP code a city a street name
 * @return An array containing the values like : ["latitude"=value, "longitude"=value]
 */
function getGPScoordinates(address)
{
    'use strict';
    
    var gps =
    {
    	"longitude": null,
        "latitude" : null
    };
    
    var words = address.split(" ");
    var queryargs = "";
    for (var i = 0; i < words.length; i++)
    {
	queryargs += words[i];
	if(i != words.length - 1)
	{
	    queryargs += "+";
	}
    }

    queryargs += "&format=xml&polygon=1&addressdetails=1";
    var apiURL = "https://nominatim.openstreetmap.org/search?q=";
    apiURL += queryargs;
    
    var method = 'GET';
    var request = getXMLHttpRequest();
    if(!request)
    {
	throw new Error("No XMLHttpRequest");
    }
    request.open(method, apiURL, false);
    request.onreadystatechange = function()
    {
	'use strict';
	gps = gps_coordinates_request_statechange(request);
    };
    sendXMLHttpRequest(request);
    return gps;
}
