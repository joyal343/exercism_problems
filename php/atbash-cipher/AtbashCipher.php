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

function isChar(string $input){
    // if (ord($input) >= ord("A") && ord($input) <= ord("Z")) {
    //     return true;
    // } 
    if (ord($input) >= ord("a") && ord($input) <= ord("z")) {
        return true;
    } 
    return false;
}
function isSeperator(string $input){
    if (in_array($input,[" ","\n","\t", "," ,".","'","!","?"])) {
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
function encode(string $text): string
{
    $arr = [];
    $st = "abcdefghijklmnopqrstuvwxyz";
    $j = 25;
    for ($i=0; $i < 26; $i++) { 
        $arr[$st[$i]] = $st[$j];
        $j--;
    }
    $text = strtolower($text);
    $encoded_string = "";
    $count = 0;
    for ($i=0; $i < strlen($text); $i++) { 
        if (isSeperator($text[$i])) {
            ;
        } elseif (isChar($text[$i]) ) {
            $count++;
            $encoded_string = $encoded_string . $arr[$text[$i]];
            if ($count === 5 ) {
                $encoded_string = $encoded_string . " ";
                $count = 0;
            }
        } elseif ( isNum($text[$i])) {
            $count++;
            $encoded_string = $encoded_string . $text[$i];
            if ($count === 5) {
                $encoded_string = $encoded_string . " ";
                $count = 0;
            }
            
        } else {
            throw new InvalidArgumentException("Unidentified Input - Input not in a -z or whitespace");
        }
    }
    $encoded_string = trim($encoded_string);
    return $encoded_string;
}
