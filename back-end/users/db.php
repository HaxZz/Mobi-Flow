<?php

	$user = 'user';
	$pass = 'pass';

	/**
	 * @brief Connects to the database using the global variables
	 * @return PDO THe object representing the connection
	 */
	function connect()
	{
		global $user, $pass;

		return new PDO('mysql:host=localhost;dbname=mobiflow', $user, $pass);
	}

	/**
	 * @brief Signs a new user into the database 
	 * @param  User $user the user inserted in the database
	 * @return Success or fail       
	 */
	function signUp($user)
	{
		$pdo = connect();

		$username = 'toto'; //$user->username

		$sql = "SELECT username FROM user WHERE username ='" . $username ."'";

		$pdo = null;
	}

	/**
	 * @brief logs the given user in
	 * @param  User $user the user to be logged in
	 * @return Success or fail
	 */
	function login($user)
	{
		$pdo = connect();


		$pdo = null;
	}

	/**
	 * @brief Modifies the password of the user
	 * @param  User   $user         the user that changes his password
	 * @param  String $newPassword  the new password
	 * @return Success or fail
	 */
	function modifyPass($user, $newPassword)
	{
		$pdo = connect();


		$pdo = null;
	} 

	/**
	 * @brief Modifies the email adress of the user
	 * @param  User $user      The user modified
	 * @param  String $newMail The new email adress
	 * @return Success or fail
	 */
	function modifyMail($user, $newMail)
	{
		$pdo = connect();


		$pdo = null;
	}
?>