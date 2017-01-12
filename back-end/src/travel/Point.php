<?php
	class Point
	{
		public $adresse;
		public $coordonnee;
		public $heure;
		
		public function getAdresse()
		{
			return $this->adresse;
		}
		
		public function getCoordonnee()
		{
			return $this->coordonnee;
		}
		
		public function getHeure()
		{
			return $this->heure;
		}
		
		public function setAdresse($nouvelleAdresse)
		{
			$this->adresse = $nouvelleAdresse;
		}
		
		public function setCoordonnee($nouvelleCoordonnee)
		{
			$this->coordonnee = $nouvelleCoordonnee;
		}
		
		public function setHeure($nouvelleHeure)
		{
			$this->heure = $nouvelleHeure;
		}
	}
?>