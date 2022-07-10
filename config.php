<?php

// Company title
$company = "Gourmet Mushroom Co";

/* Database credentials. Please edit */

define('DB_SERVER', 'localhost'); 
define('DB_USERNAME', 'db_user_edit');
define('DB_PASSWORD', 'db_pass_edit');
define('DB_NAME', 'db_name_edit');

/* DO NOT EDIT BELOW THIS LINE */
$db2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($db2 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
