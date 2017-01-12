/*
 * Copyright (C) 2016  Nicola Spanti <dev@nicola-spanti.info>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */


function objectToPostArray(obj)
{
    'use strict';
    var query = [];
    for (var key in obj)
    {
	if(key != '' && obj[key] != '')
	{
	    query.push(encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]));
	}
    }
    return query;
}

function objectToPostData(obj)
{
    'use strict';
    var postArray = objectToPostArray(obj);
    return postArray == null ? null : postArray.join('&');
}

function inputElementsToObjectWithKeysAndValues(inputElements)
{
    'use strict';
    
    if(inputElements == undefined || inputElements == null)
    {
	return null;
    }
    
    var keysAndValues = {};
    for (var i=0; i < inputElements.length; ++i)
    {
	var inputElement = inputElements[i];
	keysAndValues[inputElement.name] = inputElement.value;
    }
    return keysAndValues;
}

function getFormData(inputsSelector)
{
    'use strict';
    
    if(typeof(document.querySelectorAll) != 'function')
    {
	return null;
    }
    
    var inputElements = document.querySelectorAll(inputsSelector);
    var keysAndValues = inputElementsToObjectWithKeysAndValues(inputElements);
    return objectToPostData(keysAndValues);
}
