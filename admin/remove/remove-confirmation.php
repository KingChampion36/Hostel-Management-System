<?php
	include 'variables.php';
	include $root.'auth.inc.php';
	include $back.'session.php';
	
	if(isset($_POST['reg_id']) && !empty($_POST['reg_id']) && isset($_POST['room']) && !empty($_POST['room'])){
			$reg_id=$_POST['reg_id'];
			$room=$_POST['room'];
	}else{
		echo '<script>
			alert("Please fill in all fields");
			window.location.href="remove.php"
			</script>';
		die();
	}
	
	$sql1="SELECT reg_id, room_no  FROM student WHERE reg_id='". $reg_id ."'";
	$result=$conn->query($sql1);
	if($result->num_rows==1){
		$sql1 ="DELETE from student WHERE reg_id='". $reg_id ."'";
		$sql2="UPDATE rooms SET isFull='0' WHERE rooms.room_no='$room'";
		if($conn->query($sql1) && $conn->query($sql2)){
			echo '<script>
					alert("Student successfully removed");
					window.location.href="remove.php"
					</script>';
		}else{
			echo '<script>
					alert("Failed! Student was not removed");
					window.location.href="remove.php"
					</script>';
		}
	}else{
		echo '<script>
			alert("Student not present");
			window.location.href="remove.php"
			</script>';
	}
	$conn->close;

?>

