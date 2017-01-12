<?php

class UserService
{
    private $user, $pass;

    public function __construct($user,$pass){
        $this->user = $user;
        $this->pass = $pass;
    }


    // *
    //  * @brief Connects to the database using the global variables
    //  * @return PDO The object representing the connection
     
    private function connect()
    { 
        try
        {
           $pdo = new PDO('mysql:host=localhost;dbname=mobiflow', $this->user, $this->pass);
        }        
        catch(Exception $e)
        {
                echo 'Une erreur est survenue !';
                die();
        }
        return $pdo;
    }

	public function signUp($myJSON) {

        $myObj = json_decode($myJSON);
        $username = $myObj->{'username'};
        $email = $myObj->{'email'};
        $password = $myObj->{'password'};

        $_db = $this->connect();
        
        $stmt = $_db->prepare("SELECT * FROM user WHERE username = :username");

        print_r($stmt);
        $stmt->execute(array('username' => $username));
        if($stmt->fetch()){
            $outputJSON = '{ "result":"fail", "errors":"Username already registered" }';
            return json_encode($outputJSON);
        }

        $stmt = $_db->prepare("SELECT * FROM user WHERE email_addr = :email");

        $stmt->execute(array('email' => $email));
        if($stmt->fetch()){
            $outputJSON = '{ "result":"fail", "errors":"Email address already registered" }';
            return json_encode($outputJSON);
        }

        if( strlen($password) < 5 ){
            $outputJSON = '{ "result":"fail", "errors":"Password too short" }';
            return json_encode($outputJSON);
        }

        $stmt = $_db->prepare("INSERT INTO user (username, email_addr, password) VALUES (:username, :email_addr, :password)");
        
        if($stmt->execute(array("username" => $username, "email_addr" => $email_addr, "password" => $password))){
            $output = '{ "result" : "ok"}';
            return json_encode($output);
        }

        $output = '{ "result" : "fail", "errors" : "insertion failed"}';
        return json_encode($output);
  }

     
  public function signIn($myJSON)
  {
        $myObj = json_decode($myJSON);
        $login = $myObj->{'username'};
        $password = $myObj->{'password'};

        $_db = $this->connect();

        $stmt = $_db->prepare("SELECT * FROM user WHERE ( username = :login AND password = :pass)");
        $stmt->execute(array("login" => $login, "pass" => $password));
        if( $stmt->fetch() ){
            $outputJSON = '{ "result":"ok" }';
        }
        else{
            $outputJSON = '{ "result":"fail", "errors" : "login and/or password failed" }';
        }

        return json_encode($outputJSON);
       
    
    }

    public function demandHandicap($id){
     //TODO
    }

    public function Modify_Password($myJSON) {
        
        $myObj = json_decode($myJSON);
        $id = $myObj->{'id'};
        $password = $myObj->{'password'};
        $newPassword = $myObj->{'new_pass'};

        $_db = $this->connect();

        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id AND password =:password");

        $stmt->execute(array('id' => $id, 'password' => $password));

        if( $stmt->fetch() ){
            $update = $_db->prepare("UPDATE user SET password = :new_password WHERE id = :id"  );
            
            if($update->execute(array('id' => $id, 'new_password' => $newPassword))){
                $outputJSON = '{ "result":"ok" }';                
            }
            else{
                $outputJSON = '{"result" : "fail", "errors" : "Password not valid"}';
            }
        }
        else{
            $outputJSON = '{ "result":"fail", "errors" : "login and/or password failed" }';
        }

        return json_encode($outputJSON);

    }

}

 //    public function modifyUsername($myJSON)
 //    {
 //        $myObj = json_decode($myJSON);
 //        $id = $myObj->{'id'};
 //        $password = $myObj->{'password'};
 //        $new_username = $myObj->{'new_username'};

 //        $_db = connect();

 //        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id");
        
 //        if( $stmt->execute(array('id' => $id)) ){
 //            $update = $_db->prepare("UPDATE user SET username = :new_username");
 //            $stmt->bindParam(':new_username', $new_username); 
            
 //            if($stmt->execute()){
 //                $outputJSON = '{ "result":"ok" }';                
 //            }
 //            else{
 //                $outputJSON = '{"result" : "fail", "errors" : "Usename already valid"}';
 //            }
 //        }
 //        else{
 //            $outputJSON =  = '{ "result":"fail", "errors" : "wrong id" }';
 //        }

 //        return json_encode($outputJSON);
        
 //        // $myObj = JSON.parse(myJSON);
 //        // $id = myobj.id;
 //        // $new_username = myobj.new_username;
 //        // $pass = myobj.pass;

 //        // $_db = connect();

 //        // $sql = "SELECT * FROM user WHERE username = $new_username";
 //        // $result = $this->_db->query($sql);
 //        // if( $result->fetchColumn() == 0 ){
 //        //     $sql = "UPDATE user SET username='$new_username' WHERE username-id=$id";
 //        //     $this->_db->query($sql);
 //        //     $myObj = { 'result':'ok' };
 //        //     $myJSON = JSON.stringify($myObj);
 //        // }
 //        // else
 //        // {
 //        //     $myObj = { 'result': 'fail', 'errors':'Username already used' };
 //        //     $myJSON = JSON.stringify($myObj);
 //        // }

 //        // return $myJSON;
 //    }

 //    public function modifyDisabled($myJSON)
 //    {
 //        $myObj = json_decode($myJSON);
 //        $id = $myObj->{'id'};
 //        $password = $myObj->{'password'};
 //        $disabled = $myObj->{'disabled'};

 //        $_db = connect();

 //        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id AND password = :password");
        
 //        if( $stmt->execute(array('id' => $id, 'password' => $password)) ){
 //            $update = $_db->prepare("UPDATE user SET disabled = :disabled");
 //            $stmt->bindParam(':disabled', $disabled); 
            
 //            if($stmt->execute()){
 //                $outputJSON = '{ "result":"ok" }';                
 //            }
 //            else{
 //                $outputJSON = '{"result" : "fail", "errors" : "disabled failed"}';
 //            }
 //        }
 //        else{
 //            $outputJSON =  = '{ "result":"fail", "errors" : "wrong id" }';
 //        }
        
 //        return json_encode($outputJSON);
    
 //        // $myObj = JSON.parse(myJSON);
 //        // $id = myobj.id;
 //        // $disabled = myobj.disabled;
 //        // $pass = myobj.pass;

 //        // $_db = connect();
 //        // $sql = "SELECT * FROM user WHERE username-id=$id AND password = $pass";
 //        // $result = $this->_db->query($sql);
 //        // if( $result->fetchColumn() == 0 ) {
 //        //     $myObj = { 'result':'fail', 'errors':'Password not valid'};
 //        //     return JSON.stringify($myObj);
 //        // }
        
 //        // $sql = "UPDATE user SET disabled='$disabled' WHERE username-id=$id";
 //        // $this->_db->query($sql);
 //        // $myObj = { 'result':'ok' };
 //        // $myJSON = JSON.stringify($myObj);
 //        // return $myJSON;
 //    }
