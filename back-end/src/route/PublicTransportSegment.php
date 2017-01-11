<?php
require_once("Segment.php");

abstract class PublicTransportSegment extends Segment
{
    protected $line;
    protected $direction;
    protected $beginningStop;
    protected $endingStop;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function toJson(){
		$str = parent::toJson();
		return $str . "'line' : '$line', 'direction' : '$direction', 'beginningStop' : '$beginningStop', 'endingStop' : '$endingStop', ";
    }

}
