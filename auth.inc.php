<?php
	$host='localhost';
	$user='root';
	$pass='';
	$db='hmproject';
	
	/*Connecting to the database */
	$conn=new mysqli($host, $user, $pass, $db);
	
	if ($conn->connect_error) {
		die("Connection to database failed");
	}
?>