<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


class UserService {
    private $user, $pass;

    public function __construct($user, $pass)
    {
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
           $pdo = new PDO('mysql:host=localhost;dbname=mobiflow',
                          $this->user, $this->pass);
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
        
        if($stmt->execute(array("username" => $username, "email_addr" => $email, "password" => $password))){
            $stmt = $_db->prepare("SELECT id FROM user WHERE username = :username AND password = :password");

            $stmt->execute(array('username' => $username, 'password' => $password));

            $id = $stmt->fetch()[0];

            $output = '{ "result" : "ok", "id-user" :'.$id.' }';
            return $output;
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

        $stmt = $_db->prepare("SELECT id FROM user WHERE username = :login AND password = :pass");
        $stmt->execute(array("login" => $login, "pass" => $password));
        $id = $stmt->fetch()[0];
        if( $id ){
            
            $outputJSON = '{ "result" : "ok", "id-user" :'.$id.' }';
        }
        else{
            $outputJSON = '{ "result":"fail", "errors" : "login and/or password failed" }';
        }

        return json_encode($outputJSON);
       
    
    }

    public function demandHandicap($id)
    {
        $_db = $this->connect();
        $stmt = $_db->prepare("SELECT disabled FROM user WHERE id = :id");
        $stmt->execute(array('id' => $id));
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat['disabled'];
    }

    public function Modify_Password($myJSON)
    {
        $myObj = json_decode($myJSON);
        $id = $myObj->{'id'};
        $password = $myObj->{'password'};
        $newPassword = $myObj->{'new_pass'};

        $_db = $this->connect();

        $stmt = $_db->prepare("SELECT * FROM user ".
                              "WHERE id = :id AND password =:password");
        $stmt->execute(array('id' => $id, 'password' => $password));
        if( $stmt->fetch() )
        {
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

    public function Modify_Username($myJSON) {
        $myObj = json_decode($myJSON);
        $id = $myObj->{'id'};
        $password = $myObj->{'password'};
        $new_username = $myObj->{'new_username'};

        $_db = $this->connect();

        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id AND password = :password");

        $stmt->execute(array('id' => $id, 'password' => $password));
        
        if( $stmt->fetch() ){
            $update = $_db->prepare("UPDATE user SET username = :new_username WHERE id = :id");
            
            if($update->execute( array('id' => $id, 'new_username' => $new_username) )){
                echo $new_username;               
                $outputJSON = '{ "result":"ok" }';                
            }
            else{
                $outputJSON = '{"result" : "fail", "errors" : "Usename already valid"}';
            }
        }
        else{
            $outputJSON = '{ "result":"fail", "errors" : "wrong id" }';
        }

        return json_encode($outputJSON);     
    }

    public function Modify_Disabled($myJSON)
    {
        $myObj = json_decode($myJSON);
        $id = $myObj->{'id'};
        $password = $myObj->{'password'};
        $disabled = $myObj->{'disabled'};

        $_db = $this->connect();

        $stmt = $_db->prepare("SELECT * FROM user WHERE id = :id AND password = :password");
        $stmt->execute(array('id' => $id, 'password' => $password));

        if( $stmt->fetch() )
        {
            $update = $_db->prepare("UPDATE user SET disabled = :disabled WHERE id = :id");
            
            if($update->execute( array('id' => $id, 'disabled' => $disabled) ))
            {
                $outputJSON = '{ "result":"ok" }';                
            }
            else
            {
                $outputJSON = '{"result" : "fail", "errors" : "disabled failed"}';
            }
        }
        else
        {
            $outputJSON = '{ "result":"fail", "errors" : "wrong id" }';
        }
        
        return json_encode($outputJSON);
    }

}
