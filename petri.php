<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include ("menu.php"); ?>

<title><?php echo $company; ?> - Petri Dish</title>

<center><h3>Petri Dish Database</h3></center>
<div align="right"><a href="archive_petri.php" class="btn btn-success">Archive</a></div>

	<?
if ($row["admin"]) {
	include ("tables/petri-db-admin.php");
} else {
	include ("tables/petri-db-user.php");
}

    include ("add-petri.php");
?>


</body>
</html>