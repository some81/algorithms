<?php
ini_set("log_errors", true);
ini_set("error_log", "/tmp/php-errors.log");
ini_set("display_errors",true);

require "vendor/autoload.php";

use Lib\Entity\Order;
use Lib\Entity\Item;
use Lib\Entity\Payment;

$order = new Order();
$item = new Item();

//First item
$item->setAmount(2);
$order->addItem($item);

//Second item
$item->setAmount(5);
$order->addItem($item);

//Third item
$item->setAmount(25);
$order->addItem($item);

//Forth item
$item->setAmount(13.2);
$order->addItem($item);


$payment = new Payment();
//First payment
$payment->setAmount('Visa',3);
$order->addPayment($payment);

//Second payment
$payment->setAmount('Cash',10);
$order->addPayment($payment);

//Third payment
$payment->setAmount(10,10);
$order->addPayment($payment);

var_dump($order->isPaidInFull());

//Adapter design pattern