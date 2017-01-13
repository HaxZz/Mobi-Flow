/* Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


function html_parse_from_string(a_string)
{
    'use strict';
    var parser = new DOMParser();
    return parser.parseFromString(a_string, "text/html");
}

function load_script_from_path(path, type)
{
    'use strict';
    var element = document.createElement("script");
    element.src = path;
    if(type)
    {
	element.type = type;
    }
    var body = document.querySelector("body");
    body.appendChild(element);
}

function load_scripts_from_tags(tags)
{
    'use strict';
    for(var i=0; i < tags.length; ++i)
    {
	var tag = tags[i];
	load_script_from_path(tag.getAttribute("src"),
			      tag.getAttribute("type"));
    }
}

function load_javascript_from_path(path)
{
    'use strict';
    load_script_from_path(path, "text/javascript");
}

function load_javascript_from_paths(paths)
{
    'use strict';
    for(var i=0; i < paths.length; ++i)
    {
	load_javascript_from_path(paths[i]);
    }
}

function fill_page_with_head_as_dom(head)
{
    'use strict';
    
    var title_downloaded = head.querySelector("title");
    var title_current = document.querySelector("head title");
    title_current.innerHTML = title_downloaded.innerHTML;
}

function fill_page_with_body_as_dom(body)
{
    'use strict';
    
    var main_current = document.querySelector("body main");
    main_current.innerHTML = body.innerHTML;
    
    // TODO remove
    var forms = main_current.querySelectorAll("form[action]");
    for(var i=0; i < forms.length; ++i)
    {
	var form = forms[i];
	form.onsubmit = function()
	{
	    'use strict';
	    var page = form.getAttribute("action");
	    goto_page(page);
	    return false;
	};
    }
}

function fill_page_with_html_as_dom(html)
{
    'use strict';
    
    var head_downloaded = html.querySelector("head");
    fill_page_with_head_as_dom(head_downloaded);
    
    var body_downloaded = html.querySelector("body");
    fill_page_with_body_as_dom(body_downloaded);
    
    var scripts = html.querySelectorAll("script[src]");
    load_scripts_from_tags(scripts);
}

function fill_page_with_xml_http_request_ok(request)
{
    'use strict';
    
    var html_downloaded = null;
    if(request.responseXML)
    {
	html_downloaded = request.responseXML;
    }
    else if(request.responseText)
    {
	var string_downloaded = request.responseText.trim();
	html_downloaded = html_parse_from_string(string_downloaded);
    }
    else if(request.response)
    {
	var string_downloaded = request.response.trim();
	html_downloaded = html_parse_from_string(string_downloaded);
    }
    else
    {
	console.error(request);
	return false;
    }
    
    fill_page_with_html_as_dom(html_downloaded);
    return true;
}

function fill_page_with_import_url_html(url)
{
    'use strict';
    
    var request = getXMLHttpRequest();
    var method = 'GET';
    request.open(method, url, true);
    request.onreadystatechange = function()
    {
	'use strict';
	
	if(this.readyState == 4)
	{
	    if(this.status == 200)
	    {
		fill_page_with_xml_http_request_ok(this);
	    }
	}
    };
    sendXMLHttpRequest(request);
    return true;
}

function fill_page_with_import_inc_html(name)
{
    'use strict';
    var url = name +".inc.html";
    return fill_page_with_import_url_html(url);
}

function get_anchor_from_url_string(url)
{
    'use strict';
    var url_parts = url.split('#');
    return (url_parts.length > 1) ? url_parts[1] : null;
}

function get_anchor_of_current_webpage()
{
    'use strict';
    return get_anchor_from_url_string(document.URL);
}

function goto_page(name)
{
    'use strict';
    
    var new_url = window.location.pathname + "#" + name;
    history.pushState   (null, null, new_url);
    history.replaceState(null, null, new_url);

    fill_page_with_import_inc_html(name);
}


window.onpopstate = function()
{
    'use strict';
    if(window.location.hash.length != 0)
    {
        name = window.location.hash.substr(1);
    }
    else
    {
        name = 'offline';
    }
    fill_page_with_import_inc_html(name);
}
