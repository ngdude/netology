<?php
session_start();
include 'functions.php';
if (isset($_SESSION['login']) or isset($_SESSION['guest']))
header('Location: list.php');

if(!empty($_POST['Auth']['login'])) json_auth($_POST['Auth']['login'],$_POST['Auth']['password']);
if(!empty($_POST['Auth']['guest'])){
    $_SESSION['guest']['user'] = $_POST['Auth']['guest'];
    header('Location: list.php');}



if (!isset($_GET["id"])){
echo'
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
<center>
<p><a href="index.php?id=1">Зайти как пользователь</a></p>
<p><a href="index.php?id=2">Зайти как гость</a></p>
</center>
</body>
</html>
';
die;
}
elseif (($_GET["id"]) == 1) {
echo '
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Авторизация</title>
    </head>
    <body>
        <form method="post">
            <label for="login" >Логин</label>
            <input id="login" name="Auth[login]" />

            <label for="password" >Пароль</label>
            <input type="password" id="password" name="Auth[password]" />
            <button type="submit">Отправить</button>
        </form>
    </body>
    </html>
';
}
elseif (($_GET["id"]) == 2) {

echo '
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Авторизация</title>
    </head>
    <body>
        <form method="post">
            <label for="guest">Логин</label>
            <input id="guest" name="Auth[guest]" />
            <button type="submit">Отправить</button>
        </form>
    </body>
    </html>
';
}
?>
