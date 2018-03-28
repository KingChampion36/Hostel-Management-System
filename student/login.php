<?php
	include 'variables.php';
?>

<!doctype html>
<html>
	<head>
		<meta charset= "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Hostel Management | Admin Login</title>
		<link rel="stylesheet" href="<?php echo $root?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $root?>font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $root?>css/custom.css">
	</head>
	<body>
		<?php include $root.'header.php';?>
		<?php include 'navbar.php';?>
		
		<!--Header for this page-->
		<div class="container">
			<div class="page-header">
				<h1><center>Student Panel</center></h1>      
			</div>
		</div>
		
		<!--Login form -->
		<form action="admin.php" id="admin-form">
			<div class="imgcontainer">
				<center><img class="img-responsive" src="<?php echo $root?>images/login.png" alt="Avatar" class="avatar"></center>
			</div>

			<div class="container" id="logCont">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" id="uname" required>

				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" id="psw" required>
						
				<button type="submit" class="admin-button">Login</button>
				<input type="checkbox" checked="checked"> Remember me
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" class="admin-button" id="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
		<?php include $root.'footer.php';?>
		<script src="<?php echo $root?>js/jquery-3.2.1.min.js"></script>
		<script src="<?php echo $root?>bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>