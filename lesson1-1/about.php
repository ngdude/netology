<?php

$title = 'Страница Пользователя';
$name = 'Дмитрий';
$surname = 'Вертиев';
$age = 32;
$myemail = 'ngdude@mail.ru' ;
$from = 'Москва';
$about = 'ИТ Инженер';
?>

<html lang="ru">
    <head>
        <title></title>
        <meta charset="utf-8">
        <style>
            body {
                font-family: sans-serif;
            }
            dl {
                display: table-row;
            }
            dt, dd {
                display: table-cell;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h1><?= $title ?></h1>
        <dl>
            <dt>Имя</dt>
            <dd><?= $name .' '. $surname  ?></dd>
        </dl>
        <dl>
            <dt>Возраст</dt>
            <dd> <?= $age  ?> </dd>
        </dl>
        <dl>
            <dt>Адрес электронной почты</dt>
            <dd><a href="mailto:<?= $myemail?>"> <?= $myemail?></a></dd>
        </dl>
        <dl>
            <dt>Город</dt>
            <dd><?= $from?></dd>
        </dl>
        <dl>
            <dt>О себе</dt>
            <dd><?= $about?></dd>
        </dl>
    </body>
</html>

