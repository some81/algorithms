<?php
ini_set('display_errors',true);
ini_set('display_startup_errors', 1);
// Merge and Sort overlapping segments
//
// A segment has a 'start' and an 'end' where 'start' >= 0 and 'end' > 'start'.
// A segment overlaps another segment even if their boundaries are the same.
// Given a list of unordered segments, write a function that merges all the overlapping segments and sorts them by 'start'.

//segments = [
//     { 'start': 10, 'end': 16 },
//     { 'start': 17, 'end': 18 },
//     { 'start': 1, 'end': 2 },
//     { 'start': 8, 'end': 10 },
//     { 'start': 17, 'end': 20 },
//     { 'start': 19, 'end': 25 }
// ]

//{ 'start': 1, 'end': 2 },
//     { 'start': 8, 'end': 16 },
//     { 'start': 17, 'end': 25 }

$segment = array(
                 array('start' => 10, 'end' => 16),
                 array('start' => 17, 'end' => 18),
                 array('start' => 1, 'end' => 2),
                 array('start' => 8, 'end' => 10),
                 array('start' => 17, 'end' => 20),
                 array('start' => 19, 'end' => 25),
                );

function merges($segment){
    $array = $result = array();
    foreach($segment as $key=>$value){
        $array[$key] = $value['start'];
        $array2[$key] = $value['end'];
    } 
    array_multisort($array, SORT_ASC, $array2, SORT_ASC,$segment);
    
    $start = -1;
    $end = -1;
    foreach($segment as $key=>$value){
        if($value['start'] > $end){
            array_push($result,$segment[$key]);
            $start = $value['start'];
            $end = $value['end'];
        } else { 
            $result[count($result)-1] = array($start,$value['end']);
            $end = $end > $value['end'] ? $end : $value['end'];
        }   
    }
    
    return $result;
    
}

print_r(merges($segment));