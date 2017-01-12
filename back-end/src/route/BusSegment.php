<?php
require_once("PublicTransportSegment.php");

class BusSegment extends PublicTransportSegment
{
	public function toJson() {
		return parent::toJson() . "'type' : 'Bus'}";
	}
}
