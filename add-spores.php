<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config_tables.php";
include ("fetchinfo.php");

?>
 
<!DOCTYPE html>
<html lang="en"><head>
 <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        select option:disabled { color: #CCC; }
    </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="wrapper" align="left" style="padding-left:30px">
<h3 align="left">Add spores</h3>
        <form action="insert-spores.php" method="post">
            <div class="form-group">
                <label>Strain:</label>
                <input id="strain" type="text" required="required" name="strain" title="strain" value="Blue Oyster" style="width: 250px;" onfocus="this.value=''"></input>
            </div>
            <? if ($admin) { ?>
            <div class="form-group">
                <label>Magic:</label>
                <select name="magic" id="magic">
                <option value="Yes" title="Yes">Yes</option>
                <option value="No" title="No">No</option>
                </select>
            </div> <? } ?>
            <div class="form-group">
                <label>Description:</label>
                <input id="description" type="text" required="required" name="description" title="Description" value="Attractive Pearl Oyster" style="width: 250px;" onfocus="this.value=''"></input>
            </div>
          <div class="form-group">
                <input type="submit" name="submit" class="btn btn-warning" value="Add" style="width: 100px; height: 40px;">
                <input type="reset" class="btn btn-default" value="Reset" style="width: 100px; height: 40px;">
            </div>

        </form>
    </div>    
