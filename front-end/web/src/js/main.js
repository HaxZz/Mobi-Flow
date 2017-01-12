/* Copyright 2017  Nicola Spanti <dev@nicola-spanti.info>
 * 
 * Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


window.addEventListener('load', function()
{
    var anchor = get_anchor_of_current_webpage();
    if(anchor == undefined ||
       anchor == null ||
       anchor == "")
    {
	anchor = "offline";
    }
    fill_page_with_import_inc_html(anchor);
}, false);
