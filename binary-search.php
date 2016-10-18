<?php
ini_set('display_error',true);
/**
 * Recursive binary search
 *
 * @param int $x The target integer to search
 * @param array $list The sorted array
 * @param array $left First index of the array to be searched
 * @param array $right Last index of the array to be searched
 * @return int The index of the search key if found, otherwise -1 
 */
function binary_search($x, $list, $left, $right) {
    if ($left > $right) {
        return -1;
    }	
 
    $mid = ($left + $right)/2;
    
    if ($list[$mid] == $x) {
        return $mid;
    } elseif ($list[$mid] > $x) {
        return binary_search($x, $list, $left, $mid - 1);
    } elseif ($list[$mid] < $x) {
        return binary_search($x, $list, $mid + 1, $right);
    }
}

$array = array(1,2,3,4,5,6);
print_r(binary_search(6,$array,0,count($array)));

function fast_in_array($elem, $array){
   $top = sizeof($array) -1;
   $bot = 0;

   while($top >= $bot)
   {
      $p = floor(($top + $bot) / 2);
      if ($array[$p] < $elem) $bot = $p + 1;
      elseif ($array[$p] > $elem) $top = $p - 1;
      else return $p;
   }
    
   return FALSE;
}

print_r(fast_in_array(5,$array));

die;
function binary_search2($x, $list) {
    $left = 0;
    $right = count($list) - 1;

    while ($left <= $right) {
        $mid = ($left + $right)/2;
        
        if ($list[$mid] == $x) {
            return $mid;
        } elseif ($list[$mid] > $x) {
            $right = $mid - 1;
        } elseif ($list[$mid] < $x) {
            $left = $mid + 1;
        }
    }

    return -1;
}

?>