<?php

class UserService
{
    /**
     * @brief Connects to the database using the global variables
     * @return PDO The object representing the connection
     */
    function connect()
    {
        global $user, $pass;

        return new PDO('mysql:host=localhost;dbname=mobiflow', $user, $pass);
    }

	public function Sign_up($myJSON){
        var myObj = JSON.parse(myJSON);
        $username = myobj.username;
        $email = myobj.email;
        $password = myobj.password;

        $_db = connect();

    	$sql = "SELECT * FROM user WHERE username = $username";
		$result = $this->_db->query($sql);
        if( $res->fetchColumn() > 0 ){
        	var myObj = { 'result':'fail', 'errors':'Username already registered' };
            var myJSON = JSON.stringify(myObj);
        }
        

        $sql = "SELECT * FROM User WHERE email_addr = $email";
		$result = $this->_db->query($sql);
        if( $result->fetchColumn() > 0 ){
        	var myObj = { 'result':'fail', 'errors':'Email address already used' };
            var myJSON = JSON.stringify(myObj);
        }


        if( strlen($password) < 5 ){
            var myObj = { 'result':'fail', 'errors':'Password too short' };
            var myJSON = JSON.stringify(myObj);
        }

        $sql = "INSERT INTO user (username, email_addr, password) VALUES ('$username', '$email', '$password')";
        $this->_db->query($sql);

        var myObj = { 'result':'ok' };
        var myJSON = JSON.stringify(myObj);

        return myJSON;   
    }

    public function Sign_in($myJSON)
    {
        var myObj = JSON.parse(myJSON);
        $login = myobj.login;
        $password = myobj.password;

        $_db = connect();

        $sql = "SELECT * FROM user WHERE username = $login OR email_addr = $login";
        $result = $this->_db->query($sql);
        if ($result->fetchColumn() > 0){
            var myObj = { 'result':'ok' };
            var myJSON = JSON.stringify(myObj);
        }
        else{
            var myObj = { 'result':'fail' };
            var myJSON = JSON.stringify(myObj);  
        }
        return myJSON;
    }

    public function Modify_Password($myJSON)
    {
        var myObj = JSON.parse(myJSON);
        $id = myobj.id;
        $new_pass = myobj.new_pass;
        $pass = myobj.pass;

        $_db = connect();

        $sql = "SELECT * FROM user WHERE username-id = $id AND password = $pass";
        $result = $this->_db->query($sql);
        if( $result->fetchColumn() > 0 ){
            $sql = "UPDATE user SET password='$new_pass' WHERE username-id=$id";
            var myObj = { 'result':'ok' };
            var myJSON = JSON.stringify(myObj);
        }
        else{
            var myObj = { 'result': 'fail', 'errors':'Password not valid' };
            var myJSON = JSON.stringify(myObj);
        }
        return myJSON;
    }

    public function Modify_Username($myJSON)
    {
        var myObj = JSON.parse(myJSON);
        $id = myobj.id;
        $new_username = myobj.new_username;
        $pass = myobj.pass;

        $_db = connect();

        $sql = "SELECT * FROM user WHERE username = $new_username";
        $result = $this->_db->query($sql);
        if( $result->fetchColumn() == 0 ){
            $sql = "UPDATE user SET username='$new_username' WHERE username-id=$id";
            $this->_db->query($sql);
            var myObj = { 'result':'ok' };
            var myJSON = JSON.stringify(myObj);
        }
        else{
            var myObj = { 'result': 'fail', 'errors':'Username already used' };
            var myJSON = JSON.stringify(myObj);
        }

        return myJSON;
    }

    public function Modify_Disabled($myJSON)
    {
        var myObj = JSON.parse(myJSON);
        $id = myobj.id;
        $disabled = myobj.disabled;
        $pass = myobj.pass;

        $_db = connect();
        $sql = "SELECT * FROM user WHERE username-id=$id AND password = $pass";
        $result = $this->_db->query($sql);
        if( $result->fetchColumn() > 0 ){
            $sql = "UPDATE user SET disabled='$disabled' WHERE username-id=$id";
            $this->_db->query($sql);
            var myObj = { 'result':'ok' };
            var myJSON = JSON.stringify(myObj);
        }
        else{
            var myObj = { 'result':'fail', 'errors':'Password not valid'};
            var myJSON = JSON.stringify(myObj);
        }

        return myJSON;
    }
}