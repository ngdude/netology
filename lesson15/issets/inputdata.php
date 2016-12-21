<?php
if(!empty($_GET['columnName'])){
$list_of_columns = $objTables->getColumns($_GET['columnName']);
} else {
$list_of_columns  = array();
}
