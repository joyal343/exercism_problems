<?php

class ProgramWindow
{
    public $x ;
    public $y ;
    public $width ;
    public $height ;
    function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->width = 800;
        $this->height = 600;
    }

    function resize($sizeObject)
    {
        $this->width = $sizeObject->width;
        $this->height = $sizeObject->height;
    }

    function move($positionObj)
    {
        $this->x = $positionObj->x;
        $this->y = $positionObj->y;
    }
}
