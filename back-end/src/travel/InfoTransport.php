<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


	class InfoTransport
	{
		public $line ;
		public $direction ;
		public $beginningStop;
		public $endingStop;
		public $modeTransport;
		
		public function getLine()
		{
			return $this->line;
		}

		public function setLine($nouvelleLigne)
		{
			$this->line = $nouvelleLigne;
		}

		public function getDirection()
		{
			return $this->direction;
		}

		public function setDirection($nouvelleDirection)
		{
			$this->direction = $nouvelleDirection;
		}

		public function getBeginningStop()
		{
			return $this->beginningStop;
		}

		public function setBeginningStop($nouvelleStationDebut)
		{
			$this->beginningStop = $nouvelleStationDebut;
		}

		public function getEndingStop()
		{
			return $this->endingStop;
		}

		public function setEndingStop($nouvelleStationFin)
		{
			$this->endingStop = $nouvelleStationFin;
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
