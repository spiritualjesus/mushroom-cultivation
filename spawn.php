<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include ("menu.php"); ?>

<title><?php echo $company; ?> - Spawn</title>

<center><h3>Spawn Database</h3></center>
<div align="right"><a href="archive_spawn.php" class="btn btn-success">Archive</a></div>

	<?
if ($row["admin"]) {
	include ("tables/spawn-db-admin.php");
} else {
	include ("tables/spawn-db-user.php");
}

    include ("add-spawn.php");
?>


</body>
</html>