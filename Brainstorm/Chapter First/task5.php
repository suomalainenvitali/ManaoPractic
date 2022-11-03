<?php
//the number of digits in a number
$digits_count = 0;
//number
$number = 12344321;
//number *2
$number *= 2;
//copy of number value
$number_work = $number;
//is the number symmetrical
$isSymmetrical = true;

while ($number_work) {
    $digits_count++;
    $number_work = (int)($number_work / 10);
}

if ($digits_count % 2 == 0) {   
    for($i = 0; $i < $digits_count / 2; $i++) {
        if (
            (int)(($number / 10 ** ($digits_count - 1 - $i))) % 10 !=
            (int)(($number % 10 ** ($i + 1)) / 10 ** $i)
        ) {
            $isSymmetrical = false;
            break;
        }
    }
} else {
    $isSymmetrical = false;
}

if ($isSymmetrical) echo "Число 2n = $number - m-симметрично.";
else echo "Число 2n = $number - не m-симметрично.";