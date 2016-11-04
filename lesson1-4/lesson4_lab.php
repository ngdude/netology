<?php

$df = array ();

$handle = fopen('file.csv', 'r');
while ($row = fgetcsv($handle, 1000, ';'))
{
$df[] = $row;
}
fclose($handle);

//echo "</br>";
//var_dump ($df);
//echo "</br>";

echo '<center><table cellpadding="15" cellspacing="0" border="1">';
for ($i=0 ; $i < count($df) ; $i++){
$normaldate = date('d-m-Y H:i:s' , $df[$i][3]) ;
echo "<tr><td>".'<a href="'.$df[$i][1].'">"'.$df[$i][0].'"</a>'."</td><td>".$df[$i][2]." bytes".
"</td><td>".$normaldate."</td><td>".'<img src="'.$df[$i][4].'">"'."</td></tr>";



}
echo "</center></table>";

//    echo '<a href="'.$df[$i][1].'">"'.$df[$i][0].'"</a>';
//    echo $df[$i][2].' ';
//    echo $df[$i][3].' '."</br>";

?>
