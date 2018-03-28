<?php
	include 'variables.php';
	include $root.'auth.inc.php';
	include $back.'session.php';
	
	$var=0;
	if(isset($_POST['room_no']) && !empty($_POST['room_no'])){
		$room_no=$_POST['room_no'];
	}else{
		die('Error: Please fill in all the fields');
	}
	
	$q="UPDATE student SET query= ". $var . " WHERE room_no = ".$room_no; 
	$result=$conn->query($q);
	if($result){
		echo '<script>
			alert("Issue resolved successfully");
			window.location.href="queries.php"
			</script>';
	}else{
		echo '<script>alert("Issue not resolved")</script>';
	}
?>