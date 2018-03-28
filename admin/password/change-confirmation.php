<?php
	include 'variables.php';
	include $root.'auth.inc.php';
	include $back.'session.php';
	
	if(isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password'])){
			$old_user=$_POST['old_password'];
			$new_user=$_POST['new_password'];
	}else{
		echo '<script>
			alert("Please fill in all fields");
			window.location.href="password.php"
			</script>';
		die();
	}
	$id=1;
	$sql1="SELECT password FROM admin WHERE password='". $old_password ."'" ;
	$result=$conn->query($sql1);
	if($result->num_rows==1){
		$sql="UPDATE admin SET password='". $new_password ."'WHERE ID='".$id."'";
		if($conn->query($sql)){
			echo '<script>
				alert("Password successfully changed");
				window.location.href="password.php"
				</script>';
		}else{
			echo '<script>
				alert("Password change failed");
				window.location.href="password.php"
				</script>';
		}
	}else{
		echo '<script>
			alert("Enter your current password correctly");
			window.location.href="password.php"
			</script>';
	}
	$conn->close;
?>