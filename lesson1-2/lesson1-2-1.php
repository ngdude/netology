<?php

error_reporting(0);

$b = 0;

 ?>

<html lang="ru">
<title></title>
<meta charset="utf-8">
</br>
<center><form action="lesson1-2-2.php" method="GET">
<H3>Угадай число от 1 до 10</H3>
<input type="number" name="b"  min="1" max="10" step="1" required="required" value=<?=$_GET["b"]?> >
<input type="submit" value="Угадать!" />
</form></center>
</html>
