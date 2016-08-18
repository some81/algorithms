<?php

namespace Lib\Contracts;

interface DiceContainerInterface
{
	/**
	* @return array of objects per roll
	*/
	public function attach(DiceInterface $die);
	
	/**
	* @return int Total numbers per roll
	*/
	public function getTotal();
}
