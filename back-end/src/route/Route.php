<?php

require_once("Point.php");
/**
 *  @brief a route defines a travelling path from point A to a point B
 *        it is a combination of multiple travelling segments covered by
 *        different transporting means
 */
class Route
{
	/**
	 * @brief a collection of segments
	 * @var An array
	 */
	private $segments;

	/**
	 * @brief the starting point of the global route
	 * @var Point
	 */
	private $beginning;

	/**
	 * @brief the ending point of the global route
	 * @var Point
	 */
	private $ending;

	/**
	 * @brief Time (schedule) when the route shall start
	 * @var Hour
	 */
	private $departureTime;

	/**
	 * @brief Time (schedule) when the user shall arrive
	 * @var Hour
	 */
	private $arrivalTime;

	/**
	 * @brief Default constructor from this class
	 */
	public function __construct() 
	{
        $this->segments = array();
    }

    /**
     * @brief creates this route with a given API
     * @param  $api the API used to compute this route
     * @return None None
     */
    public function create($api)
    {
    	$this->segments = $api->computeRoute($this->beginning, $this->ending, $this->departureTime, $this->arrivalTime);
    }
}
