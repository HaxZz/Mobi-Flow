/*
 * Copying and distribution of this file, with or without modification,
 * are permitted in any medium without royalty provided this notice is
 * preserved.  This file is offered as-is, without any warranty.
 * Names of contributors must not be used to endorse or promote products
 * derived from this file without specific prior written permission.
 */


if(typeof(getXMLHttpRequest) != 'function')
{
    function getXMLHttpRequest()
    {
	'use strict';
	
	if(typeof(XMLHttpRequest) == 'function')
	{
	    return new XMLHttpRequest();
	}
	if(typeof(window.ActiveXObject) == 'function')
	{
	    // Old versions of Internet Explorer...
	    try
	    {
		return new ActiveXObject("Msxml2.XMLHTTP");
	    }
	    catch(e)
	    {
		return new ActiveXObject("Microsoft.XMLHTTP");
	    }
	}
	return null;
    }
}

function isXMLHttpRequest(value)
{
    'use strict';
    if(value == undefined || value == null)
    {
	return false;
    }
    if(typeof(XMLHttpRequest) == 'function' && value instanceof XMLHttpRequest)
    {
	return true;
    }
    return false;
}

function createCORSRequest(method, url, async)
{
    if(async == undefined)
    {
	async = true;
    }
    
    var xhr = new XMLHttpRequest();
    if("withCredentials" in xhr)
    {
	// Check if the XMLHttpRequest object has a "withCredentials" property.
	// "withCredentials" only exists on XMLHTTPRequest2 objects.
	xhr.open(method, url, async);
    }
    else if(typeof(XDomainRequest) != "undefined")
    {
	// Otherwise, check if XDomainRequest.
	// XDomainRequest only exists in IE, and is IE's way of making CORS requests.
	xhr = new XDomainRequest();
	xhr.open(method, url);
    }
    else
    {
	// Otherwise, CORS is not supported by the browser.
	xhr = null;
    }
    return xhr;
}

function sendXMLHttpRequest(request, data)
{
    'use strict';
    
    if(typeof(request) == 'undefined' || request == null)
    {
	return false;
    }
    if(typeof(data) == 'undefined')
    {
	data = null;
    }
    
    try
    {
	if(data == null)
	{
	    request.send();
	}
	else
	{
	    request.send(data);
	}
	return true;
    }
    catch(exception)
    {
	if(exception == undefined || exception == null)
	{
	    console.error('Error with a XMLHttpRequest');
	}
	else
	{
	    console.error(exception.name +": "+ exception.message);
	}
	return false;
    }
}
