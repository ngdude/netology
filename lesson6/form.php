<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<br />
<center><H3>
<?php
include 'functions.php';
if (!isset($_GET['test'])) {echo 400;die;}
lookforfile($_GET['test']);
form_render($_GET['test']);
?>
<center>
</body>
</html>
