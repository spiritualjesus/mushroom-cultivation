<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include ("menu.php"); ?>
 
<title><?php echo $company; ?> - Archived Grain</title>
  

<center><h3>Archived Grain Database</h3></center>
	<?
if ($admin) {
	include ("tables/archive-grain-db-admin.php");
} else {
	include ("tables/archive-grain-db-user.php");
}

?>


</body>
</html>