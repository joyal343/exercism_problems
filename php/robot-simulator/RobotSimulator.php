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

class Robot
{
    /**
     *
     * @var int[]
     */
    public $position;

    /**
     *
     * @var string
     */
    public $direction;
    const DIRECTION_NORTH = "north";
    const DIRECTION_SOUTH = "south";
    const DIRECTION_WEST = "west";
    const DIRECTION_EAST = "east";
    public $direction_num;
    public $direction_arr = [self::DIRECTION_NORTH,self::DIRECTION_EAST,self::DIRECTION_SOUTH,self::DIRECTION_WEST];

    
    public function __construct(array $position, string $direction)
    {
        if ($direction === "north" ) {
            $this->direction = "north";
            $this->direction_num = 0;
        } elseif ($direction === "east") {
            $this->direction = "east";
            $this->direction_num = 1;
        } elseif ($direction === "south") {
            $this->direction = "south";
            $this->direction_num = 2;
        } elseif ($direction === "west") {
            $this->direction = "west";
            $this->direction_num = 3;
        } else {
            throw new InvalidArgumentException("direction given is unexpected ");
        }
        if (sizeof($position) !== 2) {
            throw new InvalidArgumentException("size of position not 2");
        }
        $this->position = $position;
        
    }
    
    public function turnLeft(): self
    {
        $this->direction_num--;
        if ($this->direction_num < 0) {
            $this->direction_num = 3;
            $this->direction = $this->direction_arr[$this->direction_num];
        } else {
            $this->direction = $this->direction_arr[$this->direction_num];
        }
        return $this;
    }
    
    public function turnRight(): self
    {
        $this->direction_num++;
        $this->direction_num = $this->direction_num % 4;
        $this->direction = $this->direction_arr[$this->direction_num];
        return $this;
        
    }
    
    public function advance(): self
    {
        if ($this->direction === "north" ) {
            $this->position[1]++;
        } elseif ($this->direction === "east") {
            $this->position[0]++;
        } elseif ($this->direction === "south") {
            $this->position[1]--;
        } elseif ($this->direction === "west") {
            $this->position[0]--;
        }
        return $this;
    }

    public function instructions(string $instructions){
        for ($i=0; $i < strlen($instructions); $i++) { 
            if ($instructions[$i] === "L") {
                $this->turnLeft();
            } elseif ($instructions[$i] === "R") {
                $this->turnRight();
            } elseif ($instructions[$i] === "A") {
                $this->advance();
            } else {
                throw new InvalidArgumentException("Unidentified Value");
            }
        }
    }
}

