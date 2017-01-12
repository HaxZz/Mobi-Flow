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
    var element = document.createElement("script");
    element.src = path;
    if(type)
    {
	element.type = type;
    }
    var head = document.querySelector("head");
    head.appendChild(element);
}

function load_javascript_from_path(path)
{
    load_script_from_path(path, "text/javascript");
}

function load_javascript_from_paths(paths)
{
    for(var i=0; i < paths.length; ++i)
    {
	load_javascript_from_path(paths[i]);
    }
}

function fill_page_with_head_as_dom(head)
{
    'use strict';
    
    var title_downloaded = head.querySelector("head title");
    var title_current = document.querySelector("head title");
    title_current.innerHTML = title_downloaded.innerHTML;
    
    var scripts = head.querySelectorAll("script[src]");
    for(var i=0; i < scripts.length; ++i)
    {
	var script = scripts[i];
	load_script_from_path(script.getAttribute("src"),
			      script.getAttribute("type"));
    }
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
    
    var head_downloaded = html.querySelector("html head");
    fill_page_with_head_as_dom(head_downloaded);
    
    var body_downloaded = html.querySelector("html body");
    fill_page_with_body_as_dom(body_downloaded);
}

function fill_page_with_xml_http_request_ok(request)
{
    'use strict';
    var html_downloaded = null;
    if(request.responseXML)
    {
	html_downloaded = request.responseXML;
    }
    else
    {
	var string_downloaded = request.reponseText.trim();
	html_downloaded = html_parse_from_string(string);
    }
    fill_page_with_html_as_dom(html_downloaded);
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

function goto_page(name)
{
    'use strict';
    
    fill_page_with_import_inc_html(name);
    
    // TODO manage previous and forward
    // https://developer.mozilla.org/en-US/docs/Web/API/History_API
    window.location = "#" + name;
}

