<?php
mb_internal_encoding("UTF-8");
error_reporting(E_ALL);
function lookforfile($search_for)
{

$dir = __DIR__.'/tests' ;
var_dump ($dir);
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." and $file != "..")
            if (($search_for == $file) == true)
            goto end;

        }
        echo "Файл не найден";
        die;
        closedir($dh);
        end:
    }
}
}

function form_render($from_get)
{
$string = file_get_contents(__DIR__.'/tests//'."$from_get");
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
$n = 1;
$right = 0;
$wrong = 0;
for ($i=0 ; $i < count($json_a["tans"]) ; $i++){

    echo "Вопрос номер $n: "; $n++;

    if ($_POST['pans'][$i] == $json_a["tans"][$i])
    {
            echo " Верно"; $right++;
            echo "</br>";
    }
    elseif ($_POST['pans'][$i] !== $json_a["tans"][$i])
    {

        echo " Не верно"; $wrong++;
        echo "</br>";
    }


echo "</br>";


}


echo "Всего верно $right и не верно $wrong";

}


}
