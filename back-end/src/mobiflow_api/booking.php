<?php
header('Access-Control-Allow-Origin: *');
$jsonInput = $_POST['json'];
$dataReceived = json_decode($jsonInput, true);
$userID = $_POST['user-id'];
$bddData = array(
    'user-id' => $userID,
    'date' => date("d/m/Y-HH:ii")
);
//TODO requete BDD pour inserer la reservation
//TODO convenir du retour avec Spantu ( Dire 'OK' ou les errors)
echo "Ma Bite";
