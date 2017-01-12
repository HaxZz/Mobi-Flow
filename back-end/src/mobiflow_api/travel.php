<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


require_once("../users/UserService.class.php");

$jsonInput = file_get_contents('php://input');
$apiUrl = "http://haxz.freeboxos.fr/MOBIFLOW/back-end/src/travel/bridge.php";
//$jsonInput = $_POST["json"];
$travelRequest = json_decode($jsonInput, true);
$userID = $travelRequest['user-id'];
unset($travelRequest['user-id']);
$db = new UserService("user", "pass");
$travelRequest['disability'] = $db->demandHandicap('user-id');
$request = json_encode($travelRequest);

$ch = curl_init();
# Setup request to send json via POST.
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Print response.
echo $result;
