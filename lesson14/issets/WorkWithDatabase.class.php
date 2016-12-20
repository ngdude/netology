<?php

class WorkWithDatabase extends PDO
{
    public function __construct($config)
    {
        try {
            parent::__construct($config['db_type'].':host='.$config['db_host'].';
            dbname='.$config['db_name'],$config['db_username'],$config['db_password']);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('ERROR: '. $e->getMessage());
        }
    }

    function addUser($user,$password)
    {
        $pre = $this->prepare("SELECT count(*) FROM user where login = :login");
        $pre->bindValue(':login', $user, PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        if ( $result[0]['count(*)'] > 0 ) {
             echo "Пользователь $user уже существует";}
        else {
        $pre1 = $this->prepare("INSERT INTO user (login,password) values (:login,:password)");
        $pre1->bindValue(':login', $user, PDO::PARAM_STR);
        $pre1->bindValue(':password', $password, PDO::PARAM_STR);
        $result1 = $pre1->execute();
        $this->userLogin($user,$password);
        return;
    }
    }

    function userLogin($user,$password)
    {
        $pre = $this->prepare("SELECT * FROM user WHERE login = :login");
        $pre->bindValue(':login', $user, PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        if (!isset($result[0]['login'])) {$result[0]['login'] = NULL;}
        if (!isset($result[0]['password'])) {$result[0]['password'] = NULL;}
        if (($result[0]['login'] === $user) && ($result[0]['password'] === $password)){
            $_SESSION["user_id"] = $result[0]['id'];
            $_SESSION["user_name"] = $result[0]['login'];
            header('HTTP/1.1 302 Found');
            header('Location: index.php');
        }
        else {
            echo "Неправильные учётные данные";
            return;

        }
        return $result;
    }


    function getUsersTasks($type,$user_id)
    {
        $ordered = $type === NULL ? '' : " ".'ORDER BY'." $type" ;
        $pre = $this->prepare("SELECT * FROM task where user_id = :user_id".$ordered);
        $pre->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    function getTasksForUser($type,$user_id)
    {
        $ordered = $type === NULL ? '' : " ".'ORDER BY'." $type" ;
        $pre = $this->prepare("SELECT * FROM task where assigned_user_id = :user_id".$ordered);
        $pre->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    function addTask($task,$user_id)
    {
        $pre = $this->prepare("INSERT INTO task (description,user_id) values (:taskDescription,:user_id)");
        $pre->bindValue(':taskDescription', $task, PDO::PARAM_STR);
        $pre->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $result = $pre->execute();
    }

    function getUsers()
    {
        $pre = $this->prepare("SELECT id,login FROM user");
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    function getUserById($user_id)
    {
        $pre = $this->prepare("SELECT login FROM user where id = :user_id");
        $pre->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result[0]['login'];
    }

    function delTask($id)
    {
        $pre = $this->prepare("DELETE FROM task where id = :id");
        $pre->bindValue(':id', $id, PDO::PARAM_STR);
        $result = $pre->execute();
    }

    function editTask($id)
    {
        $pre = $this->prepare("DELETE FROM task where id = $id");
        $pre->bindValue(':taskDescription', $task, PDO::PARAM_STR);
        $result = $pre->execute();
    }

    function assignTaskTo($taskid,$userid)
    {
        $pre = $this->prepare("UPDATE task SET assigned_user_id = :userid WHERE id = :taskid");
        $pre->bindValue(':userid', $userid, PDO::PARAM_STR);
        $pre->bindValue(':taskid', $taskid, PDO::PARAM_STR);
        $result = $pre->execute();
    }

    function changeTaskStatus($id,$status)
    {
        $pre = $this->prepare("UPDATE task SET is_done = $status WHERE id = $id");
        $result = $pre->execute();
    }


    function getDescription($id)
    {
        $pre = $this->prepare("SELECT description FROM task WHERE id = :id");
        $pre->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result[0]["description"];
    }
    function updateDescription($id,$description)
    {
        $pre = $this->prepare("update task set description = :description where id = :id");
        $pre->bindValue(':description', $description, PDO::PARAM_INT);
        $pre->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pre->execute();
    }
}
