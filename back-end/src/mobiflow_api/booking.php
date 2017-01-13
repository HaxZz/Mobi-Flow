<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */

header('Access-Control-Allow-Origin: *');
require_once "../kernel.inc.php";

$jsonInput = file_get_contents('php://input');
if($jsonInput == "")
{
    echo '{"result": "fail", "errors": ["POST string is empty"]}';
    return;
}

$dataReceived = json_decode($jsonInput, true);

$userID = -1;
if(!isset($dataReceived['user-id']))
{
    echo '{"result": "fail", "errors": ["No user-id"]}';
    return;
}
if($dataReceived['user-id'] === null)
{
    echo '{"result": "fail", "errors": ["Null user-id"]}';
    return;
}
if($dataReceived['user-id'] === "")
{
    echo '{"result": "fail", "errors": ["Empty user-id"]}';
    return;
}
$userID = $dataReceived['user-id'];

$db = new PDO('mysql:host=localhost;dbname=mobiflow',
              $GLOBALS['dbuser'], $GLOBALS['dbpass']);
$sql = "INSERT INTO booking(user_id)\nVALUES(:userid)";
$stmt = $db->prepare($sql);
$stmt->bindValue(":userid", $userID);
if($stmt->execute())
{
    echo '{"result": "ok"}';
}
else
{
    echo '{"result": "fail", "errors": ["'. $stmt->errorInfo()[2] .'"]}';
}
$stmt->closeCursor();
