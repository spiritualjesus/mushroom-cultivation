<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include ("menu.php"); ?>

<title><?php echo $company; ?> - Welcome</title>

<? include ("front-widget-total.php"); ?><br>
<center><h3>Personalised Notes</h3>

<? include ("front-widget-notes.php"); ?>

<br><br></center>
</body>
</html>