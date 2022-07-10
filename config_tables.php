<?php

/* Database for tables. Please edit both credentials in ' ' and " "  */
$tabledit = new MySQLtabledit();
$tabledit->host = 'db_host';
$tabledit->user = 'db_user';
$tabledit->pass = 'db_pass';
$tabledit->database = 'db_name';

$db2 = mysqli_connect("db_host", "db_user", "db_pass", "db_name"); 

?>
