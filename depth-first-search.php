<?php

//http://www.stoimen.com/blog/2012/09/17/computer-algorithms-graph-depth-first-search/
//space O(n2)
//time  O(n2)
class Graph{
 
    private $len = 0;
    private $graph = array();
    private $visited = array();
 
    public function __construct(){
 
        $this->graph = array(
                            0 => array(0, 1, 1, 0, 0, 0),
            1 => array(1, 0, 0, 1, 0, 0),
            2 => array(1, 0, 0, 1, 0, 0),
            3 => array(0, 1, 1, 0, 1, 0),
            4 => array(0, 0, 0, 1, 0, 1),
            5 => array(0, 0, 0, 0, 1, 0),
                        );
 
        $this->len = count($this->graph);
        $this->init();
    }
 
    function init(){
 
        for ($i = 0; $i < $this->len; $i++) {
            $this->visited[$i] = 0;
        }
    }
 
    function depthFirst($vertex){
        $this->visited[$vertex] = 1;
        
        for ($i = 0; $i < $this->len; $i++) {
            if ($this->graph[$vertex][$i] == 1 && !$this->visited[$i]) {
                $this->depthFirst($i);
            }
        }
        echo "$vertex <br>";
    }
}
 
$g = new Graph();
$g->depthFirst(2);
 
?>