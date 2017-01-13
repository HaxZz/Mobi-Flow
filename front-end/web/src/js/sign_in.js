var id_user = -1;

var form = document.querySelector("form");

form.onsubmit = function()
{
    'use strict';
    
    var request = getXMLHttpRequest();
    var method = 'POST';
    request.open(method, "../../../../MOBIFLOW/back-end/src/users/sign_in.php", false);

    var data = JSON.stringify({"username" : $('#username').val(), "password" : $('#password').val()});

    var oracle = true;

    request.onreadystatechange = function()
    {
	'use strict';
	
	if(request.readyState == 4)
	{
            if(request.status == 200)
            {
		var json_received_string = request.responseText.trim();
		var json_received = JSON.parse(JSON.parse(json_received_string));
		var result = json_received["result"];
		
		if(result != "ok")
		{
                    alert(json_received["errors"]);
                    oracle = false;
		}
		else
		{
                    id_user = json_received["id-user"];
		}
            }
	}
    };
    sendXMLHttpRequest(request, data);

    if(oracle)
    {
	goto_page("log-on");
    }
    return false;
};
