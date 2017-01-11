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

?>