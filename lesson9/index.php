<?php
  require_once "class1.php";

echo "</br>";
$news1->showProfile();
echo "</br>";
$news2->showProfile();
echo "</br>";
$news3->showProfile();
echo "</br>";
$news4->showProfile();
echo "</br>";
$news5->showProfile();
echo "</br>";


var_dump(get_class_vars());
var_dump(get_class_vars("NewsComments"));

?>
