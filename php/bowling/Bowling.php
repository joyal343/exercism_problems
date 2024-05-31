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
    public $frame_list = [];
    public function score(): int
    {
        $frame_list = $this->frame_list;
        // var_dump($frame_list);
        echo sizeof($frame_list);
        if (sizeof($frame_list) < 10) {
            throw new InvalidArgumentException("Incorrect Input");
        }
        // echo "\nNEW\n";
        // var_dump($frame_list[10]);
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
            // echo "\nNEXT\n";
            // var_dump($frame);
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
                $score += $frame_list[$i + 1][0];  
            } else {
                $score +=  $frame[0] + $frame[1];
            }
        }
        if ($frame_list[10][0] === 10) {
            $score += 10 + $frame[10][1] + $frame_list[10][2];
        } elseif( $frame_list[10][0] +$frame_list[10][1] === 10 ){
            $score += 10 + $frame_list[10][2];
        } else {
            $score += $frame_list[10][0] +$frame_list[10][1];
        }
        return $score;
    }

    public function roll(int $pins): void
    {
        static $end = false;
        static $frame = 1;
        static $throws = 0;
        static $sum = 0;
        if ($frame === 10) {
            if ($end === false) {
                $this->frame_list[$frame] = [$pins];
                $end = true;
            } else {
                $this->frame_list[$frame][] = $pins;
                
            }
        } else {
            if ($throws === 0) {
                if ($pins === 10) {
                    $this->frame_list[$frame] = [10];
                    if ($sum !== 0) {
                        throw new Exception("Invalid Input");
                    }
                    $frame++;
                } else {
                    $this->frame_list[$frame] = [$pins];
                    $sum += $pins;
                    $throws++;
                }
            } elseif ($throws === 1){
                $this->frame_list[$frame][] = $pins;
                $sum += $pins;
                if ($sum > 10) {
                    throw new Exception("Invalid Input");
                }
                $sum = 0;
                $throws = 0;
                $frame++; 
            } 
        }
    }
}
$game = new Game();
$game->roll(6);
$game->roll(4);
// $game->roll(3);
// $game->roll(6);
// // frame 1
// $game->roll(3);
// $game->roll(6);
// // frame 2
// $game->roll(3);
// $game->roll(6);
// // frame 3
// $game->roll(3);
// $game->roll(6);
// // frame 4
// $game->roll(3);
// $game->roll(6);
// // frame 5
// $game->roll(3);
// $game->roll(6);
// // frame 6
// $game->roll(3);
// $game->roll(6);
// // frame 7
// $game->roll(3);
// $game->roll(6);
// // frame 8
// $game->roll(3);
// $game->roll(6);
// // frame 9
// $game->roll(3);
// $game->roll(6);
// frame 10
// echo $game->score();
// for ($i=0; $i < 18; $i++) { 
//     $game->roll(0);
// }
// $game->roll(7);
// $game->roll(3);rollMany

for ($i = 0; $i < 18; $i++) {
    $game->roll(0);
}
echo $game->score();
