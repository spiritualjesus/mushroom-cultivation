<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include ("menu.php"); ?>

<title><?php echo $company; ?> - Grain</title>

<center><h3>Grain Database</h3></center> 
<div align="right"><a href="archive_grain.php" class="btn btn-success">Archive</a></div>
	<?
if ($admin) {
	include ("tables/grain-db-admin.php");
} else {
	include ("tables/grain-db-user.php");
}

    include ("add-grain.php");
?>


</body>
</html>