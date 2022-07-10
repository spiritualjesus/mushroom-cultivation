<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include ("menu.php"); ?>

<title><?php echo $company; ?> - Harvest</title>

<center><h3>Harvest Database</h3></center>
<!--<div align="right"><a href="archive_harvest.php" class="btn btn-secondary">Archive</a></div> -->

	<?
if ($admin) {
	include ("tables/harvest-db-admin.php");
} else {
	include ("tables/harvest-db-user.php");
}

    include ("add-harvest.php");
?>


</body>
</html>