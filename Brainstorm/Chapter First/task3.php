<?php
    for($i = 1234; $i <= 9876; $i += 2) {
        $fourth = (int)(($i % 100) % 10);
        $third = (int)(($i % 100) / 10);
        $second = (int)(($i % 1000) / 100);
        $first = (int)($i / 1000);

        if (
            ($first > $second && $second > $third && $third > $fourth) ||
            ($first < $second && $second < $third && $third < $fourth)
        ) {
            echo $i . "\n";
        }
    }