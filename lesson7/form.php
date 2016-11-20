<?php
include 'functions.php';
error_reporting(E_ALL);
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
form_render($_GET['test']);
?>
<br />
</h3></p></center>
</body>
</html>
