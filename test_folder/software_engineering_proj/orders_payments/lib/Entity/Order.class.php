<?php

namespace Lib\Entity;

use Lib\Contracts\OrderInterface;
use Lib\Contracts\ItemInterface;
use Lib\Contracts\PaymentInterface;

class Order {
  
	/**
	 * @param int $items
	 * @param int $payments
	 * @param int $itemsCostTotal
	 * @param int $paymentsTotal
	 */
  public $items, $payments = array();
	public $itemsCostTotal, $paymentsTotal = 0;
	
  /**
	* @param ItemInterface $item An item that is part of the order
	*/
	public function addItem(ItemInterface $item){
    $this->items[] = $item;  
  }
	/**
	 * @param PaymentInterface $payment A payment that has been applied to the order
	 */
	public function addPayment(PaymentInterface $payment){
    $this->payments[] = $payment;  
  }
	/**
	 * @return bool true if the order has been paid in full, false if not.
	 */
	public function isPaidInFull()
  {
    if(!empty($this->items)){
			foreach($this->items as $item){
				$this->itemsCostTotal += $item->getAmount();
			}
    }
		
		if(!empty($this->payments)){
			foreach($this->payments as $payment){
				$this->paymentsTotal += $payment->getAmount();
			}
    }
		
		if($this->itemsCostTotal <= $this->paymentsTotal){
			return true;
		}
		return false;
  }
}
