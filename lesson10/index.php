<?php
  require_once "Products.php";

$vegitables = new Vegetables ('Картошка', 'кг',60,0);
$drinks = new Drinks ('Балтика 9','банок',100,10,true);
$cookie = new Cookies ('Юбилейное','пачек',35,10,false);


$vegitables->Render(9);
$vegitables->Render(15);
$drinks->Render(3);
$drinks->Render(9);
$cookie->Render(10);
$cookie->Render(15);



/*
echo "</br>";
var_dump($vegitables);
echo "</br>";
var_dump($drinks);
echo "</br>";
var_dump($cookie);
echo "</br>";
var_dump($vegitables->getDiscount());
echo "</br>";
var_dump($drinks->getDiscount());
echo "</br>";
var_dump($cookie->getDiscount());
echo "</br>";
var_dump($vegitables->getShiping());
echo "</br>";
var_dump($drinks->getShiping());
echo "</br>";
var_dump($cookie->getShiping());

*/
?>
