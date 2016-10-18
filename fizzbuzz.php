<?php
foreach(range(1, 100) as $number) {
    if ($number % 3 != 0 && $number % 5 != 0) {
        echo $number . '<br>';
        continue;
    }
    if ($number % 3 == 0) echo 'Fizz';
    if ($number % 5 == 0) echo 'Buzz';
    echo '<br>';
}