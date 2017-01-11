<?php
include_once('Request.php');
include_once('Api_communicator.php');

echo "avant instanciation\n";

// $request = new Request("A","B");

// $request->addTimeDeparture("12h");

// $request->addTimEnd("17h");

// $request->findPaths();

// $request->toString();

echo"\n\n";

$chainJson = '{  "departure": "ENSICAEN, site B, Caen 14000, France",
				"arrival"  : "Le Dome, Caen 14000, France",
				"datetime" :
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

$api->toString();

$baseUrl = 'http://nominatim.openstreetmap.org/search?email=geliot@ensicaen.fr&format=json&limit=1';
$name = urlencode( 'Addison, TX, US' );
$data = file_get_contents( "{$baseUrl}&q={$name}" );
$json = json_decode( $data );

var_dump( $json[0] );
var_dump( $json[0]->{'lon'} );	
	
// echo "apres instanciation\n";
