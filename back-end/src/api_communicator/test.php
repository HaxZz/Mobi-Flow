<?php
require_once("../kernel.inc.php");

$chainJson = '{  "departure": "rue de villemenard 18390 Saint Germain du Puy France",
				"arrival"  : "rue raoul néron 18390 Saint Germain du Puy France",
				"datetime-departure" :
				{
					"date":
					{
						"year" : "2017",
						"month": "01",
						"day"  : "20"
					},
					"time":
					{
						"hour"  : "18",
						"minute": "44"
					}
				}
			}';

$api = new Api_communicator($chainJson);

$test = $api->findPaths();

if(empty($test)){
	echo "il n'y a pas de chemin";
}
//$api->toString();

// $baseUrl = 'http://nominatim.openstreetmap.org/search?email=geliot@ensicaen.fr&format=json&limit=1';
// $name = urlencode( 'Addison, TX, US' );
// $data = file_get_contents( "{$baseUrl}&q={$name}" );
// $json = json_decode( $data );

// var_dump( $json[0] );
// var_dump( $json[0]->{'lon'} );	
	
// echo "apres instanciation\n";
