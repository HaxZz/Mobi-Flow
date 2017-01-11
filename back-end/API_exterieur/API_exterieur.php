<?php
include('interface.php');

class API_exterieur implements Request, Response{
	private $_request;
	private $_response;
	private $_User;

	public function travel($departure, $end){
		$_request = new Requete($departure, $end);
	}

	public function timeDeparture($timeDeparture){

	}

	public function timEnd($timEnd){}

	public function Itineraries(){} 

	public function findPaths(){
		this->$_response = new Response($_request->findPaths() );


	}
}

class Request{
	private $_departure;
	private $_end;
	private $_timeDeparture;
	private $_timEnd;

	public function Requete($departure,$end){
		this->$_departure = $departure;
		this->$_end = $end;
		this->$_timeDeparture = "";
		this->$_timEnd = "";
	}

	public function addTimeDeparture($timeDeparture){
		this->$_timeDeparture = $timeDeparture;
	}

	public function addTimEnd($timEnd){
		this->$_timEnd = $timEnd;
	}

	public function findPaths(){
		// Quel est l'objet à recevoir les parametrse ?
	}
}

class Response{

}
?>