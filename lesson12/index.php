
<?php
include "main.php";

if(!isset($_GET["name"])) { $_GET["name"]=NULL;}
if(!isset($_GET["author"])) { $_GET["author"]=NULL;}
if(!isset($_GET["year"])) { $_GET["year"]=NULL;}

render_form($_GET["name"],$_GET["author"],$_GET["year"]);
render_page($_GET["name"],$_GET["author"],$_GET["year"]);

?>
