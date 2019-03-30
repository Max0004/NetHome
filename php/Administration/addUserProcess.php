<?php
	$fn = $_POST["firstname"];
	$nn = $_POST["lastname"];
	$g = $_POST["birthdate"];
	$m = $_POST["Email"];
	$w = $_POST["workplace"];
			
	include "../dbconnect.php";
			
	$sql = "INSERT INTO users(FirstName,LastName,Birthdate,Email,Workplace) VALUES('$fn','$nn','$g','$m','$w');";
	mysqli_query($conn, $sql);
	header("Location: ../users.php");
?>