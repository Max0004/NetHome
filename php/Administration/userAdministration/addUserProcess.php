<?php
	$fn = $_POST["firstname"];
	$nn = $_POST["lastname"];
	$g = $_POST["birthdate"];
	$m = $_POST["Email"];
	$w = $_POST["workplace"];
			
	include "../../DB_Connection/dbconnect.php";
			
	$sql = "INSERT INTO users(FirstName,LastName,Birthdate,Email,Workplace,Money) VALUES('$fn','$nn','$g','$m','$w',0);";
	mysqli_query($conn, $sql);
	header("Location: addUser.php");
?>