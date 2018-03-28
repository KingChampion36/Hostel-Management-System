<?php
	include 'variables.php';
	include $root.'auth.inc.php';
	include $back.'session.php';
?>

<!doctype html>
<html>
	<head>
		<meta charset= "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Hostel Management | Admin</title>
		<link rel="stylesheet" href="<?php echo $root?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $root?>font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $root?>css/custom.css">
		<link rel="stylesheet" href="../admin-css.css">
		
	</head>
	
	<body>
		<?php include $root.'header.php';?>
		<div class="container-fluid" style="margin-top:10px;">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-xs-12">
					<?php include $back.'sidebar.php';?>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="page-header">
						<center><h1>UPLOAD NOTICE</h1></center>      
					</div>
					
					<form action="upload-confirmation.php" method="POST">
						<label for="notice_no">Notice Number:</label>
						<input type="text" name="notice_no" required /><br><br>
						<label for="date_of_issue">Date of issue:</label>
						<input type="date" name="date_of_issue" required /><br><br>
						<label for="from">From:</label>
						<textarea name="from" required></textarea><br><br>
						<label for="to">To:</label>
						<textarea name="to" required></textarea><br><br>
						<label for="subject">Subject:</label>
						<textarea name="subject" required></textarea><br><br>
						<label for="content">Content:</label>
						<textarea name="content" required></textarea><br><br>	
						<input type="submit" name="submit" value="Upload" id="button">
						<input type="reset" name="reset" value="Reset" id="button">
					</form>
					
				</div>
				
				<div class="col-lg-3 col-md-3 col-xs-12">
					<form action="<?php echo $back?>logout-confirm.php" method="POST">
						<button type="submit" class="admin-button" id="logout-button" onclick="return confirm('Are you sure you want to logout?');">Logout</button>
					</form>
				</div>				
			</div>
		</div>
		
		<?php include $root."js.php";?>
		<script src="<?php echo $root?>js/jquery-3.2.1.min.js"></script>
		<script src="<?php echo $root?>bootstrap/js/bootstrap.min.js"></script>
		<script>selectside(2);</script>
	</body>
</html>