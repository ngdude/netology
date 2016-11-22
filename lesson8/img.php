<?php

$name = $_GET['name'];
$mark = $_GET['mark'];

if ($mark == 5) $mark_name = 'отлично';
elseif ($mark == 4) $mark_name = 'хорошо';
else $mark_name = 'удовл.';

header("Content-Type: image/png");
header('Content-Disposition: attachment; filename=your_cert.jpeg');
$im = @imagecreate(548, 800)
    or die();

$background_color = imagecolorallocate($im, 0, 0, 0);

$text_color = imagecolorallocate($im, 233, 14, 91);
$font = __DIR__.'/asset/BadScript-Regular.ttf';
$black = imagecolorallocate($im, 5, 5, 0);
$cert_path = realpath(__DIR__ . '/asset/cert.jpg');
$cert = imagecreatefromjpeg($cert_path);
imagecopy($im,$cert,0,0,0,0,548,800);
imagettftext($im, 22, 0, 200, 310, $black, $font, "О том что");
imagettftext($im, 25, 0, 160, 370, $black, $font, $name);
imagettftext($im, 22, 0, 160, 430, $black, $font, "Успешно сдал тест");
imagettftext($im, 22, 0, 120, 490, $black, $font, "И получил оценку : $mark_name");
imagepng($im);
imagedestroy($im);

?>
