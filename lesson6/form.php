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

$from_get = $_GET['test'];
$string = file_get_contents('tests/'."$from_get");
$json_a = json_decode($string, true);

if (empty($_POST['SubmitButton2']))
{

    echo "</br>";

    echo 'Название теста:'." $json_a[testname]".'.';
    echo "</br>";
    echo '<form action="" method="post">'."</br>";

    $n = 1;
    for ($i=0 ; $i < count($json_a["tquest"]) ; $i++)
    {
    echo 'Вопрос'; echo " $n :" ;$n++; echo $json_a["tquest"][$i]; echo '<input type="text" name="pans[]"/>'."<br/><br/>";
    }

    echo '<input type="submit" name="SubmitButton2"/>';
}

elseif  (!empty($_POST['SubmitButton2']))
{


unset($_POST['SubmitButton2']);
echo "</br>";
/*var_dump($_POST['pans']);
echo "</br>";
var_dump($json_a["tans"]);
echo "</br>";
*/

$n = 1;
$right = 0;
$wrong = 0;
for ($i=0 ; $i < count($json_a["tans"]) ; $i++){

    echo "Вопрос номер $n: "; $n++;

    if ($_POST['pans'][$i] == $json_a["tans"][$i] )
        {
            echo " Верно"; $right++;

        }
        else
            echo " Не верно"; $wrong++;

echo "</br>";


}

//$all = count($json_a["tans"]);

echo "Всего верно $right и не верно $wrong";

}


?>
<center>
</body>
</html>
