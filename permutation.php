<?php
$var = $x = 166;
// $y = ($x+1)/2;
// while($y<$x){
//     $x=$y; 
//     echo $y = ($x+$var/$x)/2; //((83.51+166)/166)/2
//     echo '<br>';
// }
// echo $x;


// for($i=0;$i<=$var;$i=$i+0.01){ 
//     $num = $i * $i;
//     print_r(round($num,2)); echo '<br>';
//     if($num == $var){
//         print_r($i);
//         exit;
//     }
// }

// function to generate and print all N! permutations of $str. (N = strlen($str)).
function permute($str,$start,$end) {
   if ($start == $end)
       print "$str\n";
   else {
        for ($j = $start; $j < $end; $j++) {
          swap($str,$start,$j);
          permute($str, $start+1, $end);
          swap($str,$start,$j); // backtrack.
       }
   }
}

// function to swap the char at pos $i and $j of $str.
function swap(&$str,$i,$j) { 
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp; 
}   

$str = "abcg";
permute($str,0,strlen($str)); // call the function.

