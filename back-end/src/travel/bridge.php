<?php
	require_once("functions.inc.php");
	require_once("Point.php");
	require_once("Coordonnee.php");
	require_once("InfoTransport.php");
	require_once("Trajet.php");
	require_once("Voyage.php");
	
	//Wheelchair=true;
	
	if(isset($_POST['DATA'])) //1==1)//
	{
		//$data = "";
		$data = $_POST['DATA'];
		
		//Requete
		$resultat_requete = requete($data);
		$voyages          = recuperer_voyages($resultat_requete);
		echo json_encode($voyages);
	}
	else
	{
		echo "{}";
	}
	
?>