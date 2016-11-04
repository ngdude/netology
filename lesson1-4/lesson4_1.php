<?php
error_reporting(E_ALL);

function resizer ($filename){
$width = 200;
$height = 200;
list($width_orig, $height_orig) = getimagesize($filename);
$ratio_orig = $width_orig/$height_orig;
if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
$newfilename = (strstr($filename, '.jpg', true).'_small.jpg');
return imagejpeg($image_p, $newfilename);
}


$dir = './img/';
$dh = scandir ($dir);
$dh = array_values(array_diff( $dh , array('..', '.')));
$dh_new = array();

for ($i=0 ; $i < count($dh) ; $i++ ){

    $fullpath = $dir.$dh[$i];
    $filesize = stat($fullpath);
    $filemod = stat($fullpath);
    $find_small = stripos($fullpath, '_small.jpg');
    if ($find_small == false){
    $path_small = (strstr($fullpath, '.jpg', true).'_small.jpg');
    //echo "<center>"."$fullpath"."</br></center>";
    //echo "$filesize[size]</br>";
    //echo "$filemod[mtime]</br>";
    //echo "$dh[$i]</br>";
    resizer($fullpath);
    $dh_new[$i] =  array('name' => $dh[$i],
    'fullpath' => $fullpath,
    'filesize' => $filesize['size'],
    'mtime' => $filemod['mtime'],
    'fullpath_small' => $path_small,
        );
}
}

$nextpage = 'lesson4_lab.php';

if ( count($dh_new) === 1 ){
    echo "<center><h1>"."Найден ".count($dh_new)." файл"."</br></h1>";
    echo  "<h1>".'<a href="'.$nextpage.'">Перейти к списку файлдов</a>'."</h1></center>";
}
elseif ( (count($dh_new) === 2) or (count($dh_new) === 3) or (count($dh_new) === 4)){
    echo "<center><h1>"."Найдено ".count($dh_new)." файла"."</br>";
    echo  "<h1>".'<a href="'.$nextpage.'">Перейти к списку файлдов</a>'."</h1></center>";
}
elseif ( count($dh_new) > 4){
    echo "<center><h1>"."Найдено ".count($dh_new)." файлов"."</br>";
    echo  "<h1>".'<a href="'.$nextpage.'">Перейти к списку файлдов</a>'."</h1></center>";
}
else{
    echo "<center><h1>".'Файлов не найдено'."</h1></center>";
    die;
}

$tocsv = fopen('file.csv', 'w');

foreach ($dh_new as $key => $value) {
    fputcsv($tocsv,$value, ';',';');
}

fclose($tocsv);




?>
