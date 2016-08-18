<?php

ini_set("log_errors", true);
ini_set("error_log", "/tmp/php-errors.log");
ini_set("display_errors",true);

require "vendor/autoload.php";

use Lib\Entity as Dice;
use Lib\Entity\MyDice;

$container = new MyDice();
$container->attach(new Dice\D10()); // 10-sided die
$container->attach(new Dice\D8()); // 8-sided die
$container->attach(new Dice\D6()); // 6-sided die
$container->attach(new Dice\D4()); // 4-sided die
$container->attach(new Dice\AnyDie([0, 0, 1, 2, 3, 3])); // A die with arbitrary faces
$total = $container->getTotal();

echo "Total of all dice: $total\n";

