<?php
var_dump(mb_ord("ß"),"UTF-8");
$st = mb_convert_encoding("Heizölrückstoßabdämpfung", 'UTF-16LE', 'UTF-8');
$arr = [];
for ($i=0; $i < strlen($st) ; $i++) { 
    $x = mb_ord($st[$i],"UTF-8");
    $arr[] = $x;
}
var_dump($arr);