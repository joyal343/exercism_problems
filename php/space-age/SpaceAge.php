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

class SpaceAge
{
    public $seconds;
    public function __construct(int $seconds)
    {
        if ($seconds < 0) {
            throw new InvalidArgumentException("input should be positive or 0");
            
        }
        $this->seconds = $seconds;
    }

    public function earth(): float
    {
        $age =  ($this->seconds / 31557600);
        return round($age,2);
    }

    public function mercury(): float
    {
        $age =  ($this->seconds / (31557600*0.2408467));
        return round($age,2);
    }

    public function venus(): float
    {
        $age =  ($this->seconds / (31557600*0.61519726));
        return round($age,2);
    }

    public function mars(): float
    {
        $age =  ($this->seconds / (31557600*1.8808158));
        return round($age,2);
    }

    public function jupiter(): float
    {
        $age =  ($this->seconds / (31557600*11.862615));
        return round($age,2);
    }


    public function saturn(): float
    {
        $age =  ($this->seconds / (31557600*29.447498));
        return round($age,2);
    }

    public function uranus(): float
    {
        $age =  ($this->seconds / (31557600*84.016846));
        return round($age,2);
    }

    public function neptune(): float
    {
        $age =  ($this->seconds / (31557600*164.79132));
        return round($age,2);
    }
}
