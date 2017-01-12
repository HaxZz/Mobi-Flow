<?php

class UserService
{
    private $user, $pass;
    
    /**
     * @brief Connects to the database using the global variables
     * @return PDO The object representing the connection
     */
    private function connect()
    {
        return new PDO('mysql:host=localhost;dbname=mobiflow', $user, $pass);
    }

	public function signUp($myJSON)
    {
        $myObj = JSON.parse($myJSON);
        $username = myobj.username;
        $email = myobj.email;
        $password = myobj.password;

        $_db = connect();

    	$sql = "SELECT * FROM user WHERE username = $username";
		$result = $this->_db->query($sql);
        if( $res->fetchColumn() > 0 )
        {
            $myObj = { 'result':'fail', 'errors':'Username already registered' };
            $myJSON = JSON.stringify(myObj);
            return $myJSON;
        }

        $sql = "SELECT * FROM user WHERE email_addr = $email";
		$result = $this->_db->query($sql);
        if( $result->fetchColumn() > 0 )
        {
            $myObj = { 'result':'fail', 'errors':'Email address already used' };
            $myJSON = JSON.stringify(myObj);
            return $myJSON;
        }

        if( mb_strlen($password) < 5 )
        {
            $myObj = { 'result':'fail', 'errors':'Password too short' };
            $myJSON = JSON.stringify(myObj);
            return $myJSON;
        }

        $sql = "INSERT INTO user (username, email_addr, password) VALUES ('$username', '$email', '$password')";
        $this->_db->query($sql);

        $myObj = { 'result':'ok' };
        $myJSON = JSON.stringify(myObj);
        return $myJSON;
    }

    public function signIn($myJSON)
    {
        $myObj = JSON.parse(myJSON);
        $login = myobj.login;
        $password = myobj.password;

        $_db = connect();

        $sql = "SELECT * FROM user WHERE username = $login OR email_addr = $login";
        $result = $this->_db->query($sql);
        if ($result->fetchColumn() == 0)
        {
            $myObj = { 'result':'fail' };
            $myJSON = JSON.stringify(myObj);
            return $myJSON;
        }
        
        $myObj = { 'result':'ok' };
        $myJSON = JSON.stringify(myObj);
        return $myJSON;
    }

    public function Modify_Password($myJSON)
    {
        $myObj = JSON.parse(myJSON);
        $id = myobj.id;
        $new_pass = myobj.new_pass;
        $pass = myobj.pass;

        $_db = connect();

        $sql = "SELECT * FROM user WHERE username-id = $id AND password = $pass";
        $result = $this->_db->query($sql);
        if( $result->fetchColumn() == 0 ) {
            $myObj = { 'result': 'fail', 'errors':'Password not valid' };
            $myJSON = JSON.stringify(myObj);
            return $myJSON;
        }
        
        $sql = "UPDATE user SET password='$new_pass' WHERE username-id=$id";
        $myObj = { 'result':'ok' };
        $myJSON = JSON.stringify(myObj);
        return $myJSON;
    }

    public function modifyUsername($myJSON)
    {
        $myObj = JSON.parse(myJSON);
        $id = myobj.id;
        $new_username = myobj.new_username;
        $pass = myobj.pass;

        $_db = connect();

        $sql = "SELECT * FROM user WHERE username = $new_username";
        $result = $this->_db->query($sql);
        if( $result->fetchColumn() == 0 ){
            $sql = "UPDATE user SET username='$new_username' WHERE username-id=$id";
            $this->_db->query($sql);
            $myObj = { 'result':'ok' };
            $myJSON = JSON.stringify($myObj);
        }
        else
        {
            $myObj = { 'result': 'fail', 'errors':'Username already used' };
            $myJSON = JSON.stringify($myObj);
        }

        return $myJSON;
    }

    public function modifyDisabled($myJSON)
    {
        $myObj = JSON.parse(myJSON);
        $id = myobj.id;
        $disabled = myobj.disabled;
        $pass = myobj.pass;

        $_db = connect();
        $sql = "SELECT * FROM user WHERE username-id=$id AND password = $pass";
        $result = $this->_db->query($sql);
        if( $result->fetchColumn() == 0 ) {
            $myObj = { 'result':'fail', 'errors':'Password not valid'};
            return JSON.stringify($myObj);
        }
        
        $sql = "UPDATE user SET disabled='$disabled' WHERE username-id=$id";
        $this->_db->query($sql);
        $myObj = { 'result':'ok' };
        $myJSON = JSON.stringify($myObj);
        return $myJSON;
    }
}
