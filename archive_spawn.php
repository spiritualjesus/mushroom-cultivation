<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include ("menu.php"); ?>
 
<title><?php echo $company; ?> - Archived Spawn</title>
 
<center><h3>Archived Spawn Database</h3></center>

	<?
if ($admin) {
	include ("tables/archive-spawn-db-admin.php");
} else {
	include ("tables/archive-spawn-db-user.php");
}

?>


</body>
</html>