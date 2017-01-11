<?php
require_once("../kernel.inc.php");

/**
 * @brief An Abstract Segment is a small route using one Transportation mean 
 *        such as a Bus or a car
 */
abstract class Segment
{
    protected $beginning;
    protected $beginningTime;
    protected $beginningPosition;


    protected $endingTime;

    protected $endingPosition;

    protected $pathPositions;

    /**
     * @brief the Beginning location of the segment
     * @var Point
     */

    
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
