<?php

$array = array(1, 2, 3, 4, -5, 6, 7, 8);

$count_before_negative = 0;

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] < 0) break;

    $count_before_negative++;
}

$last_negative_index;

for ($i = count($array) - 1; $i >= 0; $i--) {
    if ($array[$i] < 0) {
        $last_negative_index = $i;
        break;
    }
}

$summary = 0;

if(!empty($last_negative_index)) {
    if(!($last_negative_index % 2)) {
        $last_negative_index++;
    }

    $last_negative_index++;

    for($i = $last_negative_index; $i < count($array); $i += 2) {
        $summary += $array[$i];
    }
}

print_r("Количество элементов до первого отрицательного: $count_before_negative \n");
print_r("Cумма нечетных после последнего отрицательного: $summary \n");