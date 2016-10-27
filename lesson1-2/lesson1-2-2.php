<?php

$a = rand (1, 10);
$b = $_GET['b'];


if ( $a > $b){

Echo "</br>";
Echo "<center>";
Echo "<center>A больше </br></center>";
Echo '<a href="lesson1-2-1.php">попробуй ещё раз!</a>';
Echo "</center>";

}
elseif ($a < $b){

Echo "</br>";
Echo "<center>";
Echo "A меньше </br>";
Echo '<a href="lesson1-2-1.php">попробуй ещё раз!</a>';
Echo "</center>";
}
else
{
Echo "</br>";
Echo "<center>Угадал !</center>";
}
?>
