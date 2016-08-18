<?php

namespace Lib\Entity;

use Lib\Contracts\DiceInterface;

class D10 extends Dice {
  
  public function __construct(){
    parent::__construct(10);
  }
}