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

    /*
    private $_db;
     
    public function __construct(){
        $this->_db = new PDO('mysql:host=localhost;dbname=mobiflow', $user, $pass); 
    }

     */
	
    public function Sign_up($myJSON){
        myObj = json_decode($myJSON);
        $username = myObj->{'username'};
        $email = myObj->{'email'};
        $password = myObj->{'password'};

        $_db = connect();

  //   	$sql = "SELECT * FROM user WHERE username = $username";
		// $result = $this->_db->query($sql);
  //       if( $res->fetchColumn() > 0 ){
  //       	var myObj = { 'result':'fail', 'errors':'Username already registered' };
  //           var myJSON = JSON.stringify(myObj);
  //       }
        
        $stmt = $_db->prepare("SELECT * FROM user WHERE username = :username");
        if( $stmt->execute(array('username' => $username)) ){
            $outputJSON = '{ "result":"fail", "errors":"Username already registered" }';
            return json_encode($outputJSON);
        }


      //       $sql = "SELECT * FROM User WHERE email_addr = $email";
    		// $result = $this->_db->query($sql);
      //       if( $result->fetchColumn() > 0 ){
      //       	var myObj = { 'result':'fail', 'errors':'Email address already used' };
      //           var myJSON = JSON.stringify(myObj);
      //       }


        $stmt = $_db->prepare("SELECT * FROM user WHERE email_addr = :email");

        if( $stmt->execute(array('email' => $email)) ){
            $outputJSON = '{ "result":"fail", "errors":"Email address already registered" }';
            return json_encode($outputJSON);
        }

        // if( strlen($password) < 5 ){
        //     var myObj = { 'result':'fail', 'errors':'Password too short' };
        //     var myJSON = JSON.stringify(myObj);
        // }

        if( strlen($password) < 5 ){
            $outputJSON = '{ "result":"fail", "errors":"Password too short" }';
            return json_encode($outputJSON);
        }

        // $sql = "INSERT INTO user (username, email_addr, password) VALUES ('$username', '$email', '$password')";
        // $this->_db->query($sql);

        // var myObj = { 'result':'ok' };
        // var myJSON = JSON.stringify(myObj);

        $stmt = $dbh->prepare("INSERT INTO user (username, email_addr, password) VALUES (:username, :email_addr, $password)");
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':email_addr', $email);
        $stmt->bindParam(':password', $pass);

        // insertion d'une ligne
        $name = $username;
        $email = $email_addr;
        $pass = $password
        
        if($stmt->execute()){
            $output = '{ "result" : "ok"}';
            return json_encode($output);
        }

        $output = '{ "result" : "fail", "errors" : "insertion failed"}';
        return json_encode($output);
    }

    public function Sign_in($myJSON)
    {
        // var myObj = JSON.parse(myJSON);
        // $login = myObj.login;
        // $password = myObj.password;
        
        myObj = json_decode($myJSON);
        $login = myObj->{'login'};
        $password = myObj->{'password'};

        $_db = connect();

        // $sql = "SELECT * FROM user WHERE username = $login OR email_addr = $login";
        // $result = $this->_db->query($sql);
        // if ($result->fetchColumn() > 0){
        //     var myObj = { 'result':'ok' };
        //     var myJSON = JSON.stringify(myObj);
        // }
        // else{
        //     var myObj = { 'result':'fail' };
        //     var myJSON = JSON.stringify(myObj);  
        // }
        // 
        
        $stmt = $_db->prepare("SELECT * FROM user WHERE (username = :login OR email_addr = :login) AND password =:pass");
        
        if( $stmt->execute(array('login' => $login, 'pass' => $password)) ){
            $outputJSON = '{ "result":"ok" }';
        }
        else{
            $outputJSON =  = '{ "result":"fail", "errors" : "login and/or password failed" }';
        }

        return json_encode($outputJSON);
    }

    public function Modify_Password($myJSON)
    {
        // var myObj = JSON.parse(myJSON);
        // $id = myObj.id;
        // $new_pass = myObj.new_pass;
        // $pass = myObj.pass;

        myObj = json_decode($myJSON);
        $id = myObj->{'id'};
        $password = myObj->{'password'};
        $newPasword = myObj->{'new_pass'};

        $_db = connect();

        // $sql = "SELECT * FROM user WHERE username-id = $id AND password = $pass";
        // $result = $this->_db->query($sql);
        // if( $result->fetchColumn() > 0 ){
        //     $sql = "UPDATE user SET password='$new_pass' WHERE username-id=$id";
        //     var myObj = { 'result':'ok' };
        //     var myJSON = JSON.stringify(myObj);
        // }
        // else{
        //     var myObj = { 'result': 'fail', 'errors':'Password not valid' };
        //     var myJSON = JSON.stringify(myObj);
        // }

        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id AND password =:password");
        
        if( $stmt->execute(array('login' => $id, 'password' => $password)) ){
            $update = $_db->prepare("UPDATE user SET password = :new_password");
            $stmt->bindParam(':new_password', $newPasword); 
            
            if($stmt->execute()){
                $outputJSON = '{ "result":"ok" }';                
            }
            else{
                $outputJSON = '{"result" : "fail", "errors" : "Password not valid"}';
            }
        }
        else{
            $outputJSON =  = '{ "result":"fail", "errors" : "login and/or password failed" }';
        }

        return json_encode($output);
    }

    public function Modify_Username($myJSON)
    {
        // var myObj = JSON.parse(myJSON);
        // $id = myObj.id;
        // $new_username = myObj.new_username;
        // $pass = myObj.pass;

        myObj = json_decode($myJSON);
        $id = myObj->{'id'};
        $password = myObj->{'password'};
        $new_username = myObj->{'new_username'};

        $_db = connect();

        // $sql = "SELECT * FROM user WHERE username = $new_username";
        // $result = $this->_db->query($sql);
        // if( $result->fetchColumn() == 0 ){
        //     $sql = "UPDATE user SET username='$new_username' WHERE username-id=$id";
        //     $this->_db->query($sql);
        //     var myObj = { 'result':'ok' };
        //     var myJSON = JSON.stringify(myObj);
        // }
        // else{
        //     var myObj = { 'result': 'fail', 'errors':'Username already used' };
        //     var myJSON = JSON.stringify(myObj);
        // }

        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id");
        
        if( $stmt->execute(array('id' => $id)) ){
            $update = $_db->prepare("UPDATE user SET username = :new_username");
            $stmt->bindParam(':new_username', $new_username); 
            
            if($stmt->execute()){
                $outputJSON = '{ "result":"ok" }';                
            }
            else{
                $outputJSON = '{"result" : "fail", "errors" : "Usename already valid"}';
            }
        }
        else{
            $outputJSON =  = '{ "result":"fail", "errors" : "wrong id" }';
        }

        return json_encode($outputJSON);
    }

    public function Modify_Disabled($myJSON)
    {
        // var myObj = JSON.parse(myJSON);
        // $id = myObj.id;
        // $disabled = myObj.disabled;
        // $pass = myObj.pass;

        myObj = json_decode($myJSON);
        $id = myObj->{'id'};
        $password = myObj->{'password'};
        $disabled = myObj->{'disabled'};

        $_db = connect();

        // $sql = "SELECT * FROM user WHERE username-id=$id AND password = $pass";
        // $result = $this->_db->query($sql);
        // if( $result->fetchColumn() > 0 ){
        //     $sql = "UPDATE user SET disabled='$disabled' WHERE username-id=$id";
        //     $this->_db->query($sql);
        //     var myObj = { 'result':'ok' };
        //     var myJSON = JSON.stringify(myObj);
        // }
        // else{
        //     var myObj = { 'result':'fail', 'errors':'Password not valid'};
        //     var myJSON = JSON.stringify(myObj);
        // }

        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id AND password = :password");
        
        if( $stmt->execute(array('id' => $id, 'password' => $password)) ){
            $update = $_db->prepare("UPDATE user SET disabled = :disabled");
            $stmt->bindParam(':disabled', $disabled); 
            
            if($stmt->execute()){
                $outputJSON = '{ "result":"ok" }';                
            }
            else{
                $outputJSON = '{"result" : "fail", "errors" : "disabled failed"}';
            }
        }
        else{
            $outputJSON =  = '{ "result":"fail", "errors" : "wrong id" }';
        }
        
        return json_encode($outputJSON);
    }
}