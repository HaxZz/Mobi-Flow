<?php
	class Point
	{
		private $adress;
		private $coordinates;
		private $time;
		
		public function getAdress()
		{
			return $this->adress;
		}
		
		public function getCoordinates()
		{
			return $this->coordinates;
		}
		
		public function getTime()
		{
			return $this->time;
		}
		
		public function setAdress($nouvelleAdresse)
		{
			$this->adress = $nouvelleAdresse;
		}
		
		public function setCoordinates($nouvelleCoordonnee)
		{
			$this->coordinates = $nouvelleCoordonnee;
		}
		
		public function setTime($nouvelleHeure)
		{
			$this->time = $nouvelleHeure;
		}
	}

