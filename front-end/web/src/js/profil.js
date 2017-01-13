var form = document.querySelector("form");

var firstname;
var lastname;
var birthday;
var email;
var disabled;

form.onsubmit = function(){
	
	var request = getXMLHttpRequest();
    var method = 'POST';
    request.open(method, "../../../../MOBIFLOW/back-end/src/users/profil.php", false);

    if($('#disabled').val() != ""){
        disabled = $('#disabled').val();
    }
    else{
        disabled = "None";
    }

    firstname = $('#firstname').val();
    lastname = $('#lastname').val();
    birthday = $('#birthday').val();
    email = $('#email').val();
    
    var data = { "firstname" : firstname, 
        "lastname" : lastname,
        "birthday" : birthday,
        "email" : ,
        "disabled" : disabled,
        "id" : id_user
    };

    data = JSON.stringify(data);
    request.onreadystatechange = function()
    {
        if(request.readyState == 4)
        {
            if(request.status == 200)
            {
                alert('ici');
                var json_received_string = request.responseText.trim();
                alert(json_received_string);
                var json_received = JSON.parse(JSON.parse(json_received_string));
                alert(json_received);
            }   
        }
    };
    sendXMLHttpRequest(request, data );
	
    goto_page("log-on");

    return false;    	
};