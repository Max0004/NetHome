<?php
	$id = $_GET["Name"];
	$money = $_GET["newmoney"];
	
	include "../../DB_Connection/dbconnect.php";
	
	$sql = "SELECT * FROM users WHERE ID = '".$id."' ;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	$Money = $row["Money"] + $money;
	
	$sql = "UPDATE users SET Money = '".$Money."' WHERE ID = '".$id."' ;";
	mysqli_query($conn, $sql);
	header("Location: money.php");
?>