<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding("UTF-8");
session_start();
error_reporting(E_ALL);
$homeUrl = 'list.php';
$authUrl = 'index.php';

//var_dump($_SESSION['guest']['111']);
//var_dump($_SESSION['login']);

if (!empty($_SESSION['login']))
    goto next_admin;
elseif (!empty($_SESSION['guest'])){
    echo "<center><h2><p>".'Привет ' . $_SESSION["guest"]["user"] . "</center></h2></p>";
    goto next_guest;
}
else
header('Location: ' . $authUrl);
die;

next_admin:
echo '
<center><p><a href="admin.php">Создать тест</a></p></center>
';
next_guest:

$dir = __DIR__.'/tests//';
$dh = scandir ($dir);
$dh = array_diff( $dh , array('..', '.'));
$dh = array_values($dh);
$dhnew['key'] = array("filename","fullpath","size","modified");

echo "</br>";
echo '<center><table cellpadding="15" cellspacing="0" border="1">';
echo "<tr><td>"."Название Теста"."</td><td>"."Дата создания"."</td><td>"."Удалить"."</tr></td>";
$i=0;
$fulldir = '';
for ( $i ; $i < count($dh) ; $i++) {
    $fulldir = $dir.$dh[$i];
    $filename_no_ext = strstr($dh[$i], '.', true);
    $stats = stat($fulldir);
    $modified = date("d-n-Y H:i:s.",$stats['mtime']);
    echo "<tr><td>".'<a href="'.'form.php?test='.$dh["$i"].'">'.$filename_no_ext.'</a>'."</td><td>".$modified."</td><td>".
    '<a href="'.'delete.php?filename='.$dh["$i"].'">'.$filename_no_ext.'</a>'."</td></tr>";

}
echo "</center></table>";
?>
<center>
</body>
</html>
