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

header('Content-Type: text/html; charset=utf-8');
 

function isChar(string $input){
    if (ord($input) >= ord("A") && ord($input) <= ord("Z")) {
        return true;
    } 
    if (ord($input) >= ord("a") && ord($input) <= ord("z")) {
        return true;
    } 
    return false;
}

function isSeperator(string $input){
    if (in_array($input,[" ","\n","\t","-"])) {
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

function isCharUpper($input){
    if (ord($input) >= ord("A") && ord($input) <= ord("Z")) {
        return true;
    }
    return false;
}
function isCharLower($input){
    if (ord($input) >= ord("a") && ord($input) <= ord("z")) {
        return true;
    }
    return false;
}
function acronym(string $text): string
{
    $st = "";
    $state = 1;
    // for ($i=0; $i < strlen($text); $i++) {
    //     // var_dump($st); 
    //     if (isCharUpper($text[$i]) && $state === 2 ) {
    //         echo "1\n";
    //         $st = $st . $text[$i];
    //         $state = 0;
    //     } elseif (isCharLower($text[$i]) && $state === 0) {
    //         echo "2\n";
    //         $state = 2;
    //     } elseif (!isSeperator($text[$i]) && $state === 1) {
    //         echo "3\n";
    //         if (isChar($text[$i])) {
    //             # code...
    //             $st = $st . strtoupper($text[$i]);
    //         } else {
    //             $st = $st . $text[$i];
    //         }
    //         $state = 0;
    //     } elseif (isSeperator($text[$i]) && ($state === 0 || $state === 2)) {
    //         echo "4\n";
    //         $state = 1;
    //     }
    // }

    $length = mb_strlen($text, 'UTF-8');
    
    for ($i = 0; $i < $length; $i++) {
        $char = mb_substr($text, $i, 1, 'UTF-8');
        echo $char;
        echo "\n";
        if (isCharUpper($char) && $state === 2 ) {
            $st = $st . $char;
            $state = 0;
        } elseif (isCharLower($char) && $state === 0) {
            $state = 2;
        } elseif (!isSeperator($char) && $state === 1) {
            $st = $st . mb_strtoupper($char);
            $state = 0;
        } elseif (isSeperator($char) && ($state === 0 || $state === 2)) {
            $state = 1;
        }

    }    
    if (strlen($st) === 1) {
        return "";
    }
    return $st;
}

acronym("Специализированная процессорная часть");