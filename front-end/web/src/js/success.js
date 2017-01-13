function printSuccessTravelDate()
{
    'use strict';
    
    if(typeof(getDateForCurrentTravel) == "function")
    {
	var dateString = getDateForCurrentTravel().toLocaleString().trim();
	if(dateString != "")
	{
	    var dateElement = document.getElementById("date");
	    if(dateElement)
	    {
		dateElement.innerHTML = dateString;
	    }
	}
    }
}

printSuccessTravelDate();
