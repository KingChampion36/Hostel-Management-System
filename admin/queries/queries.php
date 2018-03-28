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
						<center><h1>Student Queries</h1></center>      
					</div>
					
					<?php
						$conn = new mysqli($host,$user,$pass,$db);
						$q="SELECT full_name, reg_id, room_no, query FROM student WHERE query!='". 0 ."'"; 
						$result=$conn->query($q);
						$i=1;
						if($result->num_rows>0){
							echo '<div class="table-responsive">
								<table class="table table-striped">
								<tr>
									<th>S.No.</td>
									<th>Name</td>
									<th>Registration id</td>
									<th>Room No.</td>
									<th>Query</td>
								</tr>';
								
							while($row=$result->fetch_assoc()){
									echo "<tr><td>$i</td>". "<td>".$row["full_name"] . "</td>" . "<td>" .
									$row["reg_id"] . "</td>" . "<td>" . $row["room_no"] ."</td>". "<td>" . $row["query"] . "</td>";
									$i++;
							}
							echo "</table></div>";
						}else{
								echo '<b>No queries</b>';
						}
						$conn->close();
					?>
					
					<h1>Resolve Queries</h1>
						<form action="resolve.php" method="POST">
							<label for="room_no">Room Number:</label>
							<input type="text" required name="room_no"><br><br>
							<input type="submit" name ="resolve" value="Resolve" id="button">
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
		<script>selectside(3);</script>
	</body>
</html>