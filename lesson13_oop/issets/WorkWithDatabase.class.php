<?php
class WorkWithDatabase extends PDO{

    function __construct($config){

        try {
            parent::__construct($config['db_type'].
            ':host='.$config['db_host'].';
            dbname='.$config['db_name'],$config['db_username'],
            $config['db_password']);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die('ERROR: '. $e->getMessage());
        }

    }
    function    getTasks(){
        $pre = $this->prepare("select * from tasks");
        $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }

    function fromDBtoArray($type)
        {
        if ($type === NULL) {
            $pre = $this->prepare("select * from tasks");
            $pre->execute();
            $result = $pre->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }
        else {
            $pre = $this->prepare("select * from tasks order by $type");
            $pre->execute();
            $result = $pre->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    function addTask($task){
        $pre = $this->prepare("insert into tasks (description) value (:taskDescription)");
        $pre->bindValue(':taskDescription', $task, PDO::PARAM_STR);
        $result = $pre->execute();
    }

    function delTask($id){
        $pre = $this->prepare("delete from tasks where id = :id");
        $pre->bindValue(':id', $id, PDO::PARAM_STR);
        $result = $pre->execute();
    }

    function editTask($id){
        $pre = $this->prepare("delete from tasks where id = $id");
        $pre->bindValue(':taskDescription', $task, PDO::PARAM_STR);
        $result = $pre->execute();
    }

    function changeTaskStatus($id,$status){
        $pre = $this->prepare("UPDATE tasks SET is_done = $status WHERE id = $id");
        $result = $pre->execute();
    }

    function getDescription($id){
        $pre = $this->prepare("select description from tasks WHERE id = :id");
        $pre->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pre->execute();
        $result = $pre->fetchall(PDO::FETCH_ASSOC);
        return $result[0]["description"];
    }

    function updateDescription($id,$description){
        $pre = $this->prepare("update tasks set description = :description where id = :id");
        $pre->bindValue(':description', $description, PDO::PARAM_INT);
        $pre->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $pre->execute();
    }
}
?>
