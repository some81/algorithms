<?php

namespace Lib\Contracts;

interface DiceInterface
{
	/**
	* @return int Number per roll
	*/
	public function roll();
}
