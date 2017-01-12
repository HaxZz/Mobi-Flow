<?php
//TODO noter la bonne url
$apiUrl = "";

$jsonInput = $_POST['json'];
$travelRequest = json_decode($jsonInput, true);
$userID = $travelRequest['user-id'];
unset($travelRequest['user-id']);
 //TODO requete BDD pour recuperer le handicap
$travelRequest['disability'] = "None";
$request = json_encode($travelRequest);
$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $request
    )
);
$context = stream_context_create($opts);
$result = file_get_contents($apiUrl, false, $context);
//TODO recherche si voitures dispo sinon erreur
echo $result;
