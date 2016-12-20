<?php

if(!isset($_POST['update'])) {
    $_POST['update']=NULL;
}
if(!isset($_GET['action'])) {
    $_GET['action']=NULL;
}
if(!isset($_GET['sort_by'])) {
    $_GET['sort_by']=NULL;
}
if(!empty($_POST['createDescription'])) {
    $objTasks->addTask($_POST['createDescription']);
}
if(isset($_POST['edit']) && !empty($_POST['id']))
{ $objTasks->updateDescription($_POST['id'],$_POST['edit']);
}
if(($_GET['action'] == 'delete') && !empty($_GET['id'])){
     $objTasks->delTask($_GET['id']);
 }
if(!empty($_GET['changeTaskStatus'])){
    $objTasks->changeTaskStatus($_GET['changeTaskStatus'],$_GET['Status']);
}
