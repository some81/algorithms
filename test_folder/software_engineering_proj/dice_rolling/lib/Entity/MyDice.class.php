<?php

namespace Lib\Entity;

use Lib\Contracts\DiceContainerInterface;
use Lib\Contracts\DiceInterface;

/**
	* Reprecents single Dice class
	*/
class MyDice implements DiceContainerInterface {
  /*
   * @param int Total numbers per roll
   */
  public $total = 0;
  
  /*
   * @param array All dies rolls
   */
  public $dices = array();
  
  public function __construct(){}
  
  /**
   * @param ItemInterface $item An item that is part of the order
   */
  public function attach(DiceInterface $die){
    $this->dices[] = $die;
  }
  
  /**
   * @return int Total numbers per roll
   */
  public function getTotal(){
    print_r($this->dices);
    return array_reduce((array)$this->dices,function($res,$roll){
      $val = $roll->roll();
      if(!is_null($val))
        $res += $roll->roll();
      else {
        $res1 = 0;
        $r = (array)$roll;
        if(isset($r['dice'])){
          $res1 = array_reduce($r['dice'],function($res1,$roll1){
           return $res1 += $roll1->roll();
          });
        }
      }
      return $res + @$res1;
    });
  }
}