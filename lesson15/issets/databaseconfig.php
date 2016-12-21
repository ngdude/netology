<?php
$configDbGlobalTasks = array(
    'db_type' => 'mysql',
    'db_host' => 'localhost',
    'db_name' => 'dvertiev',
    'db_username' => 'dvertiev',
    'db_password' => 'neto0708'
);
$objTables = new WorkWithDatabase($configDbGlobalTasks);
$objTables1 = new WorkWithDatabase($configDbGlobalTasks);
