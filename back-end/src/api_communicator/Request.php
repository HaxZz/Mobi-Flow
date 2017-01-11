<?php
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
		echo $this->_departure."\n";
		echo $this->_end."\n";
		echo $this->_timEnd."\n";
		echo $this->_timeDeparture."\n";
	}

}
