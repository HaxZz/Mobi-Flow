<?php

	class Path
	{
		public $beginning;
	    public $fin;
        public $mode;
        public $infos;
		public $traceCoordonnees;
	
		public function getBeginning()
		{
			return $this->beginning;
		}

		public function setBeginning($nouveauDebut){
			$this->beginning = $nouveauDebut;
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
