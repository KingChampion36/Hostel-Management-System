<?php
	include 'variables.php';
	include $root.'auth.inc.php';
	include $back.'session.php';
	
	if(isset($_POST['old_user']) && !empty($_POST['old_user']) && isset($_POST['new_user']) && !empty($_POST['new_user'])){
			$old_user=$_POST['old_user'];
			$new_user=$_POST['new_user'];
	}else{
		echo '<script>
			alert("Please fill in all fields");
			window.location.href="username.php"
			</script>';
		die();
	}
	$id=1;
	$sql1="SELECT user_name FROM admin WHERE user_name='". $old_user ."'" ;
	$result=$conn->query($sql1);
	if($result->num_rows==1){
		$sql="UPDATE admin SET user_name='". $new_user ."'WHERE ID='".$id."'";
		if($conn->query($sql)){
			echo '<script>
				alert("Username successfully changed");
				window.location.href="username.php"
				</script>';
		}else{
			echo '<script>
				alert("Username change failed");
				window.location.href="username.php"
				</script>';
		}
	}else{
		echo '<script>
			alert("Enter your current username correctly");
			window.location.href="username.php"
			</script>';
	}
	$conn->close;
?>