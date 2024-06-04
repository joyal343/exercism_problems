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
function PalindromicNumbers($num){
    $arr = [];
    for ($i=0; $i < 2 * $num + 1 ; $i++) { 
        $arr[] = $num - $i;
    }
    return $arr;
}

function diamond(string $letter): array
{
    $letter = strtoupper($letter);
    if (ord($letter) < ord("A") || ord($letter) > ord("Z")) 
        throw new InvalidArgumentException("Invalid Character was Submitted.");
        
    $spaces = ord($letter) - ord("A") ;
    if ($letter === "A") {
        return ["A"];
    }
    $total= 2*$spaces + 1;
    $st ="";
    $j = 0;
    $arr = PalindromicNumbers($spaces);
    $result = [];
    for ($i=0; $i < $total; $i++) { 
        if ($i === 0 || $i === $total -1) {
            $st = str_repeat(" ",abs($arr[$i])) ."A" . str_repeat(" ",abs($arr[$i]));
            $result[] = $st;
        } else {
            $st = str_repeat(" ",abs($arr[$i])) . chr(ord($letter) - abs($arr[$i])) . str_repeat(" ",$total - 2 - (2*abs($arr[$i]))) . chr(ord($letter) - abs($arr[$i])) . str_repeat(" ",abs($arr[$i]));
            $result[] = $st;
        }
    }
    return $result;
}
