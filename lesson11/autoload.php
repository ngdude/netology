<?php

function my_autoloader($class) {
    include __DIR__.'/classes/' . $class ;
}
$dir = 'classes';

$files1 = scandir($dir);
//var_dump($files1);
foreach ($files1 as $key => $value) {
    if ($value !== '.' and $value !== '..'){
    my_autoloader($value);
    echo "класс $value загружен </br>";}

}



$Prod[] = new ClassProducts ('Помидоры', 'Овощи' , 'Россия', 1000, '10.10.2016');
$Prod[] = new ClassProducts ('Огурцы', 'Овощи' , 'Россия', 1000, '11.10.2016');
$Prod[] = new ClassProducts ('Катошка', 'Овощи' , 'Россия', 1000, '12.10.2016');
$Prod[] = new ClassProducts ('Перец', 'Овощи' , 'Россия', 1000, '14.10.2016');
$Prod[] = new ClassProducts ('Капуста', 'Овощи' , 'Россия', 1000, '15.10.2016');
$Prod[] = new ClassProducts ('морковь', 'Овощи' , 'Россия', 1000, '13.10.2016');

/*
$Prod1->setStore('Нагорная');

$Prod2->setStore('Кировск');

$Prod3->setStore('Нижний');
*/
//var_dump($Prod);

$Prod[0]->getAllProducts();



//var_dump($Prod);
echo "</br>";
/*
var_dump($Prod2);
echo "</br>";
var_dump($Prod3);
echo "</br>";
var_dump($Prod4);
echo "</br>";
var_dump($Prod5);
echo "</br>";
var_dump($Prod6);
echo "</br>";
*/

 ?>
