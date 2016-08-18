<?php 
ini_set('display_error',true);
ini_set('display_startup_error',true);

$arr = array(4,2,1,3); 
echo "<br>".implode(',',$arr)."<br>";
$arr=mergesort($arr);
echo implode(',',$arr);
 
function mergesort($numlist)
{
    if(count($numlist) == 1 ) return $numlist;
 
    $mid = count($numlist) / 2;
    $left = array_slice($numlist, 0, $mid);
    $right = array_slice($numlist, $mid);
 
    $left = mergesort($left);
    $right = mergesort($right);
     
    return merge($left, $right);
}
 
function merge($left, $right)
{ 
    $result=array();
    $leftIndex=0;
    $rightIndex=0;
 
    while($leftIndex<count($left) && $rightIndex<count($right))
    {
        if($left[$leftIndex]>$right[$rightIndex])
        {
            $result[]=$right[$rightIndex];
            $rightIndex++;
        }
        else
        {
            $result[]=$left[$leftIndex];
            $leftIndex++;
        }
    } 
    while($leftIndex<count($left))
    { 
        $result[]=$left[$leftIndex];
        $leftIndex++;
    }
    while($rightIndex<count($right))
    {
        $result[]=$right[$rightIndex];
        $rightIndex++;
    }
    return $result;
}

function merge2($left,$right){
    $res = array();
    while(0 < count($left) && 0 < count($right)){
        if($left[0] > $right[0]){
            $res[] = $right[0];
            $right = array_slice($right,1);
        } else {
            $res[] = $left[0];
            $left = array_slice($left,1);
        }
    }
    while(count($left) > 0){
        $res[] = $left[0];
        $left = array_slice($left,1);
    }
    while(count($right) > 0){
        $res[] = $right[0];
        $right = array_slice($right,1);
    }
    
    return $res;
}

function merge3($left,$right){ 
    if(empty($left)){
        return right;
    }
    if(empty($right)){
        return left;
    }
    if($left[0] < $right[0]){
        return array_merge($left[0],merge3(array_slice($left,1,-1), $right));
    }
    return array_merge($right[0],merge3($left, array_slice($right,1,-1)));
}