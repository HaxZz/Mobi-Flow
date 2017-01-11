<?php

require_once("../kernel.inc.php");

class Api_communicator {

	private $_request;
	private $_response;
	private $_User;

	public function __construct($JsonChain) {
		$chain = json_decode($JsonChain);

		$adressDeparture = $chain->{'departure'};
		
		$adressArrival = $chain->{'arrival'};

		$this->_request = new Request($adressDeparture, $adressArrival);

		$date = $chain->{'datetime-departure'}->{'date'};

		$time = $chain->{'datetime-departure'}->{'time'};

		$departureTime =  $date->{'day'}."/".$date->{'month'}."/".$date->{'year'}."-".$time->{'hour'}.":".$time->{'minute'};

		$arrivalTime = "00/00/0000-00:00";

		$this->_request->addTimeDeparture($departureTime);
		$this->_request->addTimEnd($arrivalTime);

	}
	
	public function findPaths() {
		$paths = $this->_request->findPaths();

		if(empty($paths)){
			$chain ='{"travels" : "Indeterminate"}';
			$json = json_encode($chain);
			return NULL;

		}
		else{
			//TODO
		}
	}

	public function toString() {
	 	echo $this->_request->toString();
	}
}

