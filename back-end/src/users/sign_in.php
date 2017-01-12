<?php

include_once('UserService.class.php');

$str_json = file_get_contents('php://input');

$user = "user";
$pass = "pass";

$UserService = new UserService($user,$pass);

echo $UserService->signIn($str_json);

}
