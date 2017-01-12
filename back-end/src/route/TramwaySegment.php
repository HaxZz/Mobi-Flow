<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


require_once("PublicTransportSegment.php");

class TramwaySegment extends PublicTransportSegment
{
	public function toJson() {
		return parent::toJson() . "'type' : 'Tramway'}";
	}
}
