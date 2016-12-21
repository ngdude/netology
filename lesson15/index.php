<?php
include __DIR__.'//issets/'.('phpconfig.php');
require_once __DIR__.'//issets/'.('WorkWithDatabase.class.php');
require_once __DIR__.'//issets/'.('databaseconfig.php');
require_once __DIR__.'//issets/'.('inputdata.php');
$serverUrl = $_SERVER['PHP_SELF'];
$list_of_tables = $objTables->getTables();
?>

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
    <center><h2>Анализируем таблицы в базе данных:</h2>

</br>

<form action = "<?php echo $serverUrl;?>" method = "GET">
    <select name="columnName">
            <?php foreach ($list_of_tables as $value) { ?>
      <option name="<?php echo $value?>" value="<?php echo $value?>">
          <?php echo $value;}?>
      </option>
  </select>
        <input type="submit" value="Показать таблицу" />
</form>
<table>
<tr>
<th>Field</th>
<th>Type</th>
<th>Null</th>
<th>Key</th>
<th>Default</th>
<th>Extra</th>
</tr>
<?php for ($i=0;$i<count($list_of_columns);$i++){?>
<tr><td>
    <?php echo $list_of_columns[$i]['Field']?>
</td><td>
    <?php echo $list_of_columns[$i]['Type']?>
</td><td>
    <?php echo $list_of_columns[$i]['Null']?>
</td><td>
    <?php echo $list_of_columns[$i]['Key']?>
</td><td>
    <?php echo $list_of_columns[$i]['Default']?>
</td><td>
    <?php echo $list_of_columns[$i]['Extra'];?>
</td></tr>
<?php } ?>
    </center>
</body>
</html>
