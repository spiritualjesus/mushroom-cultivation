<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<? include ("adminmenu.php"); 
require_once "fetchinfo.php";?>

    <div class="page-header">
    <div align="left"><a href="welcome.php" class="btn btn-primary">Home</a></div>
         <!--<div align="left" style="padding-top:3px"><a href="status.php" class="btn btn-primary">Status</a></div>-->
         <? if ($admin) { ?>
        <div align="left" style="padding-top:3px"><a href="spores.php" class="btn btn-primary">Spores</a></div> <? } ?>
        <div align="left" style="padding-top:3px"><a href="grain.php" class="btn btn-primary">Grain</a></div>
        <div align="left" style="padding-top:3px"><a href="spawn.php" class="btn btn-primary">Spawn</a></div>
        <div align="left" style="padding-top:3px"><a href="harvest.php" class="btn btn-primary">Harvest</a></div>
        <div align="left" style="padding-top:3px"><a href="petri.php" class="btn btn-primary">Petri Dishes</a></div>
        <!--<div align="right">
        <div class="w3-dropdown-hover">
        <div style="padding-top:3px"><button class="w3-button btn btn-default" title="" role="button" target="_blank">Tools</button></div> 
        <div class="w3-dropdown-content" style="padding-top:3px">
      <a href="https://oneearthmushrooms.com/pages/cvg-calculator" class="w3-bar-item btn btn-default" title="" role="button" target="_blank">Bulk Substrate Calculator</a>
      <a href="#" class="w3-bar-item btn btn-default" title="" role="button">N/A</a><br>
      <a href="#" class="w3-bar-item btn btn-default" title="" role="button">N/A</a><br>
    
</div>  </div></div>-->
        <center><h1>Hi, <b><?php echo "" . $username . ""; ?></b>.</h1></center>
        <div align="right"><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </div>
  </p>
</div>
</html>