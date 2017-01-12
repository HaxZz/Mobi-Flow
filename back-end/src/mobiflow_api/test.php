<?php
require_once("../kernel.inc.php");

// $chainJson = '{  "departure": "rue de villemenard 18390 Saint Germain du Puy France",
// 				"arrival"  : "rue raoul néron 18390 Saint Germain du Puy France",
// 				"datetime-departure" :
// 				{
// 					"date":
// 					{
// 						"year" : "2017",
// 						"month": "01",
// 						"day"  : "20"
// 					},
// 					"time":
// 					{
// 						"hour"  : "18",
// 						"minute": "44"
// 					}
// 				}
// 			}';

// $api = new Api_communicator($chainJson);

// $test = $api->findPaths();

// if(empty($test)){
// 	echo "il n'y a pas de chemin";
// }


//$api->toString();

// $baseUrl = 'http://nominatim.openstreetmap.org/search?email=geliot@ensicaen.fr&format=json&limit=1';
// $name = urlencode( 'Addison, TX, US' );
// $data = file_get_contents( "{$baseUrl}&q={$name}" );
// $json = json_decode( $data );

// var_dump( $json[0] );
// var_dump( $json[0]->{'lon'} );	
	
// echo "apres instanciation\n";

$_POST['clef'] = '{  "departure": "bourges france",
				"arrival"  : "tours france",
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

include('data_front_end.php');

echo "==========================";

$_POST['clef'] = '{  "departure": "rue de sarrebourg bourges france",
				"arrival"  : "boulevard du maréchal juin tours france",
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

include('data_front_end.php');

echo "==========================";

$_POST['clef'] = '{  "departure": " 8 Rue de Sarrebourg, 18000 Bourges",
				"arrival"  : "19 Rue Jean Girard, 18000 Bourges",
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

include('data_front_end.php');