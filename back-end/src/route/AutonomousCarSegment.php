<?php
require_once("Segment.php");

class AutonomousCarSegment extends Segment
{
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
