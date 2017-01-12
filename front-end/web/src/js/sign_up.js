var form = document.querySelector("form");

form.onsubmit = function(){
	
	var request = getXMLHttpRequest();
    var method = 'POST';
    request.open(method, "../../../../MOBIFLOW/back-end/src/users/sign_up.php", true);

    var data = JSON.stringify({"username" : $('#username').val(), "password" : $('#password').val(), "email" : $('#email').val()});

    sendXMLHttpRequest(request, data );

    var bool = true;

    request.onreadystatechange = function()
    {
    
    if(request.readyState == 4)
    {
        if(request.status == 200)
        {

	        var json_received_string = request.responseText.trim();
	        var json_received = JSON.parse(JSON.parse(json_received_string));

	        var result = json_received["result"];

			if(result != "ok"){
				alert(json_received["errors"]);
				bool = false;
			}        
        }
    }
    };

    if(bool){
		goto_page("log-on");
    }
		return false;    	
};