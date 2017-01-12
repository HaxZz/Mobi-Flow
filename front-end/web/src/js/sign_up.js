var form = document.querySelector("form");
var id_user;

form.onsubmit = function(){
	
	var request = getXMLHttpRequest();
    var method = 'POST';
    request.open(method, "../../../../MOBIFLOW/back-end/src/users/sign_up.php", false);

    var data = JSON.stringify({"username" : $('#username').val(), "password" : $('#password').val(), "email" : $('#email').val()});


    var oracle = true;

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
                oracle = false;
                alert(json_received["errors"]);
            }
            else{
                id_user = json_received["id-user"];
            }
        }
    }
    };
    sendXMLHttpRequest(request, data );

    if(oracle){
		goto_page("log-on");
        return false;
    }
	
    return false;    	
};