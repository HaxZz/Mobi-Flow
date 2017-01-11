<?php

class Point
{
	private $_longitude;
	private $_latitude;
	private $_adress;
	private $_time;

	public function __construct($longitude, $latitude, $adress, $time){
		$this->_longitude = $longitude;
		$this->_latitude = $latitude;
		$this->_adress = $adress;
		$this->_time = $time;
	}


}
