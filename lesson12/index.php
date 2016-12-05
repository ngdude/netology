
<?php
include "main.php";
if(isset($_GET["clearfilter"])){$_GET["name"]=NULL; $_GET["author"]=NULL;$_GET["year"]=NULL;}
if(!isset($_GET["name"])) { $_GET["name"]=NULL;}
if(!isset($_GET["author"])) { $_GET["author"]=NULL;}
if(!isset($_GET["year"])) { $_GET["year"]=NULL;}
$arrayDbGlobal = fromDBtoArray($_GET["name"],$_GET["author"],$_GET["year"]);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }
    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    table th {
        background: #eee;
    }
        </style>
    </head>
    <body>
        <center><h2> Библиотека успешного человека </h2>
        <?php renderForm($_GET["name"],$_GET["author"],$_GET["year"]);?>
    </br>
        <table>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>
<?php foreach ($arrayDbGlobal as $row){?>
    <tr><td>
        <?php echo $row["name"];?>
    </td><td>
        <?php echo $row["author"] ?>
    </td><td>
        <?php echo $row["year"] ?>
    </td><td>
        <?php echo $row["genre"] ?>
    </td><td>
        <?php echo $row["isbn"] ?>
    </td></tr>
<?php } ?>
</table></center>
    </body>
</html>
