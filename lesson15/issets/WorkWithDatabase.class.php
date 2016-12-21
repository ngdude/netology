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
    public function getTables()
    {
        $pre = $this->prepare("SHOW TABLES");
        $pre->execute();
        $result = $pre->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }
    public function getColumns($table)
    {
        $list_of_tables = $this->getTables();
        if (in_array($table , $list_of_tables)){
        $pre = $this->prepare("DESCRIBE $table");
        //$pre->bindValue(':table' ,$table , PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        }
        else return;
    }
    public function setFieldName($table)
    {
        $pre = $this->prepare("DESCRIBE $table");
        //$pre->bindValue(':table' ,$table , PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
