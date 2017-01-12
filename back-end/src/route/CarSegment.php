<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


class CarSegment extends AbstractSegment
{
	public function toJson() {
		return parent::toJson() . "'type' : 'Car'}";
	}
}
