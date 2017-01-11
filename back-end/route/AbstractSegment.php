<?php
include "class.Point.php";
abstract class AbstractSegment
{
    protected $beginning;
    protected $ending;

    public function getBeginning()
    {
        return $this->beginning;
    }

    public function setBeginning(Point $beginning)
    {
        $this->beginning = $beginning;
    }

    public function getEnding()
    {
        return $this->ending;
    }

    public function setEnding(Point $ending) {
        $this->ending = $ending;
    }

}
