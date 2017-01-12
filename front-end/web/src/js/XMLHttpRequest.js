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
	request.send(data);
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
