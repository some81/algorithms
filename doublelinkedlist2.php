<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Person
{
	public $next = null;
	public $prev = null;
 
	protected $_firstName = '';
	protected $_lastName = '';
	protected $_phone = '';
 
 
	public function __construct($firstName, $lastName, $phone)
	{
		$this->_firstName = $firstName;
		$this->_lastName = $lastName;
		$this->_phone = $phone;
	}
 
	public function __toString()
	{
		return 'First name: ' . $this->_firstName 
			 . ', Last name: ' . $this->_lastName 
			 . ', Phone: ' . $this->_phone;
	}
}


class LList
{
	public $head;
	public $tail;
 
	public function insert($item) 
	{
		$item->next = $this->head;
 
		if ($this->head != null) {
			$this->head->prev = $item;
		}
 
		$this->head = $item;
	}
 
	public function insertAfter($item, $key) 
	{
		$cur = $this->head;
		while ($cur) {
			if ($cur->data == $key) {
				$next = $cur->next;
 
				$cur->next = $item;
				$item->prev = $cur;
 
				if ($next != null) {
					$item->next = $next;
					$next->prev = $item;
				}
				return;
			}
			$cur = $cur->next;
		}
 
		$this->head = $this->tail = $item;
	}
 
	public function search($item)
	{
		$cur = $this->head;
 
		while ($cur) {
			if ($cur == $item) {
				return 1;
			}
 
			$cur = $cur->next;
		}
 
		return 0;
	}
 
	public function __toString()
	{
		$cur = $this->head;
 
		$output = '';
		while ($cur) {
			$output .= $cur . ' ';
 
			$cur = $cur->next;
		}
 
		return $output . "\n";
	}
}
 
$ll = new LList();
 
$a = new Person('John', 'Smith', '555 9401');
$b = new Person('James', 'Johnes', '555 2454');
$c = new Person('Jeanne', 'Francois', '333 2323');
 
$ll->insert($a);
$ll->insert($b);
$ll->insert($c);

print_r($ll);die;

// 1, because $b is in the list
echo $ll->search($b);
 
// 0, cause $c isn't in the list
echo $ll->search($c);