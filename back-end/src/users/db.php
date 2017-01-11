<?php

$user = 'user';
$pass = 'pass';

/**
 * @brief Connects to the database using the global variables
 * @return PDO The object representing the connection
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

    $sql = "INSERT INTO mabite";

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

	 
//modify pass, modify mail
