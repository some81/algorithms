<?php
$arr = array(7, 3, 9, 6, 5, 1, 2, 0, 8, 4);
$sortedArr = bubbleSort($arr);
print_r($sortedArr);

function bubbleSort(array $a) {
    $n = count($a) - 1;
    do {
        $swapped = false;
        for ($i = 0; $i < $n; ++$i) {
            if ($a[$i] > $a[$i + 1]) {
                $t = $a[$i];
                $a[$i] = $a[$i + 1];
                $a[$i + 1] = $t;
                $swapped = true;
            }
        }
    } while ($swapped);
    
    return $a;
}

