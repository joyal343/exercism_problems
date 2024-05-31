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

class Series
{
    public $input ;
    public function isChar(string $input){
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
    public function __construct(string $input)
    {
        for ($i=0; $i < strlen($input); $i++) { 
            if ($this->isChar($input[$i])) {
                throw new InvalidArgumentException("There are characters or whitespace characters in the input");
            }
        }
        if ($input === "") {
            throw new InvalidArgumentException("Input is of size 0");
            
        }
        $this->input = $input;
    }

    public function largestProduct(int $span): int
    {
        $inp = $this->input;
        if ($span <= 0) {
            throw new InvalidArgumentException("Span is -ve");
        } elseif ($span > strlen($inp)) {
            throw new InvalidArgumentException("Span is greater than length of string");
        }
        $length = strlen($inp) - ($span - 1);
        $highest = 0;
        $prod = 1;
        for ($i=0; $i < $length; $i++) {
            // var_dump($highest); 
            for ($j=0; $j < $span; $j++) { 
                $prod *= (int) $inp[$i+$j];
            }
            if ($prod > $highest) {
                $highest = $prod;
            }
            $prod = 1;
        }
        return $highest;
    }
}

// $series = new Series("1234a5");