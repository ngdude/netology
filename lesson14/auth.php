<?php
session_start();
require_once __DIR__.'//issets/'.('WorkWithDatabase.class.php');
require_once __DIR__.'//issets/'.('databaseconfig.php');
include __DIR__.'//issets/'.('phpconfig.php');

if (!empty($_SESSION['user_id'])){
    header('HTTP/1.1 302 Found');
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/lesson14/index.php');
}

$objTasks = new WorkWithDatabase($configDbGlobalTasks);
// проверка параметров Post и GET
if(!isset($_POST['user'])) {$_POST['user']=NULL;}
if(!isset($_POST['password'])) {$_POST['password']=NULL;}
if(!isset($_POST['login'])) {$_POST['login']=NULL;}
if(!isset($_POST['register'])) {$_POST['register']=NULL;}

/*
var_dump($_POST['user']);
var_dump($_POST['password']);
var_dump($_POST['login']);
var_dump($_POST['register']);
*/
if(!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['register']))
{ $objTasks->addUser($_POST['user'],$_POST['password']);}
if(!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['login']))
{ $objTasks->userLogin($_POST['user'],$_POST['password']);}


?>

<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }
    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    table th {
        background: #eee;
    }
        </style>
    </head>
<body>
    <center><h2> Авторизация </h2>
            <div style="display: inline-block">
            <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                <input type="text" name="user" placeholder="Логин" value="" />
                <input type="text" name="password" placeholder="Пароль" value="" />
                <input type="submit" name="login" value="войти"/>
                <input type="submit" name="register" value="регистрация"/>
            </form>
            </div>
</body>
</html>
