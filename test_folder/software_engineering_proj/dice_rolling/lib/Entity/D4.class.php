<?php

namespace Lib\Entity;

use Lib\Contracts\DiceInterface;

class D4 extends Dice {
  
  public function __construct(){
    parent::__construct(4);
  }
  
}