<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// count rows
    
include ("config.php");

if (mysqli_connect_errno()) 
{ 
    echo "Database connection failed."; 
} 


$available = "SELECT SUM(available) AS available FROM harvest"; 
$dry = "SELECT SUM(dry) AS dry FROM harvest";
//$strain_available = "SELECT SUM(available) AS strain_available FROM harvest WHERE available > 0";
//$strain = "SELECT strain AS strain FROM harvest WHERE available > 0"; 
$result = mysqli_query($db2, $available);
$result2 = mysqli_query($db2, $dry);
//$storeStrain = Array();
//while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) { $storeStrain[] =  $row['strain']; }


if ($result) 
{ 
    $row = mysqli_fetch_assoc($result); 
    $row2 = mysqli_fetch_assoc($result2); 
    $total = $row2['dry'] - $row['available'];
      
       if ($row) 
          { 
             printf("<div align=\"left\" style=\"padding-left: 4px;\">Total number available : " . $row['available']);
             printf("<div align=\"left\" style=\"padding-top: 2px;\">Total number consumed : " . $total);

             //printf("<div align=\"left\">Available strains : " . $storeStrain); 
          }  
    
    mysqli_free_result($result); 
    mysqli_free_result($result2);

} 


//end

?>