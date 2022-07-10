<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include ("menu.php"); ?>

<title><?php echo $company; ?> - Spores</title>

<center><h3>Spores Database</h3></center> 
	<?
if ($row["admin"]) {
	include ("tables/spores-db-admin.php");
} else {
	include ("tables/spores-db-user.php");
}

    include ("add-spores.php");
?>


</body>
</html>