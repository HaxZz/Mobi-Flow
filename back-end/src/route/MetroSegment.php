<?php
require_once("PublicTransportSegment.php");

class MetroSegment extends PublicTransportSegment
{
	public function toJson() {
		$str = parent::toJson();
		return $str . "'type' : 'Metro' }";
	}
}
