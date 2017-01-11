<?php

include_once('../route/Point.php');
include_once('../route/Route.php');

class Request {

	private $_AdressDeparture;
	private $_AdressEnd;
	private $_timeDeparture;
	private $_timEnd;

	public function __construct($departure,$end){
		$this->_AdressDeparture = $departure;
		$this->_AdressEnd = $end;
	}

	public function addTimeDeparture($timeDeparture){
		$this->_timeDeparture = $timeDeparture;
	}

	public function addTimEnd($timEnd){
		$this->_timEnd = $timEnd;
	}

	public function findPaths(){
		$baseUrl = 'http://nominatim.openstreetmap.org/search?email=geliot@ensicaen.fr&format=json&limit=1';
		$name = urlencode( $this->_AdressDeparture );
		$data = file_get_contents( "{$baseUrl}&q={$name}" );
		$json = json_decode( $data );

		if(empty($json)){
			return NULL;
		}

		$longitudeDeparture = $json[0]->{'lon'};	
		$latitudeDeparture = $json[0]->{'lat'};

		$name = urlencode( $_AdressEnd );
		$data = file_get_contents( "{$baseUrl}&q={$name}" );
		$json = json_decode( $data );

		if(empty($json)){
			return NULL;
		}

		$longitudeArrival = $json[0]->{'lon'};	
		$latitudeArrival = $json[0]->{'lat'};

		$pointDeparture = new Point($longitudeDeparture, $latitudeDeparture,$_AdressDeparture, $timeDeparture);
		$pointArrival = new Point($longitudeArrival, $latitudeArrival,$_AdressArrival, $timeArrival);

		$route = new Route();

		$route->create($pointDeparture,$pointArrival);
			

	}

	public function toString(){
		echo $this->_AdressDeparture."\n";
		echo $this->_AdressEnd."\n";
		echo $this->_timEnd."\n";
		echo $this->_timeDeparture."\n";
	}

}
