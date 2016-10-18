<?php

function array_dup($ar){
   return array_unique(array_diff_assoc($ar,array_unique($ar)));
}

$arr = array(1,2,3,4,5,5,5,6,7,8,8);
print_r(array_dup($arr));

$dups = array();
foreach(array_count_values($arr) as $val => $c)
    if($c > 1) $dups[] = $val;

print_r($dups);

$arr = array(3,5,2,5,3,9);
foreach($arr as $key => $val){
  //remove the item from the array in order 
  //to prevent printing duplicates twice
  unset($arr[$key]); 
  //now if another copy of this key still exists in the array 
  //print it since it's a dup
  if (in_array($val,$arr)){
    echo $val . " ";
  }
}

$array = array('apple', 'orange', 'pear', 'banana', 'apple',
   'pear', 'kiwi', 'kiwi', 'kiwi');
$new_array = array();
foreach ($array as $key => $value) {
    if(isset($new_array[$value]))
    	$new_array[$value] += 1;
    else
    	$new_array[$value] = 1;
}
foreach ($new_array as $fruit => $n) {
    echo $fruit;
    if($n > 1)
    	echo "($n)";
    echo "<br />";
}