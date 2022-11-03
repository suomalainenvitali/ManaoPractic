<?php
    //natural number;
    $number = 14567890;
    //number of digits less than 5
    $count = 0;

    while ($number) {
        if($number % 10 < 5) $count++;
        
        $number = (int)($number / 10);
    }

    echo "Количество цифр меньших 5 -> $count";