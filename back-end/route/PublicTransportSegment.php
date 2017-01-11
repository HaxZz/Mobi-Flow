<?php
require_once "Segment.php";
class PublicTransportSegment extends Segment
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

}
