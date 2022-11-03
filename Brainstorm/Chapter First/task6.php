<?php 
//first number
$number_first = 165;
//second number
$number_second = 45;

while ($number_first != 0 && $number_second != 0) {
    if ($number_first > $number_second) {
        $number_first = $number_first % $number_second;
    } else {
        $number_second = $number_second % $number_first;
    }
}

echo "Наибольший общий делитель " . ($number_first + $number_second); 