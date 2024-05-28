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

class SimpleCipher
{
    public $key;
    
    public function __construct(string $key = null)
    {
        if ($key === ""){
            throw new InvalidArgumentException("No Empty Input");
        }
        if ($key === null){
            $str_result = str_repeat("abcdefghijklmnopqrstuvwxyz",4);
            $this->key =substr(str_shuffle($str_result), 0, 100);
        }else {
            for($x =0; $x < strlen($key);$x++)
            {
                if (ord($key[$x])>=65 && ord($key[$x])<=90){
                    throw new InvalidArgumentException("No Upper Case");
                } else if (ord($key[$x]) >= 48 && ord($key[$x]) <= 57){
                    throw new InvalidArgumentException("No Numbers");
                }
            }
            $this->key = $key;
        }
    }

    public function encode(string $plainText): string
    {
        $enc_st = "";
        for($x = 0; $x < strlen($plainText); $x++)
        {
            $change = ((ord($plainText[$x]) - ord('a')) + (ord($this->key[$x]) - ord('a'))) % 26 ;
            $letter = chr(ord('a') + $change);
            $enc_st = $enc_st . $letter;
        }
        return $enc_st;
    }

    public function decode(string $cipherText): string
    {
        $denc_st = "";
        for($x = 0; $x < strlen($cipherText); $x++)
        {
            $change = ((ord($cipherText[$x]) - ord('a')) - (ord($this->key[$x]) - ord('a'))) % 26 ;
            if ($change < 0){
                $change = $change + 26;
            }
            $letter = chr(ord('a') + $change);
            $denc_st = $denc_st . $letter;
        }
        return $denc_st;
    }
}
