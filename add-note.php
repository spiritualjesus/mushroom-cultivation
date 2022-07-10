<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";
include ("fetchinfo.php");


if(isset($_POST['save']))
{
   $content = trim($_POST['content']);
   
   $sql = "INSERT INTO content (user, content) VALUES ('$currentuser', '$content') WHERE user = '$currentuser'";
   $rs = mysqli_query($db2, $sql);
   $affectedRows = mysqli_affected_rows($db2);
   
   if($affectedRows == 1)
   {
      $successMsg = "Record has been saved successfully";
   }
   mysqli_close($db2);
}
    


?>

<meta http-equiv="refresh" content="0; url='welcome.php'" />