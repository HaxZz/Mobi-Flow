<?php

### Input

// ```
// {
// 	'departure': 'ENSICAEN, site B, Caen 14000, France',
// 	'arrival'  : 'Le Dome, Caen 14000, France',
// 	'datetime' :
// 	{
// 		'date':
// 		{
// 			'year' : '2017',
// 			'month': '01',
// 			'day'  : '20'
// 		},
// 		'time':
// 		{
// 			'hour'  : '18'
// 			'minute': '44'
// 		}
// 	}
// }

require_once("../kernel.inc.php");

class Api_communicator implements ToRequest {
	private $_request;
	private $_response;
	private $_User;

	public function __construct($JsonChain) {
		$chain = json_decode($JsonChain);

		$adressDeparture = $chain->{'departure'};
		
		$adressArrival = $chain->{'arrival'};

		$this->travel($adressDeparture, $adressArrival);
	}
    
	public function travel($adressDeparture, $adressArrival) {
		$this->_request = new Request($adressDeparture, $adressArrival);
	}

	public function timeDeparture($timeDeparture) {
		//TODO

	}

	public function timEnd($timEnd) {
		//TODO
	}

	public function findPaths() {
		$paths = $this->_request->findPaths();
	}

	public function toString() {
	 	echo $this->_request->toString();
	}
}

// {
// 	'travels':
// 	{
// 		[
// 			{
// 				'???',
// 				disabled-friendly: 'true'
// 			},
// 			{
// 				'???',
// 				disabled-friendly: 'false'
// 			}
// 		]
// 	}
// }
