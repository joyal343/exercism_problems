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

class Robot
{
    public $flag = 0;
    public $name;
    public function generateRandomString() {
        $length = 2;
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function generateRandomNumber() {
        $length = 3;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function getName(): string
    {
        static $name_array = [];
        if ($this->flag == 0) {
            // if ($this->name_array === null) {
            //     $x = $this->generateRandomString();
            //     $y = $this->generateRandomNumber();
            //     static::$name_array = [];
            //     static::$name_array[] = $x . $y;
            //     $this->name = $x .$y;
            //     $this->flag = 1;
                // echo $this->name_array[0] . "\n";
            //     return $this->name;
            // }
            while ( true ) {
                $x = $this->generateRandomString();
                $y = $this->generateRandomNumber();
                if (!(in_array($x . $y,$name_array))) {
                    $this->name = $x .$y;
                    $name_array[] = $x . $y;
                    $this->flag = 1;
                    return $this->name;
                    break;
                } 
            }
        } else {
            return $this->name;
        }
    }

    public function reset(): void
    {
        $this->name = "";
        $this->flag = 0;
    }
}

$n1 = new Robot();
echo $n1->getName() . "\n";

$n2 = new Robot();
echo $n2->getName() . "\n";