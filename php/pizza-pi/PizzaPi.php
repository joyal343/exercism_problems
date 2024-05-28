<?php
class PizzaPi
{
    public function calculateDoughRequirement($pizzas , $persons)
    {
        return $pizzas * (($persons * 20) + 200);
    }
    public function calculateSauceRequirement($pizzas, $vol_can)
    {
        $sause = floor(($pizzas * 125) / $vol_can);
        return $sause ;
    }
    public function calculateCheeseCubeCoverage($length,$thickness,$diameter)
    {
        return floor(($length**3) / ($thickness * 3.14 * $diameter));
    }
    public function calculateLeftOverSlices($pizzas , $friends)
    {
        return floor(($pizzas * 8) % $friends);
    }
}