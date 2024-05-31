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

function encode(string $input): string
{
    if (strlen($input) === 0) {
        return "";
    }
    $st ="";
    $curr_letter = $input[0];
    $count = 1;
    for ($i=1; $i < strlen($input); $i++) {
        // var_dump($st); 
        if ($curr_letter === $input[$i] ) {
            $count++;
        } else {
            if ($count === 1) {
                $st = $st . $curr_letter;
            } else {
                $st = $st .(string) $count . $curr_letter;
            }
            $curr_letter = $input[$i];
            $count = 1;
        }
    }
    if ($count === 1) {
        $st = $st . $curr_letter;
    } else {
        $st = $st . (string) $count . $curr_letter;
    }
    return $st;
}

function isChar(string $input){
    if (ord($input) >= ord("A") && ord($input) <= ord("Z")) {
        return true;
    } 
    if (ord($input) >= ord("a") && ord($input) <= ord("z")) {
        return true;
    } 
    if (in_array($input,[" ","\n","\t"])) {
        return true;
    }
    return false;
}
function isNum(string $input){
    if (ord($input) >= ord("0") && ord($input) <= ord("9")) {
        return true;
    } 
    return false;
}


function decode(string $input): string
{
    $st = "";
    // char by def
    $state = 0;
    $num = "";
    for ($i=0; $i < strlen($input); $i++) { 
        if (isChar($input[$i]) && $state === 0) {
            $st = $st . $input[$i];
        } elseif (isNum($input[$i]) && $state === 0){
            $num = $num . $input[$i];
            $state = 1;
        } elseif (isNum($input[$i]) && $state === 1){
            $num = $num . $input[$i];
        } elseif (isChar($input[$i]) && $state === 1) {
            $st = $st . str_repeat($input[$i],(int) $num);
            $num = "";
            $state = 0;
        }
    }

    return $st;

}

encode('WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB');