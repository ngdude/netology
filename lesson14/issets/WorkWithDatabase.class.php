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
    }
    }

    function userLogin($user,$password)
    {
        $pre = $this->prepare("SELECT * FROM user WHERE login = :login");
        $pre->bindValue(':login', $user, PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        var_dump(count($result));
        echo "</br>";
        var_dump($result);
        echo "</br>";
        var_dump($result[0]['login']);
        echo "</br>";
        var_dump($result[0]['password']);
        if (($result[0]['login'] === $user) && ($result[0]['password'] === $password)){
            $_SESSION["user_id"] = $result[0]['id'];
            $_SESSION["user_name"] = $result[0]['login'];
            return;
        }
        else {
            echo "проверьте имя пользователя ипароль!";
        }
        return $result;
    }


    function gettask($user_id)
    {
        $pre = $this->prepare("SELECT * FROM task where user_id = :user_id");
        $pre->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    function FROMDBtoArray($type,$user_id)
    {
        $ordered = $type === NULL ? '' : " ".'ORDER BY'." $type" ;
        $pre = $this->prepare("SELECT * FROM task where user_id = :user_id".$ordered);
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
    function changetasktatus($id,$status)
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
