<?php
$string = "Alex Todorov";

$az = function($string){
    for($i = strlen($string)-1; $i >= 0; $i--){
        echo $string[$i];
    }
};

$az($string);


function reverse($str)
{
    for ($i = 0, $j = strlen($str) - 1; $i < $j; $i++, $j--) {
        $tmp = $str[$i];
        $str[$i] = $str[$j];
        $str[$j] = $tmp;
    }

    return $str;
}

print reverse($string);

?>