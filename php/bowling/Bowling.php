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

class Game
{
    public $frame_list;
    public $end ;
    public $frame ;
    public $throws;
    public $sum;
    public function __construct(){
        $this->end = false;
        $this->frame = 1;
        $this->throws = 0;
        $this->sum = 0;
        $this->frame_list =[];
    }
    public function score(): int
    {
        $frame_list = $this->frame_list;
        if (sizeof($frame_list) < 10) {
            $size = count($frame_list);
            $st="";
            foreach($frame_list as $key => $value){
                $st = $st . $value[0]; 
            }
            throw new InvalidArgumentException("Incorrect Input $size  $st was size of the input!");
        }
        if (sizeof($frame_list[10]) === 1) {
            throw new InvalidArgumentException("Incorrect Input");
            
        } elseif (sizeof($frame_list[10]) === 2) {
            if ($frame_list[10][0]===10) {
                throw new InvalidArgumentException("Incorrect Input");
            } elseif ($frame_list[10][0] + $frame_list[10][1] === 10) {
                throw new InvalidArgumentException("Incorrect Input");
            }
        }
        $points = 0;
        $score = 0;
        for ($i=1; $i <= 9; $i++) { 
            $frame = $frame_list[$i];
            if ( sizeof( $frame ) === 1 ) {
                if ( $frame_list[$i + 1][0] === 10 ) {
                    $points += 20;
                    if ( $i < 9 ) {
                        $points += $frame_list[$i + 2][0];
                    } else {
                        $points += $frame_list[$i + 1][1];
                    }
                    $score += $points;
                    $points = 0;
                } else {
                    $score += 10 + $frame_list[$i + 1][0] + $frame_list[$i + 1][1];
                }
            } elseif ( $frame[0] + $frame[1] === 10) {
                $score += $frame_list[$i + 1][0] + 10;  
            } else {
                $score +=  $frame[0] + $frame[1];
            }
        }
        if (sizeof($frame_list[10]) === 3) {
            if ($frame_list[10][0] === 10) {
                if ($frame_list[10][1] < 10 ) {
                    if ($frame_list[10][1] + $frame_list[10][2] <= 10) {
                        ;
                    } else {
                        throw new Exception("if 2nd throw in 10th frame is less than 10 then max score from last 2 throws is 10");
                    }
                }
            } elseif ($frame_list[10][0] + $frame_list[10][1] === 10) {
                ;
            } else {
                throw new Exception("Without strike or spare size of 10th frame cannot be three");
            }
        }
        if ($frame_list[10][0] === 10) {
            $score += 10 + $frame_list[10][1] + $frame_list[10][2];
        } elseif( $frame_list[10][0] +$frame_list[10][1] === 10 ){
            $score += 10 + $frame_list[10][2];
        } else {
            $score += $frame_list[10][0] +$frame_list[10][1];
        }
        $this->end = false;
        $this->frame = 1;
        $this->throws = 0;
        $this->sum = 0;
        $this->frame_list =[];
        return $score;
    }

    public function roll(int $pins): void
    {
        if ($pins < 0) {
            throw new Exception("No of pins knocked down cannot be negative");
        }
        if ($this->frame === 10) {
            if ($this->end === false) {
                $this->frame_list[$this->frame] = array($pins);
                $this->end = true;
            } else {
                 
                $this->frame_list[$this->frame][] = $pins;
                if (sizeof($this->frame_list[$this->frame]) > 3) {
                    throw new Exception("Size of 10th frame cannot be more than 3");
                }
            }
        } else {
            if ($this->throws === 0) {
                if ($pins === 10) {
                    $this->frame_list[$this->frame] = [10];
                    if ($this->sum !== 0) {
                        throw new Exception("Invalid Input");
                    }
                    $this->frame++;
                } else {
                    $this->frame_list[$this->frame] = array($pins);
                    $this->sum += $pins;
                    $this->throws++;
                }
            } elseif ($this->throws === 1){
                $this->frame_list[$this->frame][] = $pins;
                $this->sum += $pins;
                if ($this->sum > 10) {
                    throw new Exception("Invalid Input");
                }
                $this->sum = 0;
                $this->throws = 0;
                $this->frame++; 
            } 
        }
    }
}
