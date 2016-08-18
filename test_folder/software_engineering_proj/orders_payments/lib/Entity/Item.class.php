<?php

namespace Lib\Entity;

use Lib\Contracts\ItemInterface;

/**
	* Reprecents single item class
	*/
class Item implements ItemInterface {
  
  private
		/*
		 * @param $price int Item price value
		 */
		$price = 0,
		/*
		 * @param $total int Total payment value
		 */
		$total = 0;
    
  public function __construct(){}
  
  /**
	 * @return int The price of the individual item
	 */
  public function getAmount()
  {
    return (int)$this->price;
  }
  
  /**
	 * Set item price 
	 * @param int $price
	 * @set int The price of the individual item
	 */
  public function setAmount($price)
  {
    if(!empty($price))
    {
			if(assert('is_int($price) /* $price parameter must be an int */')){
				$this->price = $price;
				$this->total += $price;
			}
    } else {
      throw new \Exception("There is no set price value");
    }
  }
  
}