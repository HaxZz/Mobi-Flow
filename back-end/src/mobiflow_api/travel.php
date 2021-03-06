<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */
header('Access-Control-Allow-Origin: *');

require_once("../users/UserService.class.php");
require_once "../kernel.inc.php";

$jsonInput = file_get_contents('php://input');
if($jsonInput == "")
{
    echo '{"result": "fail", "errors": ["POST string is empty"]}';
    return;
}
$travelRequest = json_decode($jsonInput, true);
$userID = $travelRequest['user-id'];
unset($travelRequest['user-id']);
$db = new UserService("user", "pass");
$travelRequest['disability'] = "None"; //TODO $db->demandHandicap('user-id');
$request = json_encode($travelRequest);

$ch = curl_init();
# Setup request to send json via POST.
curl_setopt($ch, CURLOPT_URL, $GLOBALS['bridgeURL']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json; charset=utf-8'));
# Return response instead of printing.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Print response.
echo $result;
