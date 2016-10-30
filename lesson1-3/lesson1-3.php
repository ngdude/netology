<?php

error_reporting(E_ALL);

// 1 создаём многомерный массив
$world = array("Australia" => array("Macropus", "Canis dingo", "Crocodylus porosus"),
"Africa" => array("Acinonyx jubatus", "Taurotragus oryx", "Neotragus batesi",
 "Hippopotamus amphibius","Elephantidae"),
"Eurasia" => array("Canis lupus", "Vulpes vulpes", "Bovini", "Cuculidae"),
"North-America" => array("Procyon minor", "Atelerix algirus", "Mustela Africana", "Phaeochroa cuvierii")
);

// 2 объявим пустые массивы, выбираем названия животных состоящие из двух слов
// раскидываем первую и вторую часть названия в разные массивы
$worlddw1 = array();
$worlddw2 = array();
$i = 0;

foreach ($world as $countries => $animals)
{
        $i++;
        foreach ($animals as $id => $dwanimals)
        {
            if (strpos ( $dwanimals, ' '))

            $worlddw1["$countries"][$id] =  substr($dwanimals , 0 , strpos ( $dwanimals, ' '));
            $worlddw2[$i][$id] = substr($dwanimals , (strpos ( $dwanimals, ' '))+1 );



    }
}

//Перемешиваем массивы

foreach ($worlddw1 as $key => $value) {
shuffle($worlddw1[$key]);}

foreach ($worlddw2 as $key => $value){
shuffle($worlddw2[$key]);}

shuffle($worlddw2);

// Многомерный массив со второй частью названия животных превращаем в одномерный.
$oneworld = array();
foreach($worlddw2 as $subArr){
$oneworld = array_merge($oneworld,array_values($subArr));
}

// Объявлем нужные нам для работы переменные и выводим данные из массивов
$i=0;
$j=0;

foreach ($worlddw1 as $country=> $value)
{
    echo "<h2>$country</h2>";
    for($i = 0; $i<count($value); $i++)
    {
    if ($i > 0 && $i<count($value)) echo ", ";
    echo "$value[$i]";
    echo " ";
    echo $oneworld[$j];
    $j++;
    }
    echo ".";
}
$j++;

?>
