<?php

class CarSegment extends AbstractSegment
{
	public function toJson(){
		return parent::toJson() . "'type' : 'Car'}";
	}
}
