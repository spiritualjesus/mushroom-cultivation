<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: login.php");
    exit;
}
require_once "config.php";

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><?php echo $company; ?> - Edit User Logs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		select option:disabled { color: #CCC; }
    </style>
</head>
<body>
<? include ("adminmenu.php"); 
if ($row['admin'] == 0) { echo "<br><br>This page does not exist. <a href='welcome.php'>Go back</a>"; } else {
?>
    <div class="page-header">
	<div align="left"><a href="welcome.php" class="btn btn-primary">Main Portal</a></div>
		<div align="left" style="padding-top:3px"><a href="admin.php" class="btn btn-info">Admin Home</a></div>
        <center><h1>Hi, <b><?php echo "" . $username . ""; ?></b>.</br> Welcome to <?php echo $company; ?> - Admin.</h1></center>
		<div align="left">
		<div class="w3-dropdown-hover">
		<div ><button class="w3-button btn btn-default" title="" role="button" target="_blank">Logs Database</button></div> 
		<div class="w3-dropdown-content">
	  <a href="logs-login.php" class="w3-bar-item btn btn-default" title="" role="button">Login Attempts</a>
	  <a href="logs-search.php" class="w3-bar-item btn btn-default" title="" role="button">Search</a><br>
	  <a href="logs-submit.php" class="w3-bar-item btn btn-default" title="" role="button">Submissions</a><br>
	
</div>	</div><? if ($row['adminadd']) { ?> <div class="w3-dropdown-hover">
	 <button class="w3-button btn btn-default" title="" role="button" target="_blank">Account Logs</button>
	 <div class="w3-dropdown-content">
		 <a href="logs-account-add.php" class="w3-bar-item btn btn-default" title="" role="button">Add</a>
	  <a href="logs-account-edit.php" class="w3-bar-item btn btn-default" title="" role="button">Edit</a>
	 <? } ?>
	  
		</div></div></div>
	<div align="right"><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </div>
	</div><center><h3>Edit User Logs</h3></center>
	 <p> <div class="row">		
	 <div align="left" style="padding-left:30px">	
<? 
include ("tables/admin/table-account-edit.php");  }  ?> </div>
 
  </p></div>
</body>
</html>