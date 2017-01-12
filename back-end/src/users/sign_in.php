<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


include_once('UserService.class.php');

$str_json = file_get_contents('php://input');

$user = "user";
$pass = "pass";

$UserService = new UserService($user, $pass);

echo $UserService->signIn($str_json);

