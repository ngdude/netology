<?php
error_reporting(E_ALL);
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

if ((empty($_POST['SubmitButton1'])) && (empty($_POST['SubmitButton2'])))
{
    echo '
    <!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <title></title>
    </head>
    <body>
    <br />
    <center><h3>
    Доброго времени суток! Вы попали на страницу создания тестов!'."</br>".' Для создания теста введи число раное количеству вопросов в тесте (от 1 до 15) '.'
    </H3><form action="" method="post">
      <input type="number" name="numberofquestions" min="1" max="15"/>
      <input type="submit" name="SubmitButton1" value="Далее"/>
    </form>
    </body>
    </center><h3>
    </html>
    '
;
}

elseif ((!empty($_POST['SubmitButton1'])) && (empty($_POST['SubmitButton2']))) {
$input = $_POST['numberofquestions'];
$n = 1;

//var_dump($_POST);
echo '
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<br />
<center><h3>
<form action="" method="post">'.'В центральном верхнем поле введите имя теста'."</br>".'<input type="text" name="testname" required/>'."</br>"
;
echo 'В левых столбцах введите вопрос, а в правых - ответ'."</br>";

for ($i=0 ; $i < $input ; $i++ )
{

echo 'Вопрос номер'."$n" ;
echo "<br />";
echo
'
<input type="text" name="tquest[]" required/>
<input type="text" name="tans[]" required/>

';
$n++;
echo "<br />";
}
echo "<br />";
echo '
<input type="submit" name="SubmitButton2" value="Создать Тест" />
</form>
</body>
</center><h3>
</html>
';
}
else {
ob_start();
unset($_POST['SubmitButton2']);

$fullpath = 'tests/'.$_POST["testname"].'.json';
$fp = fopen("$fullpath", 'w');
fwrite($fp, json_encode($_POST, JSON_UNESCAPED_UNICODE));
fclose($fp);
echo '
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<br />
<center><h3>
';
echo 'Тест успешно создан!'."</br>";
echo 'Вас автоматически переадресует на страницу со списком тестов через несколько секунд'."</br>";
echo 'Если вы хотите создать ещё один тест пройдите по сслыке:'."<strong><a href=".'admin.php'.">Создать ещё один тест</a></strong>";

echo '
</body>
</center><h3>
</html>
';

$output = ob_get_clean();

header('refresh: 8; url=list.php');

echo $output;
}

?>
<center>
</body>
</html>
