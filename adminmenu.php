<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
$username = $_SESSION["username"]; 
$result = mysqli_query($db2, "select * from users WHERE username='$username'  LIMIT 1");
$row = mysqli_fetch_array($result);

if ($row["admin"])  {
?>
 <div align="right"><a href="admin.php"><button type="button" title="Under development">Admin</button></a></div>
<? } // class="btn btn-info disabled"  ?>