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
?>
<head>
<style>
  .success-msg{
  display: block;
  margin-left: auto;
  margin-right: auto;
  background:#15a869;
  border:1px solid #15a869;
  color:#ffffff;
  width:45%;
}
</style>
</head>
<?
//SELECT CONTENT
$res = mysqli_query($db2, "SELECT content FROM notes WHERE user = '$currentuser'");
$row = mysqli_fetch_assoc($res);
$dbcontent = $row["content"]; 

//CATCH INFO / SUBMIT
if(isset($_POST['submit'])) {

  $content = trim($_POST['content']);
   
  $sql = "UPDATE notes SET content = '$content' WHERE user = '$currentuser'";
  $affectedRows = mysqli_affected_rows($db2);
  
  if ($db2->query($sql) === TRUE) {
    if($affectedRows == 1)
    {
      $successMsg = "Updated.";
    }
  } else {
    echo "Error updating notes: " . $conn->error;
}
}

?>

<body>
  <?php 
    if(isset($successMsg))
    {
      echo "<div class='success-msg'>";
      echo $successMsg;
      echo "</div>";?>
      <meta http-equiv="refresh" content="2"><?
    }
  ?>
</body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <textarea name="content" id="content" rows="20" cols="100"><?php echo $dbcontent; ?></textarea>
  <input type="submit" name="submit" value="Save"/>
</form>
</html>