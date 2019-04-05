<?php
	//Verbinde die Datei mit der Datenband 'housemanagement'
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "housemanagement";
	
	//Schreibt alle übermittelten Daten in einer Variable vom Typ mysqli
	$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbname);
	
	//Überprüfft, ob es einen Fehler bei der Verbindung gibt.
	if($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
?>