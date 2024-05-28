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

class Tournament
{
    public $players;
    public function __construct(){
        $this->players=[];
    }
    public function tally(string $input = "")
    {
        $st = "Team                           | MP |  W |  D |  L |  P";
        if ($input === "")
        {
            return $st;
        }
        $arr1 = explode("\n",$input);
        // $this->players = [];
        for ($x = 0; $x < sizeof($arr1); $x++)
        {
            $arr2 = explode(";",$arr1[$x]);
            for ($y = 0; $y < 2; $y++)
            {
                if ( ! $this->checkIfMember($arr2[$y])){
                    $this->players[] = [$arr2[$y],0,0,0,0,0];
                }
            }    
            $index0 = $this->findTheIndex($arr2[0]);
            $index1 = $this->findTheIndex($arr2[1]);
            if ($arr2[2]==="win"){
                $this->players[$index0][1] += 1;
                $this->players[$index0][2] += 1;
                $this->players[$index0][5] += 3;
                $this->players[$index1][1] += 1;
                $this->players[$index1][4] += 1;
            } else if ($arr2[2]==="loss"){
                $this->players[$index0][1] += 1;
                $this->players[$index0][4] += 1;
                $this->players[$index1][1] += 1;
                $this->players[$index1][2] += 1;
                $this->players[$index1][5] += 3;
                
            } else {
                $this->players[$index0][1] += 1;
                $this->players[$index0][3] += 1;
                $this->players[$index0][5] += 1;
                $this->players[$index1][1] += 1;
                $this->players[$index1][3] += 1;
                $this->players[$index1][5] += 1;
            }
        }
        for ($i=0; $i < sizeof($this->players) -1; $i++) { 
            for ($j=0; $j < sizeof($this->players) -$i -1; $j++) { 
                if ($this->players[$j+1][5] > $this->players[$j][5]){
                    $temp = $this->players[$j];
                    $this->players[$j] = $this->players[$j+1];
                    $this->players[$j+1] = $temp; 
                } else if ($this->players[$j+1][5] === $this->players[$j][5]){
                    if (ord($this->players[$j+1][0]) < ord($this->players[$j][0])){
                        $temp = $this->players[$j];
                        $this->players[$j] = $this->players[$j+1];
                        $this->players[$j+1] = $temp; 
                    }
                }
            }
        }
        foreach ($this->players as $key => $value) {
            $val0 = (string) $value[0];
            $val1 = (string) $value[1];
            $val2 = (string) $value[2];
            $val3 = (string) $value[3];
            $val4 = (string) $value[4];
            $val5 = (string) $value[5];
            $st = $st . "\n$val0". str_repeat(" ",(31-strlen($val0))) ."|  " . $val1 ." |  " . $val2 ." |  " . $val3 ." |  " . $val4 ." |  " . $val5;
        }
        return $st;
    }
    
    public function findTheIndex(string $st){
        for ($x = 0; $x < sizeof($this->players); $x++)
        {
            if ($this->players[$x][0] === $st){
                return $x;
            }
        }

    }
    public function checkIfMember(string $st)
    {
        $flag = 0;
        for ($x = 0; $x < sizeof($this->players); $x++)
        {
            if ($this->players[$x][0] === $st){
                $flag =1;
            }
        }
        if ($flag === 0){
            return false;
        }
        return true;
    }
}
