<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


require_once("functions.inc.php");
require_once("Point.php");
require_once("Coordinates.php");
require_once("InfoTransport.php");
require_once("Path.php");
require_once("Journey.php");

$input = file_get_contents('php://input');

$data = $input;

// Requete
$resultat_requete = requete($data);

$voyages          = recuperer_voyages($resultat_requete);

header('Content-type: application/json');
echo mb_convert_encoding(json_encode($voyages), "UTF-8", "ISO-8859-2");
//echo utf8_decode_maison(json_encode($voyages));
