<?php

	class InfoTransport
	{
		public $ligne ;
		public $direction ;
		public $stationDebut;
		public $stationFin;
		public $modeTransport;
		
		public function getLigne()
		{
			return $this->ligne;
		}

		public function setLigne($nouvelleLigne)
		{
			$this->ligne = $nouvelleLigne;
		}

		public function getDirection()
		{
			return $this->direction;
		}

		public function setDirection($nouvelleDirection)
		{
			$this->direction = $nouvelleDirection;
		}

		public function getStationDebut()
		{
			return $this->stationDebut;
		}

		public function setStationDebut($nouvelleStationDebut)
		{
			$this->stationDebut = $nouvelleStationDebut;
		}

		public function getStationFin()
		{
			return $this->stationFin;
		}

		public function setStationFin($nouvelleStationFin)
		{
			$this->stationFin = $nouvelleStationFin;
		}

		public function getModeTransport()
		{
			return $this->modeTransport;
		}

		public function setModeTransport($nouveauModeTransport)
		{
			$this->modeTransport = $nouveauModeTransport;
		}
		
	}

?>