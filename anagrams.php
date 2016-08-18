<?php
ini_set('display_errors',true);
ini_set('display_startup_error',true);

$array = array('cat','bar','baz','act','tac','tokyo','kyoto');

function anagram($array){
	$sortedArray = $match = $count = array();
	$sum = 0;
	foreach($array as $words){
		$split = str_split($words);
		sort($split); 
		array_push($sortedArray,implode('',$split));
	}
	
	foreach($sortedArray as $word){
		if(isset($count[$word])){
			$count[$word] = $count[$word] + 1; 
		} else {
			$count[$word] = 1;
		}
	}
	
	$sum = 0;
	foreach($count as $key=>$word){
		if($word > 1){
			$sum += $word;
		}
	}
	
	return $sum;
}

print_r(anagram($array));

//time complexity : O(n log n)  (there's sorting algorithum )


