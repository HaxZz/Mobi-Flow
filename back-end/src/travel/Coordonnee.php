<?php
	class Coordonnee
	{
		public $longitude;
		public $latitude;
		
		public function getLatitude()
		{
			return $this->latitude;
		}
		
		public function getLongitude()
		{
			return $this->longitude;
		}
		
		public function setLatitude($nouvelleLatitude)
		{
			$this->latitude = $nouvelleLatitude;
		}
		
		public function setLongitude($nouvelleLongitude)
		{
			$this->longitude = $nouvelleLongitude;
		}
	}
?>