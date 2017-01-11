<?php

	require_once "../route/Segment.php";

	/**
	 * @brief Defines the behavior of any interface we will use to compute a route
	 */
	interface APIBridge
	{
		/**
		 * @brief Computes a route composed of mini-segments
		 * @param  Point $beginning     The beginning location of the route
		 * @param  Point $ending        The ending location of the route
		 * @param  Hour  $departureTime The time when the travel starts
		 * @param  Hour  $arrivalTime   The time when the travel ends
		 * @return Array                An array of segments (See Segment class)
		 */
		public function computeRoute($beginning, $ending, $departureTime, $arrivalTime);
	}
?>
