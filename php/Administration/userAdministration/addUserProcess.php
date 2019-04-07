<?php
	//Erhält die übermittelten Informationen aus addUser.php und speichert in Variablen
	$fn = $_POST["firstname"];
	$nn = $_POST["lastname"];
	$g = $_POST["birthdate"];
	$m = $_POST["Email"];
	$w = $_POST["workplace"];
	$po = $_POST["position"];
	$u = $_POST["username"];
	$pa = $_POST["password"];
	$a = $_POST["isadmin"];
			
	include "../../DB_Connection/dbconnect.php"; //Bindet die Datei dbconnect mit ihren Variablen ein
			
	//Schreibt die übermittelten Daten in die Tabelle users und ...
	$sql = "INSERT INTO users(FirstName,LastName,Birthdate,Email,Workplace,Money,Username,Password,IsAdmin) VALUES('$fn','$nn','$g','$m','$w',0,'$u','$pa','$a');";
	mysqli_query($conn, $sql);
	//...in die Tabelle household
	$sql = "INSERT INTO household(Position) VALUE('$po');";
	mysqli_query($conn, $sql);
	header("Location: addUser.php"); //Leitet nach dem Prozess um auf addUser.php
?>