<?php
require __DIR__.'/vendor/autoload.php';
include __DIR__.'/issets/main.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Поиск данных на карте</title>
    </head>
    <body>
    <center>
        <h1>Поиск данных на карте</h1>
    <form action="<?php echo $serverUrl;?>" method = "GET">
      <input type="text" name="address">
      <input type="submit">
    </form>
    <p><?php echo "<p>$lookForRequest</p>";?></p>
    <img src="<?php echo $linkToMap;?>">
    </center>
    </body>
</html>
