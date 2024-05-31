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

function detectAnagrams(string $word, array $anagrams): array
{
    $same_length_anagrams = [];
    for ($i=0; $i < sizeof($anagrams); $i++) { 
        if (strlen($anagrams[$i]) === strlen($word)) {
            if (! (strtolower($anagrams[$i]) === strtolower($word))) {
                $same_length_anagrams[] = $anagrams[$i]; 
            }
        }
    }
    
    $char_freq_arr = [];
    for ($i=0; $i < sizeof($same_length_anagrams); $i++) { 
        $char_freq_arr[] = [];
        $candidate = $same_length_anagrams[$i];
        for ($j=0; $j < strlen($candidate); $j++) {
            if (array_key_exists(strtolower($candidate[$j]),$char_freq_arr[$i])) {
                $char_freq_arr[$i][strtolower($candidate[$j])] ++;
            } else {
                $char_freq_arr[$i][strtolower($candidate[$j])] = 1;
            }
        }
    }
    $word_freq = [];
    for ($i=0; $i < strlen($word); $i++) {
        if (array_key_exists(strtolower($word[$i]),$word_freq)) {
            $word_freq[strtolower($word[$i])] ++;
        } else {
            $word_freq[strtolower($word[$i])] = 1;
        }
    }
    $anagrams =[];
    for ($i=0; $i < sizeof($char_freq_arr); $i++) {
        $flag = 0; 
        foreach ($char_freq_arr[$i] as $key => $value){
            if (array_key_exists($key,$word_freq)) {
                if ($word_freq[$key] === $value ) {
                    ;
                } else {
                    $flag = 1;
                    break;
                }
            } else {
                $flag = 1;
                break;
            }
        }
        if ($flag === 0) {
            $anagrams[] = $same_length_anagrams[$i];
        }
    }
    return $anagrams;
}
detectAnagrams('ant', ['tan', 'stand', 'at']);