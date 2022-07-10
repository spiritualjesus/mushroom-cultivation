<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";
include ("fetchinfo.php");

if(isset($_POST['submit'])){
    $strain = $_POST['strain'];
    $location = $_POST['location'];
    $label = $_POST['label'];
    $flush = $_POST['flush'];
    $wet = $_POST['wet'];
    $dry = $_POST['dry'];
    if ($strain == "Other") {
        $strain = $_POST['new-species'];
        // ADD STRAIN
    $sql3 = "INSERT INTO spores (strain) VALUES ('$strain')";
if (mysqli_query($db2, $sql3)) { }
    // STRAIN END
    } else {
        $strain = $_POST['strain'];
    }


    $sql = "INSERT INTO harvest (username, strain, location, label, flush, wet, dry) VALUES ('$currentuser', '$strain', '$location', '$label', '$flush', '$wet', '$dry')";
    if (mysqli_query($db2, $sql)) {
        echo "Harvest added. Good job Maestro! </br><a href='harvest.php'>Go back</a>";
        //LOG   
$page_title = "Harvest"; 
$sql2 = "INSERT INTO LogSubmit (user, label, page, IP) VALUES ('$currentuser', '$label', '$page_title', '$ip')";
if (mysqli_query($db2, $sql2)) { }
 //LOG END
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db2);
     }
     mysqli_close($db2);
}

?>
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta http-equiv="refresh" content="2; url='harvest.php'" />
</head></html>