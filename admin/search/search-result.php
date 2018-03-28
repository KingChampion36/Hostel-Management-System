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
						<center><h1>Search Results</h1></center>      
					</div>

					<?php
						error_reporting(0);
						if(isset($_POST['room']) && !empty($_POST['room'])){
								$room=$_POST['room'];
						}else{
							echo '<script>
								alert("Please fill in all fields");
								window.location.href="search.php"
								</script>';
							die();
						}

						$sql1="SELECT full_name, email_id, father_name,father_email_id, branch, reg_id, full_address, payment_detail FROM student WHERE room_no='". $room ."'";
						$result=$conn->query($sql1);
						if($result->num_rows>0){
							echo '<h1>Student Details</h1><br>';
							while($row=$result->fetch_assoc()){
								echo "<strong>Name:</strong> ".$row["full_name"] . "<br>" . "<strong>Registration id: </strong>" .
								$row["reg_id"] . "<br>" . "<strong>email: </strong>" . $row["email_id"] ."<br>" .
								"<strong>Father's email: </strong>" . $row["father_email_id"] ."<br>" ."<strong>Father's Name:</strong> ".$row["father_name"] . "<br>" .
								"<strong>Branch:</strong> ".$row["branch"] . "<br>" ."<strong>Address:</strong> ".$row["full_address"] . "<br>" .
								"<strong>Payment details(DD):</strong> ".$row["payment_detail"] . "<br>";
								echo '<br>';
							}
						}else{
							echo '<script>
									alert("No student found.");
									window.location.href="search.php"
									</script>';
						}
						$conn->close;
					?>
					
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
		<script>selectside(7);</script>
	</body>
</html>