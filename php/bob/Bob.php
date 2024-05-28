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

class Bob
{
    public function respondTo(string $str): string
    {
        $str = trim($str);
        if ($str === "") {
            return "Fine. Be that way!";                
        }
        $is_question = false;
        $is_yelling = true;
        $has_alphabets = false;
        if (strlen($str)>0 && $str[strlen($str)-1] === "?") {
            $is_question = true;
        }
        for ($x=0; $x < strlen($str); $x++) { 
            if ($str[$x] === "\n") {
                return "Whatever."; 
            } 
            if ( $is_yelling && ord($str[$x]) >= 97 && ord($str[$x]) <= 122 ) {
                $is_yelling = false;
            }
            if (!$has_alphabets &&  ((ord($str[$x]) >= 97 && ord($str[$x]) <= 122 ) || (ord($str[$x]) >= 65 && ord($str[$x]) <= 90 ))) {
                $has_alphabets = true;
            }
            
        }
        if (!$is_question && !$is_yelling && $has_alphabets) {
            return "Whatever."; 
        }
        if (!$is_question && !$has_alphabets ) {
            return "Whatever."; 
        }
        if (!$is_question && $is_yelling && $has_alphabets){
            return "Whoa, chill out!";
        }
        if ($is_question && $is_yelling && $has_alphabets){
            return "Calm down, I know what I'm doing!";
        } 
        if ($is_question){
            return "Sure.";
        }
        

    }
}
