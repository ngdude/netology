<?php
// проверка параметров Post и GET
if(!isset($_POST['update'])) {
    $_POST['update']=null;
}
if(!isset($_POST['assignTaskToUser'])) {
    $_POST['assignTaskToUser']=null;
}
if(!isset($_GET['action'])) {
    $_GET['action']=null;
}
if(!isset($_GET['sort_by'])) {
    $_GET['sort_by']=null;
}
if(!empty($_POST['createDescription'])) {
    $objTasks->addTask($_POST['createDescription'],$_SESSION['user_id']);
}
if(isset($_POST['edit']) && !empty($_POST['id'])){
    $objTasks->updateDescription($_POST['id'],$_POST['edit']);
}
if(($_GET['action'] == 'delete') && !empty($_GET['id'])){
    $objTasks->delTask($_GET['id']);
}
if(!empty($_GET['changeTaskStatus'])){
    $objTasks->changeTaskStatus($_GET['changeTaskStatus'],$_GET['Status']);
}
if((!empty($_POST['assignTaskToUser'])) && !empty($_POST['id']) && !empty($_POST['assign_to_id'])) {
    $objTasks->assignTaskTo($_POST['id'],$_POST['assign_to_id']);
}
