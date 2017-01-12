<?php

require_once("../kernel.inc.php");

if(isset($_POST['clef'])){

	$json = $_POST['clef'];

	$Api_communicator = new MobiFlowAPI($json)	;

	$json_retour = $Api_communicator->findPaths();

	if(empty($json_retour)){
		echo "il n'y a pas de chemin";
	}

	echo $json_retour;
}

