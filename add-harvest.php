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
 
<!DOCTYPE html>
<html lang="en"><head>
 <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        select option:disabled { color: #CCC; }
    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <script>
// Put this script in header or above select element
    function check(elem) {
        // use one of possible conditions
        if (elem.value == 'Other') {
        //if (elem.selectedIndex == 3) {
            document.getElementById("other-div").style.display = 'block';
        } else {
            document.getElementById("other-div").style.display = 'none';
        }
    }
</script></head>
<body>
    <div class="wrapper" align="left" style="padding-left:30px">
<h3 align="left">Add a harvest</h3>
        <form action="insert-harvest.php" method="post">
            <div class="form-group">
                <label>Strain:</label>
                <select name="strain" id="strain" id="mySelect" onChange="check(this);">
            <?php 
            $sql3 = "SELECT * FROM `spores` ORDER BY strain ASC";
            $all_categories = mysqli_query($db2,$sql3);
                while ($strain = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
                    //if ($admin == 0) {
                        //if(strpos($strain['strain'], "*") !== false){}
                           // else { 
            ?>
                <option value="<?php echo $strain["strain"]; ?>" title="<?php echo $strain["description"];?>">
                    <?php echo $strain["strain"]; //} } ?>
                </option>
            <?php 
                endwhile; 
            ?>
                <option>Other</option>
        </select>
                
        <div id="other-div" style="display:none;"></br>
        <label>Enter new species:
        <input id="new-species" name="new-species" title="new-species" style="width: 250px;"></input>
        </label>
            </div>
            </div>
            <div class="form-group">
                <label>Location:</label>
                <select name="location" id="location" id="mySelect" onChange="check(this);">
            <?php 
            $sql4 = "SELECT * FROM `location` ORDER BY location ASC";
            $fetch_location = mysqli_query($db2,$sql4);
                while ($location = mysqli_fetch_array(
                        $fetch_location,MYSQLI_ASSOC)):; ?>
                <option value="<?php echo $location["location"]; ?>">
                    <?php echo $location["location"];?>
                </option>
            <?php 
                endwhile; 
            ?>
                </select>
            </div>
            <div class="form-group">
                <label>Label</label>
                <input type="text" required="required" name="label" value="" class="form-control" style="width: 70px;" onfocus="this.value=''">
            </div>
             <div class="form-group">
                <label>Flush</label>
                <input type="text" required="required" name="flush" value="1, 2 or 3" class="form-control" style="width: 50px;" onfocus="this.value=''">
            </div>
            <div class="form-group">
                <label>Wet</label>
                <input type="text" required="required" name="wet" value="0" class="form-control" style="width: 50px;" onfocus="this.value=''">
            </div>
            <div class="form-group">
                <label>Dry</label>
                <input type="text" required="required" name="dry" value="0" class="form-control" style="width: 50px;" onfocus="this.value=''">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-warning" value="Add" style="width: 100px; height: 40px;">
                <input type="reset" class="btn btn-default" value="Reset" style="width: 100px; height: 40px;">
            </div>
<br>
        </form>
    </div>    
</body></html>
