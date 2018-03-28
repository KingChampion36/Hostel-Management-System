<?php
	session_start();
	if(!isset($_SESSION['admin']['user']) && !isset($_SESSION['admin']['password'])){
		echo '<script>
				alert("You have to login to access this page. Use correct username and password.");
				window.location.href="login.php";
				</script>';
		die();
	}
?>
