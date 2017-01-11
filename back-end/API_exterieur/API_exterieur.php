<?php

interface ToRequest{
	public function travel($departure, $end);

	public function timeDeparture($timeDeparture);

	public function timEnd($timEnd);
}


interface ToResponse{
	public function Itineraries();
}

class Request{

	private $_departure;
	private $_end;
	private $_timeDeparture;
	private $_timEnd;

	public function __construct($departure,$end){
		$this->_departure = $departure;
		$this->_end = $end;
		$this->_timeDeparture = "";
		$this->_timEnd = "";

	}

	public function addTimeDeparture($timeDeparture){
		$this->_timeDeparture = $timeDeparture;
	}

	public function addTimEnd($timEnd){
		$this->_timEnd = $timEnd;
	}

	public function findPaths(){
		// Recuperer les API potentiels pour la requete
		
		// Quel est l'objet à recevoir les parametrse ? -> cf route.php
		// 
		echo "methode findPaths pas fini";
	}

	public function toString(){
		echo $this->_departure + "\n";
		echo $this->_end + "\n";
		echo $this->_timEnd + "\n";
		echo $this->_timeDeparture + "\n";
	}

}

class Response{
	private $_pathList;

	public function __construct($list){
		$this->_pathList = $list;
	}

	public function toString(){
		echo $this->_pathList + "\n";
	}
}

class API_exterieur implements ToRequest, ToResponse{
	private $_request;
	private $_response;
	private $_User;

	public function travel($departure, $end){
		$this->_request = new Request($departure, $end);
	}

	public function timeDeparture($timeDeparture){
		
	}

	public function timEnd($timEnd){}

	public function Itineraries(){} 

	public function findPaths(){
		$this->_response = new Response( $this->_request->findPaths() );


	}

	public function toString(){
		echo $this->_request->toString() + "\n";
		// echo $this->_response->toString() + "\n";
	}
}

?>