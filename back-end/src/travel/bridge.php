<?php

	require_once("functions.inc.php");
	require_once("Point.php");
	require_once("Coordinates.php");
	require_once("InfoTransport.php");
	require_once("Path.php");
	require_once("Journey.php");
	
	$input = file_get_contents('php://input');

		$data = $input;
		
		//Requete
		$resultat_requete = requete($data);
		$voyages          = recuperer_voyages($resultat_requete);
header('Content-type: application/json');
echo json_encode($voyages);
