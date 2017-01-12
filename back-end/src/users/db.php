<?php

include_once("UserServiceQuentin.php");

$user = "user";
$pass = "pass";

$UserService = new UserService($user,$pass);

echo "Test enregistrement <br>";

$json = '{"username": "toto1",
	"email"   : "toto@addr.tld",
	"password": "totopass1"}';

echo $json;

$output = $UserService->signUp($json);

echo json_decode($output);

echo "<br>Test connexion <br>";

$output = $UserService->signIn($json);

echo json_decode($output);

echo "<br>Test connexion longin faux <br>";

$json = '{"username": "toto",
	"email"   : "toto@addr.tld",
	"password": "totopass1"}';

$output = $UserService->signIn($json);

echo json_decode($output);
?>