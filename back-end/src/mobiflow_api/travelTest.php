<?php
/**
 * Created by IntelliJ IDEA.
 * User: pierre
 * Date: 12/01/17
 * Time: 13:26
 */
$apiUrl = "travel.php";

$request = "{
    \"beginning\": {
        \"longitude\" : \"00\", \"latitude\" : \"00\" },
    \"ending\"  : {
        \"longitude\" : \"00\", \"latitude\" : \"00\" },
	\"datetime_departure\" :
	{
        \"date\":
		{
            \"year\" : \"2017\",
			\"month\": \"01\",
			\"day\"  : \"20\"
		},
		\"time\":
		{
            \"hour\"  : \"18\",
			\"minute\": \"44\"
		}
	},
	\"user-id\": 3
}";

$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $request
    )
);

$context = stream_context_create($opts);
$result = file_get_contents($apiUrl, false, $context);
