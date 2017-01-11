<?php
require_once "Point.php";

/**
 * @brief An Abstract Segment is a small route using one Transportation mean 
 *        such as a Bus or a car
 */
abstract class Segment
{
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

    /**
     * @brief Getter beginning point
     * @return Point THe beginning point of the segment
     */
    public function getBeginning()
    {
        return $this->beginning;
    }

    /**
     * @brief Setter beginning point
     * @param Point $beginning The new beginning point
     */
    public function setBeginning(Point $beginning)
    {
        $this->beginning = $beginning;
    }

    /**
     * @brief Getter of the ending point
     * @return Point The ending point of the segment
     */
    public function getEnding()
    {
        return $this->ending;
    }

    /**
     * @brief Setter for the ending point
     * @param Point $ending The new end point of the segment
     */
    public function setEnding(Point $ending) 
    {
        $this->ending = $ending;
    }
}

?>
