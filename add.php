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
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 	
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($db2, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
						
			// LOG	
			$sql2 = "INSERT INTO LogAccountAdd (user, admin, IP) VALUES ('$username', '$currentuser', '$ip')";
		$stmtlog = mysqli_connect($db2);
       if (mysqli_query($db2, $sql2)) { }
			//LOG END
        // ADD NOTES  
            $sql3 = "INSERT INTO notes (user, content) VALUES ('$username', 'Welcome. Please add notes as you desire.')";
        $stmtnotes = mysqli_connect($db2);
       if (mysqli_query($db2, $sql3)) { }
            //NOTES END
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
	            // Close statement
            mysqli_stmt_close($stmt);
        }
		
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
 //CUSTOM    
	 $admin = $_POST['admin'];
		$import = $_POST['import'];
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, admin, canimport, created_by) VALUES (?, ?, $admin, $import, '$currentuser')";
         
        if($stmt = mysqli_prepare($db2, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo "User added to portal.";
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($db2);
}
?>
 
<!DOCTYPE html>
<html lang="en"><head>
 <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		select option:disabled { color: #CCC; }
    </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"></head>
<body>
    <div class="wrapper" align="left" style="padding-left:30px">
<h3 align="left">Add a user</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" style="width: 300px;" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" style="width: 300px;" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" style="width: 300px;" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
			<div class="form-group">
				<label>Account Type:</label>
				<select name="admin" id="admin">
				<option value="0" title="Limited account: View records, Catalogue">Default User</option>
				<? if ($row['adminadd'] == 0) { ?>
				<option disabled="disabled" value="1" title="To set Administrator, please create account then see Head of Tech">Administrator</option> <? } else { ?>
				<option value="1" title="Access to everything (cannot add admin accounts)">Administrator</option><? } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Can Import:</label>
				<select name="import" id="import">
				<option value="0" title="">No</option>
				<option value="1" title="Allow import of CSV to db">Yes</option>
				</select>
			</div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Add">
                <input type="reset" class="btn btn-default" value="Clear">
            </div>

        </form>
    </div>    
