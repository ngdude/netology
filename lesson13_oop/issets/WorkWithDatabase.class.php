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
    public function FROMDBtoArray($type)
    {
        $ordered = $type === NULL ? '' : 'ORDER BY'." $type" ;
        $pre = $this->prepare("SELECT * FROM tasks ".$ordered);
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addTask($task)
    {
        $pre = $this->prepare("INSERT INTO tasks (description) value (:taskDescription)");
        $pre->bindValue(':taskDescription', $task, PDO::PARAM_STR);
        $result = $pre->execute();
    }
    public function delTask($id)
    {
        $pre = $this->prepare("DELETE FROM tasks where id = :id");
        $pre->bindValue(':id', $id, PDO::PARAM_STR);
        $result = $pre->execute();
    }
    public function editTask($id)
    {
        $pre = $this->prepare("DELETE FROM tasks where id = $id");
        $pre->bindValue(':taskDescription', $task, PDO::PARAM_STR);
        $result = $pre->execute();
    }
    public function changeTaskStatus($id,$status)
    {
        $pre = $this->prepare("UPDATE tasks SET is_done = $status WHERE id = $id");
        $result = $pre->execute();
    }
    public function getDescription($id)
    {
        $pre = $this->prepare("SELECT description FROM tasks WHERE id = :id");
        $pre->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pre->execute();
        $result = $pre->fetchColumn(0);
        return $result;
    }
    public function updateDescription($id,$description)
    {
        $pre = $this->prepare("update tasks set description = :description where id = :id");
        $pre->bindValue(':description', $description, PDO::PARAM_INT);
        $pre->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pre->execute();
    }
}
