<?php
	$fn = $_POST["firstname"];
	$nn = $_POST["lastname"];
	$g = $_POST["birthdate"];
	$m = $_POST["Email"];
	$w = $_POST["workplace"];
			
	include "../dbconnect.php";
			
	$sql = "INSERT INTO users(FirstName,LastName,Birthdate,Email,Workplace) VALUE(".$fn.",".$nn.",".$g.",".$m.",".$w.");";
	//$url = "addUser.php";
	//echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
?>