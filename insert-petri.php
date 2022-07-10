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
    $description = $_POST['description'];
    $dishes = $_POST['dishes'];
    if ($strain == "Other") {
        $strain = $_POST['new-species'];
        // ADD STRAIN
    $sql3 = "INSERT INTO spores (strain) VALUES ('$strain')";
if (mysqli_query($db2, $sql3)) { }
    // STRAIN END
    } else {
        $strain = $_POST['strain'];
    }
  //LOG   
$page_title = "Petri"; 
$sql2 = "INSERT INTO LogSubmit (user, label, page, IP) VALUES ('$currentuser', '$label', '$page_title', '$ip')";
if (mysqli_query($db2, $sql2)) { }
 //LOG END
    $sql = "INSERT INTO petri (username, strain, location, label, description, dishes) VALUES ('$currentuser', '$strain', '$location', '$label', '$description', '$dishes')";
    if (mysqli_query($db2, $sql)) {
        echo "Petri dish added. You are a mushroom master! </br><a href='petri.php'>Go back</a>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($db2);
     }
     mysqli_close($db2);
}

?>
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta http-equiv="refresh" content="3; url='petri.php'" />
</head></html>