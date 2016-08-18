<?php

namespace Lib\Entity;

use Lib\Contracts\PaymentInterface;

/**
	* Reprecents single payment class
	*/
class Payment implements PaymentInterface {
  
  private
		/*
		 * @param $types array Payment types
		 */
    $types = array('Visa','Master','Cash'),
		/*
		 * @param $amount int Payment value
		 */
    $amount = 0,
		/*
		 * @param $total int Total payment value
		 */
    $total = 0;
    
  public function __construct(){}
  
  /**
	 * @return int The amount of the individual payment
	 */
  public function getAmount()
  {
    return (int)$this->amount;
  }
  
  /**
	 * @param string $type Payment type
	 * @param int The price of the individual payment
	 */
  public function setAmount($type = "",$amount = 0)
  {
    if(!empty($amount) && !empty($type))
    {
			if(assert('is_int($amount) /* $amount parameter must be an int */'))
			{
				$this->amount = $amount;	
			}
			
			if(assert('is_string($type) /* $type parameter must be a string */'))
			{
				if(assert('in_array($type,$this->types) ? true : false /* $type doesn\'t exist in our list */'))
				{
					$this->type = $type;
				}
			}
    } else {
      throw new Exception("There is no set amount value and payment type");
    }
  }
}