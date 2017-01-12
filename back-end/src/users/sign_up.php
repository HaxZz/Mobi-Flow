<?php

include_once('UserService.class.php');

$str_json = file_get_contents('php://input');

$parameters_user = json_decode($str_json);

$username = $parameters_user['username'];

// if( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
// 	$UserService = new UserService('user','pass');

// 	$output = $UserService->
}
