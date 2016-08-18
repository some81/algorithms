<?php
ini_set('display_error',true);
ini_set('display_startup_error',true);


function partition(&$arr,$leftIndex,$rightIndex)
{
    $pivot=$arr[($leftIndex+$rightIndex)/2];
     
    while ($leftIndex <= $rightIndex) 
    {        
        while ($arr[$leftIndex] < $pivot)             
                $leftIndex++;
        while ($arr[$rightIndex] > $pivot){
                $rightIndex--;
        }
        
        if ($leftIndex <= $rightIndex) {  
                $tmp = $arr[$leftIndex];
                $arr[$leftIndex] = $arr[$rightIndex];
                $arr[$rightIndex] = $tmp;
                $leftIndex++;
                $rightIndex--;
        }
    }
    echo implode(",",$arr)." @pivot $pivot<br>";
    return $leftIndex;
}
 
function quickSort(&$arr, $leftIndex, $rightIndex)
{
    $index = partition($arr,$leftIndex,$rightIndex);
    if ($leftIndex < $index - 1)
        quickSort($arr, $leftIndex, $index - 1);
    if ($index < $rightIndex)
        quickSort($arr, $index, $rightIndex);
}

function partition2(&$arr,$left,$right){
    $pivot = $arr[($left+$right)/2];
    while($left <= $right){
        while($pivot > $arr[$left])
            $left++;
        while($pivot < $arr[$right])
            $right--;
        if($left <= $right){
            $tmp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $tmp;
            $left++;
            $right--;
        }
    }
    return $left;
}

$nums = array(5,3,8,6,2,7);
//$nums = array(2,1,3,4);
echo implode(",",$nums)." @unsorted<br>";
quickSort($nums,0,count($nums)-1);
echo implode(",",$nums)." @sorted<br>";