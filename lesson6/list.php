<?php

error_reporting(E_ALL);

$dir = './tests/';
$dh = scandir ($dir);
$dh = array_diff( $dh , array('..', '.'));
$dh = array_values($dh);

$dhnew['key'] = array("filename","fullpath","size","modified");

echo "</br>";
echo '<center><table cellpadding="15" cellspacing="0" border="1">';
echo "<tr><td>"."Название Теста"."</td><td>"."Дата создания"."</tr></td>";
$i=0;
$fulldir = '';
for ( $i ; $i < count($dh) ; $i++) {
    $fulldir = $dir.$dh[$i];
    $filename_no_ext = strstr($dh[$i], '.', true);
    $stats = stat($fulldir);
    $modified = date("d-n-Y H:i:s.",$stats['mtime']);

    echo "<tr><td>".'<a href="'.'form.php?test='.$dh["$i"].'">'.$filename_no_ext.'</a>'."</td><td>".$modified."</td></tr>";


}
echo "</center></table>";
echo "</br>";


echo '<center><table cellpadding="15" cellspacing="0" border="1">';





?>
<center>
</body>
</html>
