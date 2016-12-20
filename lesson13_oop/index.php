<?php
include __DIR__.'//issets/'.('phpconfig.php');
require_once __DIR__.'//issets/'.('WorkWithDatabase.class.php');
require_once __DIR__.'//issets/'.('databaseconfig.php');
require_once __DIR__.'//issets/'.('inputdata.php');


$taskslist = $objTasks->fromDBtoArray($_GET['sort_by']);
$serverUrl = $_SERVER['PHP_SELF'];

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
    <center><h2> Мой TODO list</h2>
            <div style="display: inline-block">
            <form action = "<?php echo $serverUrl;?>" method = "POST">
                <?php if(($_GET['action'] == 'edit') && !empty($_GET['id'])){
                 echo '<input type="text" name="edit" placeholder="Описание задачи" value="'.$objTasks->getDescription($_GET['id']).'" />
                <input type="hidden" name="id" placeholder="id" value="'.$_GET['id'].'" />
                <input type="submit" name="update" value="Сохранить" />';}
                else {
                    echo '<input type="text" name="createDescription" placeholder="Описание задачи" value="" />
                   <input type="submit" name="save" value="Добавить" />';}?>
            </form>
            </div>
            <div style="display: inline-block; margin-auto: 0px;">
            <form action = "<?php echo $serverUrl;?>" method = "GET">
                <label for="sort">Сортировать по:</label>
                <select name="sort_by">
                    <option value="date_added">Дате добавления</option>
                    <option value="is_done">Статусу</option>
                    <option value="description">Описанию</option>
                </select>
                <input type="submit" name="sort" value="Отсортировать" />
            </form>
        </div>

</br>
    <table>
<tr>
    <th>Название задания</th>
    <th>Результат</th>
    <th>Время создания</th>
    <th colspan="3"></th>
</tr>
<?php foreach ($taskslist as $row){?>
<tr><td>
    <?php echo $row['description'];?>
</td><td>
    <?php if ($row['is_done'] == 0 ) echo "<font color=".'red'.">Не выполнено</font>";
else echo "<font color=".'green'.">Выполнено</font>"; ?>
</td><td>
    <?php echo $row['date_added'] ?>
</td><td>
    <?php echo "<a href=".$serverUrl.'?id='.$row["id"]."&action=edit>Изменить</a>"; ?></td>
    <td><?php  if ($row['is_done'] == 0 ) {echo "<a href=".$serverUrl.'?changeTaskStatus='.$row['id'].'&Status=1'.">Выполнить</a>"; }
        else {echo "<a href=".$serverUrl.'?changeTaskStatus='.$row["id"].'&Status=0'.">Развыполнить :)</a>"; }?></td>
    <td><?php echo "<a href=".$serverUrl.'?id='.$row['id']."&action=delete>Удалить</a>"; ?></td>
</td></tr>
<?php } ?>
</table></center>
</body>
</html>
