<?php
namespace Lib\Entity;

use Lib\Contracts\DiceInterface;

class Dice implements DiceInterface {
  
  /**
   * @param int $roll 
   */
  private $number = null;
  
  /**
   * @param int $sides Number of sides maxiumum 10
   */
  public function __construct($sides = 10){
    $this->number = rand(0,$sides);
  }
  
  /**
   * @return int Number of side
   */
  public function roll()
  {
    return $this->number;
  }
  
}