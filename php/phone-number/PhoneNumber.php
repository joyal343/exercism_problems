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

class PhoneNumber
{
    public $phone_number ;

    public function __construct(string $input = ""){
        if ($input === "") {
            throw new InvalidArgumentException("No Input Provided");
        }
        $st = "";
        $input = trim($input);
        for ($i=0; $i < strlen($input); $i++) { 
            if ($this->isNum($input[$i]) ) {
                $st = $st . $input[$i];
            } elseif (in_array($input[$i],[" ","-","(",")",".","\t"])) {
                ;
            } elseif ($input[$i]==="+") {
                if ($i!==0) {
                    throw new invalidArgumentException("punctuations not permitted");
                }
            }
             elseif ($this->isChar($input[$i])) {
                throw new invalidArgumentException("letters not permitted");
                
            } else {
                throw new invalidArgumentException("punctuations not permitted");
            }
        }

        if (strlen($st) <= 9) {
            throw new InvalidArgumentException("incorrect number of digits");
            
        } 
        if (strlen($st) === 11 ) {
            if ($st[0] !== "1") {
                throw new InvalidArgumentException("11 digits must start with 1");
            } else {
                $st = substr($st, 1 ,10);
                if ($st[0] === "0" ) {
                    throw new InvalidArgumentException("area code cannot start with zero");
                } elseif ($st[0]==="1") {
                    throw new InvalidArgumentException("area code cannot start with one");
                }
                if ($st[3] === "0" ) {
                    throw new InvalidArgumentException("exchange code cannot start with zero");
                } elseif ($st[3]==="1") {
                    throw new InvalidArgumentException("exchange code cannot start with one");
                }
                $this->phone_number = $st;
            }
        } 
        if (strlen($st) > 11) {
            throw new InvalidArgumentException("more than 11 digits");  
        }
        
        if ($st[0] === "0" ) {
            throw new InvalidArgumentException("area code cannot start with zero");
        } elseif ($st[0]==="1") {
            throw new InvalidArgumentException("area code cannot start with one");
        }
        if ($st[3] === "0" ) {
            throw new InvalidArgumentException("exchange code cannot start with zero");
        } elseif ($st[3]==="1") {
            throw new InvalidArgumentException("exchange code cannot start with one");
        }
        
        $this->phone_number = $st;
    }
    public function isNum($char){
        if (ord($char)>=ord("0") && ord($char)<=ord("9")) {
            return true;
        }
        return false;
    }
    public function isChar($char){
        if (ord($char)>=ord("A") && ord($char)<=ord("Z")) {
            return true;
        }
        if (ord($char)>=ord("a") && ord($char)<=ord("z")) {
            return true;
        }
        return false;
    }
    public function number(): string
    {
        return $this->phone_number;
    }
}
