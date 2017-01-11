<?php
require_once("Point.php");

/**
 * @brief An Abstract Segment is a small route using one Transportation mean 
 *        such as a Bus or a car
 */
abstract class Segment
{

    protected $beginningTime;
    protected $endingTime;
    protected $beginningPosition;
    protected $endingPosition;

    protected $pathPositions;

    /**
     * @brief the Beginning location of the segment
     * @var Point
     */
    protected $beginning;
    
    /**
     * @brief The ending location of the segment
     * @var Point
     */
    protected $ending;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function toJson(){
        return "{ 'beginningPosition : '$beginningPosition', 'endingPosition' : '$endingPosition',"
            . "'beginningTime' : '$beginningTime', 'endingTime' : '$endingTime',";
    }

}
