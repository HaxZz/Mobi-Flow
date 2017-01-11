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

    public function setBeginning($beginning)
    {
        $this->beginning = $beginning;
    }

    public function getEnding()
    {
        return $this->ending;
    }

    public function setEnding($ending) {
        $this->ending = $ending;
    }

}
