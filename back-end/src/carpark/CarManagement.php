<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


require_once("../kernel.inc.php");
require_once("../route/AutonomousCarSegment.php");

class CarManagement
{

    private $cars;

    public function __construct()
    {
        $this->cars = array();
    }

    public function getAvailable($segment)
    {
        foreach ($this->cars as $car) {
            if ($car->isAvailableFor($segment))
            {
                return $car;
            }
        }
        return null;
    }

    public function addCar(Car $car)
    {
        $this->cars[] = $car;
    }
}
