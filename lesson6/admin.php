<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<br />

<center><H3>
<?php
if ((empty($_POST['SubmitButton1'])) && (empty($_POST['SubmitButton2'])))
{
    echo 'Доброго времени суток! Вы попали на страницу создания тестов!'."</br>".' Для создания теста введи число раное количеству вопросов в тесте (от 1 до 15) '.'
    </H3><form action="" method="post">
      <input type="number" name="numberofquestions" min="1" max="15"/>
      <input type="submit" name="SubmitButton1" value="Далее"/>
    </form>
    '
;
}

elseif ((!empty($_POST['SubmitButton1'])) && (empty($_POST['SubmitButton2']))) {
$input = $_POST['numberofquestions'];
$n = 1;

//var_dump($_POST);
echo
'<form action="" method="post">'.'В центральном верхнем поле введите имя теста'."</br>".'<input type="text" name="testname" />'."</br>"
;
echo 'В левых столбцах введите вопрос, а в правых - ответ'."</br>";
for ($i ; $i < $input ; $i++ )
{

echo 'Вопрос номер'."$n" ;
echo "<br />";
echo
'
<input type="text" name="tquest[]"/>
<input type="text" name="tans[]"/>

';
$n++;
echo "<br />";
}
echo "<br />";
echo '
<input type="submit" name="SubmitButton2" value="Создать Тест"/>
</form>
';
}
else {
unset($_POST['SubmitButton2']);
//var_dump($_POST);

//$file = file_get_contents("$_POST[testname]");
//$data = json_decode($file);
//file_put_contents('$_POST[testname]',json_encode($_POST));

$fullpath = 'tests/'.$_POST[testname].'.json';
$fp = fopen("$fullpath", 'w');
fwrite($fp, json_encode($_POST, JSON_UNESCAPED_UNICODE));
fclose($fp);

Echo 'Тест успешно создан! для просмотра списка тестов нажмите'."</br>";
Echo  "<a href=".'list.php'.">Список тестов</a>";

}

?>
<center>
</body>
</html>
