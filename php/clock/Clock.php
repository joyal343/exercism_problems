<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Clock
{
    public $min;
    public $hr;
    public function __construct($hr=0, $min=0){
        $this->hr = 0;
        $this->min = 0;
        $this->add($hr*60);
        $this->add($min);

    }
    public function __toString(): string
    {
        $res = "";
        if ($this->hr < 10) {
            $res = $res . "0" . $this->hr . ":";

        } else {
            $res = $res . $this->hr . ":";        
        }
        if ($this->min < 10) {
            $res = $res . "0" . (string)$this->min;
        } else {
            $res = $res . (string)$this->min;        
        }
        return $res;
    }
    public function add(int $num){
        if ($num < 0) {
            return $this->sub(-1 * $num);
        }
        $sum =  $this->min + $num;
        if ($sum >= 60) {
            $this->hr =( $this->hr + floor($sum /60 ) )% 24 ;
            $this->min = $sum % 60 ;
        } else {
            $this->min = $sum;
        }
        return $this;
    }
    public function sub(int $minutesToSubtract){
        if ($minutesToSubtract < 0) {
            return $this->add($minutesToSubtract * -1);
        }

        $totalMinutes = $this->hr * 60 + $this->min;
        // Subtract the given minutes
        $totalMinutes -= $minutesToSubtract;
        
        // Handle negative totalMinutes by wrapping around
        if ($totalMinutes < 0) {
            $totalMinutes = $totalMinutes * -1;
            $totalMinutes = 1440 - ($totalMinutes % 1440); // 1440 is the total minutes in a day
        }
        
        // Convert back to hours and minutes
        $this->hr = (int)($totalMinutes / 60) % 24;
        $this->min = $totalMinutes % 60;

        return $this;
    }
}
$clock = new Clock(-121,-5810);
var_dump($clock->__toString());
