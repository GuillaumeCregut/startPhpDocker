<?php
$pdo=new PDO('mysql:dbname=dbname;host=db;charset=UTF8','userdb', 'userpass', [
     PDO::MYSQL_ATTR_INIT_COMMAND => "set lc_time_names = 'fr_FR'"
]);
var_dump($pdo);