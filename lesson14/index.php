<?php
session_start();
if (empty($_SESSION['user_id'])){
    header('HTTP/1.1 302 Found');
    header('Location: auth.php');
}
require_once __DIR__.'//issets/'.('WorkWithDatabase.class.php');
require_once __DIR__.'//issets/'.('databaseconfig.php');
include __DIR__.'//issets/'.('phpconfig.php');

$objTasks = new WorkWithDatabase($configDbGlobalTasks);

// проверка параметров Post и GET
if(!isset($_POST['update'])) {$_POST['update']=NULL;}
if(!isset($_POST['assignTaskToUser'])) {$_POST['assignTaskToUser']=NULL;}
if(!isset($_GET['action'])) { $_GET['action']=NULL;}
if(!isset($_GET['sort_by'])) { $_GET['sort_by']=NULL;}
if(!empty($_POST['createDescription'])) { $objTasks->addTask($_POST['createDescription'],$_SESSION['user_id']);}
if(isset($_POST['edit']) && !empty($_POST['id'])){ $objTasks->updateDescription($_POST['id'],$_POST['edit']);}
if(($_GET['action'] == 'delete') && !empty($_GET['id'])){ $objTasks->delTask($_GET['id']);}
if(!empty($_GET['changeTaskStatus'])){ $objTasks->changeTaskStatus($_GET['changeTaskStatus'],$_GET['Status']);}
if((!empty($_POST['assignTaskToUser'])) && !empty($_POST['id']) && !empty($_POST['assign_to_id'])){ $objTasks->assignTaskTo($_POST['id'],$_POST['assign_to_id']);}

$taskslist = $objTasks->getUsersTasks($_GET['sort_by'],$_SESSION['user_id']);
$taskslistforusers = $objTasks->getTasksForUser($_GET['sort_by'],$_SESSION['user_id']);
$userslist = $objTasks->getUsers();
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
    <center><h2> Привет  <?php echo $_SESSION['user_name'] ;?>! Ваш список Дел!:</h2>
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

            </form>
        </div>

</br>
    <table>
<tr>
    <th>Название задания</th>
    <th>Результат</th>
    <th>Время создания</th>
    <th colspan="3"></th>
    <th>Автор</th>
    <th>Ответственный</th>
    <th></th>
    <th>Переложить Задачу</th>
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
        else {echo "<a href=".$serverUrl.'?changeTaskStatus='.$row['id'].'&Status=0'.">Развыполнить :)</a>"; }?></td>
    <td><?php echo "<a href=".$serverUrl.'?id='.$row['id']."&action=delete>Удалить</a>"; ?></td>
    <td><?php echo $objTasks->getUserById($row['user_id']) ?></td>
    <td><?php if ($row['assigned_user_id'] == NULL) {echo "ВЫ";} else { echo $objTasks->getUserById($row['assigned_user_id']); }  ?></td>
    <td><form action = "<?php echo $serverUrl;?>" method = "POST"><select name="assign_to_id">
        <?php for ($i=0; $i < count($userslist);$i++){ ?>
  <option name="<?php echo $userslist[$i]['login'] ?>"
      value="<?php echo $userslist[$i]['id'] ?>"><?php echo $userslist[$i]['login'];?>
<?php }?>
  </option>
          </select>
      </td>
        <input type="hidden" name="id" placeholder="id" value="<?php echo $row['id'] ?>"/>
    <td><input type="submit" name="assignTaskToUser" value="Назначить" </td>
</form>
</td></tr>
<?php } ?>
</table>

<h4> Заявки от других людей </h2>
<table>
<tr>
<th>Название задания</th>
<th>Результат</th>
<th>Время создания</th>
<th colspan="3"></th>
<th>Автор</th>
<th>Ответственный</th>
</tr>
<?php foreach ($taskslistforusers as $row){?>
<tr><td>
    <?php echo $row['description'];?>
</td><td>
    <?php if ($row['is_done'] == 0 ) echo "<font color=".'red'.">Не выполнено</font>";
else echo "<font color=".'green'.">Выполнено</font>"; ?>
</td><td>
    <?php echo $row['date_added'] ?>
</td><td>
    <td><?php  if ($row['is_done'] == 0 ) {echo "<a href=".$serverUrl.'?changeTaskStatus='.$row['id'].'&Status=1'.">Выполнить</a>"; }
        else {echo "<a href=".$serverUrl.'?changeTaskStatus='.$row['id'].'&Status=0'.">Развыполнить :)</a>"; }?></td>
    <td></td>
    <td><?php echo $objTasks->getUserById($row['user_id']) ?></td>
    <td><?php if ($row['assigned_user_id'] == NULL) {echo "ВЫ";} else { echo $objTasks->getUserById($row['assigned_user_id']); }  ?></td>
<?php }?>

</table>
</center>
</body>
</html>
