<?php
	class Journey
	{
		public $trajet; //Tableau de trajets
	
		public function getTrajet()
		{
			return $this->trajet;
		}

		public function setTrajet($trajet)
		{
			$this->trajet = $trajet;
		}
		
		public function initTrajet()
		{
			$this->trajet = array();
		}
		
		public function addTrajet($traj)
		{
			array_push($this->trajet,$traj);
		}
	}
?>
