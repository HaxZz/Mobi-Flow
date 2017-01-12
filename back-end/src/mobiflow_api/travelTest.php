<?php
$apiUrl = "http://localhost/MOBIFLOW/back-end/src/mobiflow_api/travel.php";
$data = array(
    "beginning" => array("longitude" => 00, "latitude" => 00),
    "ending" => array("longitude" => 00, "latitude" => 00),
    "datetime_beginning" => array("date" => array("year" => "2017", "month" => "01", "day" => "20"),
                            "time" => array("hour" => "18", "minute" => "44")),
    "user-id" => 54);

$data = array('json' => json_encode($data));
echo json_encode($data);
$ch = curl_init();
# Setup request to send json via POST.
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt( $ch, CURLOPT_POST, count($data));
curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
echo $result;
