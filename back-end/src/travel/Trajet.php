<?php

	class Trajet 
	{
		public $debut;
	    public $fin;
        public $mode;
        public $infos;
		public $traceCoordonnees;
	
		public function getDebut()
		{
			return $this->debut;
		}

		public function setDebut($nouveauDebut){
			$this->debut = $nouveauDebut;
		}

		public function getFin(){
			return $this->fin;
		}

		public function setFin($nouvelleFin){
			$this->fin = $nouvelleFin;
		}

		public function getMode(){
			return $this->mode;
		}

		public function setMode($nouveauMode){
			$this->mode = $nouveauMode;
		}

		public function getInfos(){
			return $this->infos;
		}

		public function setInfos($nouvellesInfos){
			$this->infos = $nouvellesInfos;
		}
		
		public function getTraceCoordonnees(){
			return $this->traceCoordonnees;
		}

		public function initTraceCoordonnees()
		{
			$this->traceCoordonnees = array();
		}
		
		public function ajouterTraceCoordonnees($coordonnee){
			array_push($this->traceCoordonnees, $coordonnee);
		}
	}

?>