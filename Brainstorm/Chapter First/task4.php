<?php
//number values
$numbers = array(0, 2, 3, 7);
//start range
$start = 2037;
//end range
$end = 7320;

for($i = $start; $i <= $end; $i++) {
    if (isDigitsRepeat($i)) continue;

    $fourth = (int)(($i % 100) % 10);
    $third = (int)(($i % 100) / 10);
    $second = (int)(($i % 1000) / 100);
    $first = (int)($i / 1000);

    if(
        inArray($first, $numbers) &&
        inArray($second, $numbers) &&
        inArray($third, $numbers) &&
        inArray($fourth, $numbers) 
    ) echo $i . "\n";
}

//check for repetition of digits in a number
function isDigitsRepeat($value){
    $digits = [];    

    do {
        $digit = $value % 10;

        if (inArray($digit, $digits)) return true;

        $digits[] = $digit;
        $value = (int)($value / 10);

    } while($value);

    return false;
}

//checking a digit in an array
function inArray($value, $array)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($value == $array[$i]) {
            return true;
        }
    }
    return false;
}