<?php

namespace Lib\Entity;

use Lib\Contracts\DiceInterface;

class AnyDie extends Dice {
  
  /**
   * @param null Empty object
   */
  public $dice;
  
  /**
   * @param array $any Arbiture faces 
   */
  public function __construct($any = array()){
    if(assert('is_array($any) /* should be an array*/')){
      foreach($any as $key){
        $dice = new Dice($key);
        $this->dice[] = $dice;
      }
    }
  }
}