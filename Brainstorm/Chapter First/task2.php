<?php
    //natural number;
    $number = 1456789;
    //ascending sequence
    $isAscending = true;
    //initial state;
    $state = 10;

    while ($number) {
        if ($number % 10 >= $state) {
            $isAscending = false;
            break;
        }

        $state = $number % 10;
        $number = (int)($number / 10);
    }

    if ($isAscending) echo "Последовательность возрастающая";
    else echo "Последовательность не возрастающая";
