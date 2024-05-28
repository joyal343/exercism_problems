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

class ResistorColorTrio
{
    public function getSuffix($exp){
        echo $exp . "\n";
        if ($exp === 9 ) {
            return " gigaohms";
        } elseif ($exp / 6 >= 1 ) {
            return str_repeat("0",$exp - 6) . " megaohms";
        } elseif ($exp / 3 >= 1 ) {
            echo $exp . "in 3 \n";
            return str_repeat("0",$exp - 3) . " kiloohms";
        } else {
            return str_repeat("0",$exp) . " ohms";
        }
    }
    public function label(array $colors): string
    {
        $arr = ["black", "brown", "red", "orange", "yellow", "green", "blue", "violet", "grey", "white"];
        
        $exp = array_search($colors[2],$arr);
        $num1 = array_search($colors[0],$arr);
        $num2 = array_search($colors[1],$arr);
        if ($num2 === 0 && $num1 !== 0) {
            $exp++;
            $num = $num1;
            $suffix = $this->getSuffix($exp);
            return (string) $num . $suffix;
        } else {
            $num = 0 ;
            $y = 0;
            //  n1 = n2 = 0 and n1 = 0 handled by for loop
            for($x = 0; $x < sizeof($colors) && $y < 2;$x++){
                $num = $num * 10 + array_search($colors[$x],$arr);
                $y++;
            }
            $suffix = $this->getSuffix($exp);
            return (string) $num . $suffix;

        }
        
    }
}

