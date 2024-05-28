<?php

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        $num1 =0;
        for ($x =0; $x < sizeof($digitsOfNumber1); $x++){
            $num1 = $num1 * 10 + $digitsOfNumber1[$x];
        }
        $num2 =0;
        for ($x =0; $x < sizeof($digitsOfNumber2); $x++){
            $num2 = $num2 * 10 + $digitsOfNumber2[$x];
        }
        return $num1 + $num2;
    }

    public function isPalindrome(int $number): bool
    {
        $temp = (string) $number;
        $temp2 = strrev($temp);
        return $temp === $temp2;
    }

    public function validate(string $input): string
    {
        if (strlen($input) === 0){
            return "Required field";
        }
        else if ((int)$input<= 0){
            return "Must be a whole number larger than 0";
        }
        else {
            return "";
        }
    }
}
