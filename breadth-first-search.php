<?php
//http://www.stoimen.com/blog/2012/09/10/computer-algorithms-graph-breadth-first-search/\
//space
//time O(n2)

$graph = array(
            0 => array(0, 1, 1, 0, 0, 0),
            1 => array(1, 0, 0, 1, 0, 0),
            2 => array(1, 0, 0, 1, 0, 0),
            3 => array(0, 1, 1, 0, 1, 0),
            4 => array(0, 0, 0, 1, 0, 1),
            5 => array(0, 0, 0, 0, 1, 0),
        );
 
function init(&$visited, $graph){
 
    foreach ($graph as $key => $vertex) {
        $visited[$key] = 0;
    }
}
 
function breadthFirst($graph, $start){
 
    $visited = array();
    $queue = array();
 
    init($visited, $graph);
    
    array_push($queue, $start); 
    $visited[$start] = 1;
 
    while (count($queue)) {
 
        $t = array_shift($queue); 
 
        foreach ($graph[$t] as $key => $vertex) {
            if (!$visited[$key] && $vertex == 1) {
                $visited[$key] = 1; 
                array_push($queue, $key);
                echo $key . "\t";
            }
        }
        
    } 
    //print_r($visited);
}
 
breadthFirst($graph, 2);
?>