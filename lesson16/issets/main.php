<?php
$serverUrl = $_SERVER['PHP_SELF'];

if (isset($_GET['address'])) { $searchAddress = $_GET['address'];}
else { $searchAddress = 'null';}

// новый объект
$api = new \Yandex\Geo\Api();
//Задаём условия поиска
$api->setQuery($searchAddress);
// Настройка фильтров
$api
    ->setLimit(1) // кол-во результатов
    ->setLang(\Yandex\Geo\Api::LANG_RU) // локаль ответа
    ->load();
//запросы к api yandex
$response = $api->getResponse();
$response->getFoundCount(); // кол-во найденных адресов
$response->getQuery(); // исходный запрос
$response->getLatitude(); // широта для исходного запроса
$response->getLongitude(); // долгота для исходного запроса
// Список найденных точек
$collection = $response->getList();
foreach ($collection as $item) {
    $lookForRequest = $item->getAddress(); //запрос
    $lookForX = $item->getLatitude(); // широта
    $lookForY = $item->getLongitude(); // долгота
}

// Проверка условий
if ($searchAddress == 'null'){
    $lookForRequest = 'Введите данные для поиска';
    $linkToMap = 'img/earth.png';
}
elseif ($response->getFoundCount() == 0){
    $lookForRequest = 'Не удалось найти адрес, введите адрес более точно';
    $linkToMap = 'img/earth.png';
}

elseif ($response->getFoundCount() > 0){
    $linkToMap = 'https://static-maps.yandex.ru/1.x/?ll='.$lookForY.','.$lookForX.
    '&z=12&size=450,450&l=map&pt='.$lookForY.','.$lookForX.',flag';
}
