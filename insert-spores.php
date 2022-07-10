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
    $description = $_POST['description'];
    $magic = $_POST['magic'];
    $asterix = "$strain" . "*";
        //LOG   

     if ($magic == "Yes") {
        $strain = $asterix;
    } else {
        $strain = $_POST['strain'];
    }
$page_title = "Spores"; 
$sql2 = "INSERT INTO LogSubmit (user, label, page, IP) VALUES ('$currentuser', '$label', '$page_title', '$ip')";
if (mysqli_query($db2, $sql2)) { }
 //LOG END
    $sql = "INSERT INTO spores (strain, description) VALUES ('$strain', '$description')";
    if (mysqli_query($db2, $sql)) {
        echo "Spores added. Please refridgerate! </br><a href='spores.php'>Go back</a>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db2);
     }
     mysqli_close($db2);
}

?>
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta http-equiv="refresh" content="3; url='spores.php'" />
</head></html>