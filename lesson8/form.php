<?php
session_start();
include 'functions.php';
error_reporting(E_ALL);
$homeUrl = 'list.php';
$authUrl = 'index.php';


if (isset($_SESSION["guest"]["user"])) $guestname = $_SESSION["guest"]["user"];

if (!empty($_SESSION['login'])){
    $guestname = $_SESSION['login'];
    goto next_admin;
}
elseif (!empty($_SESSION['guest'])){
    $guestname = $_SESSION["guest"]["user"];
    goto next_guest;
}
else
header('Location: ' . $authUrl);
die;

next_admin:
//var_dump($guestname);
next_guest:


if (!isset($_GET['test'])) {http_response_code(400);
echo '
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body><h2>
<br />
<p><center><img src="./errors/404img.jpg" alt=""></br>Ошибка 400 неправильный аргумент</center></p>
<center><h2>
<center>
</body>
</html>
';die;}
else{
$dir = __DIR__.'/tests' ;$dh = scandir($dir);
foreach ($dh as $value){
        if ($value == $_GET['test'])goto end;
        }
            http_response_code(404);
            echo'
            <html>
            <head>
            <meta charset="UTF-8">
            <title></title>
            </head>
            <body><h2>
            <br />
            <p><center><img src="./errors/404img.jpg" alt=""></br>Ошибка 404 страница не найдена</center></p>
            </center></h2>
            </body>
            </html>
            ';
            die;
end:
}

?>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<h3><p><center>
<br />
<?php


form_render($_GET['test'],$guestname);
?>
<br />
</h3></p></center>
</body>
</html>
