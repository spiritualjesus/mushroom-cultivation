<?php

//GET IP Define
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$currentuser = $_SESSION["username"];
require_once "config.php";
$sql = "SELECT admin FROM users";

if ($result = mysqli_query($db2, $sql)) {
  $admin = $row["admin"];
  mysqli_free_result($result);
}
?>