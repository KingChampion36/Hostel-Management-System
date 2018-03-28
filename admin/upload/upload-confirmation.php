<?php
	include 'variables.php';
	include $root.'auth.inc.php';
	include $back.'session.php';

	if(isset($_POST['notice_no']) && !empty($_POST['notice_no']) && isset($_POST['date_of_issue']) && !empty($_POST['date_of_issue']) && 
		isset($_POST['from']) && !empty($_POST['from']) && isset($_POST['to']) && !empty($_POST['to']) &&
		isset($_POST['subject']) && !empty($_POST['subject']) && isset($_POST['content']) && !empty($_POST['content'])){
		
		$notice_no=$_POST['notice_no'];
		$date_of_issue=$_POST['date_of_issue'];
		$from=$_POST['from'];
		$to=$_POST['to'];
		$subject=$_POST['subject'];
		$content=$_POST['content'];
		
	}else{
		die('Error: Please fill in all the fields');
	}
	
	$q="SELECT notice_no FROM notice WHERE notice_no='". $notice_no ."'"; 
	$result=$conn->query($q);
	if($result->num_rows>0){
		echo "<script>alert('Notice Number already exists. Try another notice number')</script>";
		die();
	}
	
	$sql = "INSERT INTO notice (notice_no, date_of_issue, notice_from, notice_to, subject, content)
		    VALUES ('$notice_no', '$date_of_issue', '$from', '$to', '$subject', '$content' )";
	
	if($conn->query($sql)){
		echo '<script>
			alert("Notice uploaded successfully");
			window.location.href="notice-upload.php"
			</script>';
	}else{
		echo '<script>
			alert("Notice upload failed");
			window.location.href="notice-upload.php"
			</script>';
	}
	$conn->close;
?>