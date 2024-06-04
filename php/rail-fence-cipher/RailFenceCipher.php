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
function getNext($rails){
    static $num = - 1;
    static $state = 0;
    if ($state === 0 ) {
        $num += 1;
        if ($num === $rails - 1) {
            $state = 1;
        }
        return $num;    
    }
    if ($state ===1 ) {
        $num -= 1;
        if ($num === 0) {
            $state = 0;
        }
        return $num;
    }
    
}
function encode(string $plainMessage, int $rails): string
{
    $state = 0;
    $count = 0;
    $arr = [];
    for ($i = 0; $i < strlen($plainMessage); $i++) { 
        $state = getNext($rails);
        if (array_key_exists($state)) {
            $arr[$state][] = $plainMessage[$i]; 
        } else {
            $arr[$state] = [$plainMessage[$i]]; 
        }
        $count += 1;
    }
    $st = "";
    for ($i=0; $i < sizeof($arr); $i++) { 
        foreach($arr[$i] as $key => $value){
            $st = $st . $value;
        }
    }
    return $st;
}

function decode(string $cipherMessage, int $rails): string
{
    $state = 0;
    $count = 0;
    $arr = [];
    for ($i = 0; $i < strlen($cipherMessage); $i++) { 
        
    }
    $st = "";
    for ($i=0; $i < sizeof($arr); $i++) { 
        foreach($arr[$i] as $key => $value){
            $st = $st . $value;
        }
    }
    return $st;

}
