<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


require_once('UserService.class.php');
require_once  "../kernel.inc.php";

$str_json = file_get_contents('php://input');
$UserService = new UserService($GLOBALS['dbuser'], $GLOBALS['dbpass']);

echo $UserService->signIn($str_json);
