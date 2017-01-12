/**
 * @brief  gets the GPS coordinates given an adress string
 * @param  String adress a string describing a street adress, give a ZIP code a city a street name
 * @return An array containing the values like : ["latitude"=value, "longitude"=value]
 */
function getGPScoordinates(adress)
{
	'use strict';
    
	var words = adress.split(" ");
	var queryargs = "";
	for (var i = 0; i < words.length; i++) 
	{
		queryargs += words[i];
		if(i != words.length-1)
			queryargs += "+";
	}

	queryargs += "&format=xml&polygon=1&addressdetails=1";
	var ApiURL = "http://nominatim.openstreetmap.org/search?q=";
	ApiURL += queryargs;

    var request = getXMLHttpRequest();
    var method = 'GET';
    request.open(method, ApiURL, false);

    var gps = 
    {
    	"latitude":null,
    	"longitude":null
    };

    request.onreadystatechange = function()
    {
		'use strict';
		if(request.readyState == 4)
		{
		    if(request.status == 200)
		    {
				var xml = request.responseXML;
				gps["latitude"] = xml.getElementsByTagName("place")[0].getAttribute("lat"); 
				gps["longitude"] = xml.getElementsByTagName("place")[0].getAttribute("lon");		    }
		}
    };
    var json_to_send = "";
    sendXMLHttpRequest(request, json_to_send);
    return gps;
}