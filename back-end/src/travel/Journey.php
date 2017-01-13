<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


class Journey
{
    public $trajet; // Tableau de trajets
	
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
        array_push($this->trajet, $traj);
    }
}
