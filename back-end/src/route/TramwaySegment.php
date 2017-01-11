<?php
require_once "PublicTransportSegment.php";

class TramwaySegment extends PublicTransportSegment
{
	public function toJson(){
		return parent::toJson() . "'type' : 'Tramway'}";
	}
}
