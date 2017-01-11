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

include_once("Interface.php");

class Api_communicator implements ToRequest{
	private $_request;
	private $_response;
	private $_User;

	public function __construct($JsonChain){
		$chain = json_decode($JsonChain);

		$departure = $chain->{'departure'};
		
		$arrival = $chain->{'arrival'};

		$this->travel($departure, $arrival);
	}

	public function travel($departure, $arrival){
		$this->_request = new Request($departure, $arrival);
	}

	public function timeDeparture($timeDeparture){

	}

	public function timEnd($timEnd){}

	public function Itineraries(){} 

	// public function findPaths(){
	// 	$this->_response = new Response( $this->_request->findPaths() );


	// }

	public function toString(){
	 	echo $this->_request->toString();
	// 	// echo $this->_response->toString() + "\n";
	}
}
