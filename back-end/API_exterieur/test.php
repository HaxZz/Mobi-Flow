<?php

	include('API_exterieur.php');

	echo "avant instanciation\n";

	$request = new Request("A","B");

	$request->addTimeDeparture("12h");

	$request->addTimEnd("17h");

	$request->findPaths();

	$request->toString();

	echo"\n\n";

	$API = new API_exterieur();

	$API->travel("C","D");

	$API->toString();
	
	echo "apres instanciation\n";

?>