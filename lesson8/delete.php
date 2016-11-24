<?php
session_start();
if (!empty($_SESSION['login']))
goto next_admin;

else
{
http_response_code(403);
echo '
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body><h2>
<br />
<p><center><img src="./errors/404img.jpg" alt=""></br>Ошибка 403 не авторизован!</center></p>
<center><h2>
<center>
</body>
</html>
';die;}

next_admin:
if (empty($_GET["filename"])){ http_response_code(400);die;}
//var_dump(__DIR__.'\\tests\\'.$_GET["filename"]);
unlink(__DIR__.'/tests/'.$_GET["filename"]);
var_dump(__DIR__.'/tests/'.$_GET["filename"]);
header('Location: list.php');
?>
