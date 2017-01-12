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

$json = '{"username": "toto1",
	"email"   : "toto@addr.tld",
	"password": "totopass1"}';

echo $json;

$output = $UserService->signIn($json);

echo json_decode($output);

echo "<br>Test connexion longin faux <br>";

$json = '{"username": "toto",
	"email"   : "toto@addr.tld",
	"password": "totopass1"}';

$output = $UserService->signIn($json);

echo json_decode($output);

echo "<br>Test connexion MDP faux <br>";

$json = '{"username": "toto1",
	"email"   : "toto@addr.tld",
	"password": "totopa"}';

$output = $UserService->signIn($json);

echo json_decode($output);

echo "<br>Test modify MDP <br>";

$json = '{"id": "47",
	"new_pass"   : "totoPASS3",
	"password": "totopass1"}';

 $output = $UserService->Modify_Password($json);

echo json_decode($output);

echo "<br>Test modify username <br>";

$json = '{"id": "47",
	"new_username"   : "TITI",
	"password": "totoPASS3"}';

 $output = $UserService->Modify_Username($json);

echo json_decode($output);

echo "<br>Test modify handicap <br>";

$json = '{"id": "47",
	"disabled"   : "None",
	"password": "totoPASS3"}';

 $output = $UserService->Modify_Username($json);

echo json_decode($output);

echo "<br>fonction handicap <br>";

$output = $UserService->demandHandicap(47);

if(empty($output)){
	echo "disabled à NULL dans la BDD";
}
else{
	echo $output;
}
?>