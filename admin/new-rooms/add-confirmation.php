<?php
	include 'variables.php';
	include $root.'auth.inc.php';
	include $back.'session.php';
	
	/*Checking if input data are not empty*/
	if(isset($_POST['floor']) && !empty($_POST['floor']) && isset($_POST['room']) && !empty($_POST['room'])){
			$floor=$_POST['floor'];
			$room=$_POST['room'];
	}else{
		echo '<script>
			alert("Please fill in all fields");
			window.location.href="add-rooms.php"
			</script>';
		die();
	}
	
	/*SQL query*/
	$sql1="SELECT room_no FROM rooms WHERE floor_no='". $floor ."'AND room_no='". $room ."'" ;
	$result=$conn->query($sql1);
	
	/*If a unique room number is entered by the admin*/
	if($result->num_rows==0){
		$sql = "INSERT INTO rooms (floor_no,room_no,isFull)VALUES ('$floor', '$room','0')";
		if($conn->query($sql)){
			echo '<script>
					alert("Room successfully added.");
					window.location.href="add-rooms.php"
					</script>';
		}else{
			echo '<script>
					alert("Failed! Room not added.");
					window.location.href="add-rooms.php"
					</script>';
		}
	
	/*Room is already present in the hostel*/
	}else{
		echo '<script>
			alert("Room is already available in the hostel");
			window.location.href="add-rooms.php"
			</script>';
	}
	
	/*Closing the database connection*/
	$conn->close;
?>