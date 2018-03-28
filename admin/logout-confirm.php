<?php
	session_start();
	unset($_SESSION['admin']);
	$url = "login.php";
	if(isset($_POST["session_expired"])) {
		$url .= "?session_expired=" . $_POST["session_expired"];
	}
	header("Location:$url");
?>