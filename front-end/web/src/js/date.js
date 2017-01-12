/* Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


var date_current_travel = new Date();

function getDateForCurrentTravel()
{
    'use strict';
    return date_current_travel;
}


function updateHourForCurrentTravel()
{
    'use strict';
    var element = document.getElementById("hour");
    if(element)
    {
	date_current_travel.setHours(parseInt(element.value, 10));
    }
}

function updateMinuteForCurrentTravel()
{
    'use strict';
    var element = document.getElementById("minute");
    if(element)
    {
	date_current_travel.setMinutes(parseInt(element.value, 10));
    }
}

function updateDayForCurrentTravel()
{
    'use strict';
    var element = document.getElementById("day");
    if(element)
    {
	date_current_travel.setDay(parseInt(element.value, 10));
    }
}

function updateMonthForCurrentTravel()
{
    'use strict';
    var element = document.getElementById("month");
    if(element)
    {
	date_current_travel.setMonth(parseInt(element.value, 10));
    }
}

function updateYearForCurrentTravel()
{
    'use strict';
    var element = document.getElementById("year");
    if(element)
    {
	date_current_travel.setYear(parseInt(element.value, 10));
    }
}

function updateDateForCurrentTravel()
{
    'use strict';
    updateHourForCurrentTravel();
    updateMinuteForCurrentTravel();
    updateDayForCurrentTravel();
    updateHourForCurrentTravel();
    updateYearForCurrentTravel();
}


function putOnChangeForMinuteInput()
{
    'use strict';
    var element = document.getElementById("minute");
    element.onchange = updateMinuteForCurrentTravel;
}

function putOnChangeForHourInput()
{
    'use strict';
    var element = document.getElementById("hour");
    element.onchange = updateHourForCurrentTravel;
}

function putOnChangeForDayInput()
{
    'use strict';
    var element = document.getElementById("day");
    element.onchange = updateDayForCurrentTravel;
}

function putOnChangeForMonthInput()
{
    'use strict';
    var element = document.getElementById("month");
    element.onchange = updateMonthForCurrentTravel;
}

function putOnChangeForYearInput()
{
    'use strict';
    var element = document.getElementById("year");
    element.onchange = updateYearForCurrentTravel;
}

function putOnChangeForDateInputs()
{
    'use strict';
    putOnChangeForMinuteInput();
    putOnChangeForHourInput();
    putOnChangeForDayInput();
    putOnChangeForMonthInput();
    putOnChangeForYearInput();
}


function fillEmptyDateInputs()
{
    'use strict';
    
    var date_now = new Date();
    var inputs = document.querySelectorAll("input");
    for(var i=0; i < inputs.length; ++i)
    {
	var input = inputs[i];
	
	if(input.type == "submit")
	{
	    continue;
	}
	
	if(input.value == undefined ||
	   input.value == null ||
	   input.value == "")
	{
	    var input_id = input.getAttribute("id");
	    if(input_id == undefined || input_id == null || input_id == "")
	    {
		console.error(input);
		continue;
	    }
	    
	    input_id = input_id.trim().toLowerCase();
	    if(input_id.startsWith("minute"))
	    {
		input.value = date_now.getMinutes();
	    }
	    else if(input_id.startsWith("hour"))
	    {
		input.value = date_now.getHours();
	    }
	    else if(input_id.startsWith("day"))
	    {
		input.value = date_now.getDay();
	    }
	    else if(input_id.startsWith("month"))
	    {
		input.value = date_now.getMonth() + 1;
	    }
	    else if(input_id.startsWith("year"))
	    {
		input.value = date_now.getYear();
	    }
	    else
	    {
		console.log("id "+ input_id +" is not managed");
	    }
	}
    }
}

function initDate()
{
    'use strict';
    fillEmptyDateInputs();
    putOnChangeForDateInputs();
}

window.addEventListener('load', initDate, false);
initDate();
