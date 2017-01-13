<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


class Coordinates
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
