<?php

require_once('UserService.class.php');

$str_json = file_get_contents('php://input');

$user = "user";
$pass = "pass";

$UserService = new UserService($user, $pass);

$output = $UserService->update_profil($str_json);

echo $output;