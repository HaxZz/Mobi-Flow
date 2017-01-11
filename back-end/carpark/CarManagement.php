<?php
require_once("Car.php");
require_once ("../route/AutonomousCarSegment.php");
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

}
