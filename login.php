<?php
session_start();
include "utils/validation.php";
include "utils/util.php";
include "config.php";

if(isset($_SESSION['username']) || isset($_SESSION['student_id']) || isset($_SESSION['admin_id']) || isset($_SESSION['instructor_id'])) {

	if(isset($_SESSION['student_id'])){
		Util::redirectPage("student");
	}
	
	if(isset($_SESSION['admin_id'])){
		Util::redirectPage("admin");
	}

	if(isset($_SESSION['instructor_id'])){
		Util::redirectPage("instructor");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Login - <?= SITE_NAME ?>
	</title>
	<link rel="stylesheet" 
	      type="text/css" 
	      href="assets/css/login-signup.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<!--  F444ff#f -->
    <div class="wrapper">
    	<div class="form-holder">
    		<div class="logo">
    			<img src="assets/img/Logo.png">
    		    <h4>SIGN IN</h4>
    		</div>
    		<?php 
                if (isset($_GET['error'])) { ?>
                	<p class="error"><?=Validation::clean($_GET['error'])?></p>
            <?php } ?>
    		
    		<form class="form"
    		      action="Action/login.php" 
    		      method="POST">
    			<div class="form-group">
    				<label>Username</label>
    				<input type="text" 
    				       name="username"
    				       placeholder="Username"
    				       value="">
    			</div>
    			<div class="form-group">
    				<label>Password</label>
    				<input type="password" 
    				       name="password"
    				       placeholder="Password"
    				       value="">
    			</div>
				<div class="form-group">
					<label>Role:</label><br />
    				<select name="role">
					   <option value="Admin">Admin</option>
					   <option value="Instructor">Instructor</option>
					   <option value="Student">Student</option>
					</select>
    			</div><br />
    			<div class="form-group">
    				<button type="submit">Login</button>
    			</div>
    			<div class="form-group action-links">
					Don't have an account? <a href="signup.php">Sign Up</a>
    			</div>
    		</form>
    	</div>
    </div>
</body>
</html>