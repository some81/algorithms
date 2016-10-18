<?php
class Item
{
    protected $_key = '';
    protected $_next = null;
 
    public function __construct($key)
    {
        $this->_key = $key;
    }
 
    public function setNext($next) { $this->_next = $next; }
    public function &getNext() { return $this->_next; }
 
    public function setKey($key) { $this->_key = $key; }
    public function getKey() { return $this->_key; }
 
    public function __toString()
    {
        return $this->_key . "\n";
    }
}

class Linked_List 
{
    protected $_head = null;
    protected $_tail = null;
 
    public function insert($item)
    {
        if ($this->_head == null) {
            $this->_head = $item;
            $this->_tail = $item;
            return;
        }
 
        $this->_tail->setNext($item);
        $this->_tail = $item;
    }
 
    public function __toString()
    {
        $current = $this->_head;
        $output = '';
 
        while ($current) {
            $output .= $current->getKey() . "\n";
            $current = $current->getNext();
        }
 
        return $output;
    }
}

$n = 10;
$a = new Linked_List();
for ($i = 0; $i < $n; $i++) {
    $a->insert(new Item($i));
}

print_r($a->__toString());
