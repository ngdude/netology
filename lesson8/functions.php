<?php
error_reporting(E_ALL);
mb_internal_encoding("UTF-8");

function json_auth($user,$userpass)
{
$dir = __DIR__.'/users';
$files1 = scandir($dir);
if (in_array($user.'.json',$files1) == (bool)false) header('Location: index.php');;
$id = array_search($user.'.json',$files1);
$json = file_get_contents(__DIR__.'/users/'.$files1[$id]);
$UserData = json_decode($json, true);
if($user == $UserData['username'] && $userpass == $UserData['password']){
$_SESSION['login'] =  $UserData['username'];
$_SESSION['password'] =  $UserData['password'];
header('Location: list.php');
}
header('Location: list.php');
}

function lookforfile($search_for)
{
$dir = '.\tests' ;
$dh = scandir($dir);
$search_for_full = '.\tests\\'.$search_for;
var_dump($dh);
foreach ($dh as $value)
{
            if (is_file($value))
            if ($value == ($search_for_full))
            return $dir . '\\' . $file ;
            }
        header("HTTP/1.0 404 Not Found");
        echo'
        <html>
        <head>
        <meta charset="UTF-8">
        <title></title>
        </head>
        <body><h2>
        <br />
        <p><center><img src="./errors/404img.jpg" alt=""></br>Ошибка 404 страница не найдена</center></p>
        <center><h2>
        <center>
        </body>
        </html>
        ';
        die;
}

function form_render($from_get,$guestname)
{
$string = file_get_contents(__DIR__.'/tests//'.$from_get);
$json_a = json_decode($string, true);



if (empty($_POST['SubmitButton2']))
{
    echo "</br>";
    //var_dump($guestname);
    echo 'Привет ' . $guestname . ' !' . "</br>";
    echo 'Название теста:'." $json_a[testname] </br>";
    echo '<form action="" method="post">';
    $n = 1;
    for ($i=0 ; $i < count($json_a["tquest"]) ; $i++)
    {    echo 'Вопрос'; echo " $n :" ;$n++; echo $json_a["tquest"][$i];
    echo '<input type="text" name="pans[]" required/>'."<br/><br/>";
    }

    echo '<input type="submit" name="SubmitButton2"/>';
}

elseif  (!empty($_POST['SubmitButton2']))
{

unset($_POST['SubmitButton2']);

echo "</br>";
$n = 1;
$right = 0;
$wrong = 0;
$questions_number = count($json_a["tans"]);


for ($i=0 ; $i < count($json_a["tans"]) ; $i++){

    echo "Вопрос номер $n: "; $n++;

    if (strcasecmp ($_POST['pans'][$i] , $json_a["tans"][$i]) === 0 )
    {
            echo " Верно"; $right++;
            echo "</br>";
    }
    elseif (strcasecmp ($_POST['pans'][$i] , $json_a["tans"][$i]) !== 0)
    {

        echo " Не верно"; $wrong++;
        echo "</br>";
    }
echo "</br>";
}

echo "Всего верно $right и не верно $wrong";
echo "</br>";echo "</br>";
//echo fmod($right,$questions_number);
echo "</br>";
if ($right == $questions_number)
{
    $mark = 5;
}
elseif (($right / $questions_number) >= 0.8 and ($right / $questions_number) < 1 ){
    $mark = 4;
}
elseif (($right / $questions_number) >= 0.6 and ($right / $questions_number) < 0.8){
    $mark = 3;
}
elseif (($right / $questions_number) >= 0.4 and ($right / $questions_number) < 0.6){
    $mark = 2;
}
else{
    $mark = 1;
}

//global $mark;
//global $username;
$name = $guestname;

if ($mark >= 3) {
    echo "Ваша оценка за тест $mark </br>";
    echo '<a href="'.'img.php?name='.$name.'&mark='.$mark.'">Скачать сертифика</a></p>';
    echo '<img src="img.php?name='.$name.'&mark='.$mark.'">';
}
else
    echo "Вы не прошли тест.";




}
}
