<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
	
	$session = ($_SESSION[""]);

}

require_once "config.php";

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?php echo $company; ?> - Emoji of the month</title>
	<meta http-equiv="refresh" content="12;url=welcome.php" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<p>
<br>
Take a moment to appreciate the emoji of the month or <a href="welcome.php">proceed to login...</a>
<center>
<br><br><h2>Emoji of the month</h2><br><br><br>
<img src="emoji.jpg" height="500" width="400"></img>
<br>
