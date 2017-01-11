<?php

class User
{
	private $_login;
	private $_password;

	protected $_db;


	public function __construct(PDO $db, $login, $password) 
    {
       $this->_db = $db;
       $this->_login = $login;
       $this->_password = $password;
    }

	public function Sign_up($username, $email, $password)
    {
    	mysql_select_db("Database", $db) or die(mysql_error());

    	$query = "SELECT * FROM `User` WHERE `username` = '$username'";
		$result = mysql_query($query, $db) or die($query . " - " . mysql_error());
		$nbResults = mysql_num_rows($result);

        if( $nbResults != 0 ){
        	$this->errors[] = 'Usename already registered';
        	return false;
        }

        $query = "SELECT * FROM `User` WHERE `email_addr` = '$email'";
		$result = mysql_query($query, $db) or die($query . " - " . mysql_error());
		$nbResults = mysql_num_rows($result);

        if( $nbResults != 0 ){
        	$this->errors[] = 'Email address already used';
        	return false;
        }

        if( strlen($password) < 5 ){
        	$this->errors[] = 'Password too short';
        	return false;
        }

        $query = "INSERT INTO User (username, email, password) VALUES ('$username', '$email', '$password')";
        return mysql_query($query, $db) or die($query . " - " . mysql_error());
    }

    public function Sign_in($login, $password)
    {
    	$query = "SELECT * FROM `User` WHERE `username` = '$login' OR `username` = '$login'";

    }




    protected function _checkCredentials()
    {

    }

}

?>