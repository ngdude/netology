
<?php

function getProfiles()
{

    $json = file_get_contents('phonebook.json');
    $phonebook = json_decode($json, true);
    return $phonebook;
}

function render($templateName)

{
    if (file_exists($templateName)) {
        require $templateName;
    } else {
        echo "Извините, шаблон '$templateName' не существует.";
        die;
    }
}

function getlang_func()
{

$getlang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

switch ($getlang){
    case "ru":
        $lang = "ru";
    case "en":
        $lang = "en";
    default:
        $lang = "ru";

return $lang;}
}

?>
