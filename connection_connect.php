<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel_crud";
	$conn = new mysqli($servername , $username , $password);
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	if(!$conn->select_db($dbname)){
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->set_charset("utf8");
?>