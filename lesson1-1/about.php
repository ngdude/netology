<?php

$title = '�������� ������������';
$name = '�������';
$surname = '�������';
$age = 32;
$myemail = 'ngdude@mail.ru' ;
$from = '������';
$about = '�� �������';
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
            <dt>���</dt>
            <dd><?= $name .' '. $surname  ?></dd>
        </dl>
        <dl>
            <dt>�������</dt>
            <dd> <?= $age  ?> </dd>
        </dl>
        <dl>
            <dt>����� ����������� �����</dt>
            <dd><a href="mailto:<?= $myemail?>"> <?= $myemail?></a></dd>
        </dl>
        <dl>
            <dt>�����</dt>
            <dd><?= $from?></dd>
        </dl>
        <dl>
            <dt>� ����</dt>
            <dd><?= $about?></dd>
        </dl>
    </body>
</html>

