<?php

namespace Lib\Contracts;

interface PaymentInterface {
	/**
		* @return int The amount of the individual payment
		*/
	public function getAmount();

	/**
	 * @set int The price of the individual payment
	 */
	public function setAmount($amount);
}