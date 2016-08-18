<?php

namespace Lib\Contracts;

interface ItemInterface
{
	/**
	* @return int The price of the individual item
	*/
	public function getAmount();
	
	/**
   * @param int $amount Item price 
	 */
	public function setAmount($amount);
	
}
