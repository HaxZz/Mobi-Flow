<?php

/**
 * @brief a route defines a travelling path from point A to a point B
 *        it is a combination of multiple travelling segments covered by
 *        different transporting means
 */
class Route
{
	/**
	 * @brief a collection of segments
	 * @var A collection (List?)
	 */
	private $segments;

	/**
	 * @brief Default cosntructor from this class
	 */
	public function __construct() 
	{
        
    }

    /**
     * @brief creates this route with a given API
     * @param  APIBridge $api an api used to create the segments
     * @return None      None
     */
    public function createFromAPI($api)
    {

    }
}

?>