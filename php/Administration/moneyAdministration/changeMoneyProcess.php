<?php
	//Speichert die übermittelten Werte aus changeMoney.php in Variablen
	$id = $_GET["Name"];
	$money = $_GET["newmoney"];
	
	include "../../DB_Connection/dbconnect.php";	//implementiert die Datei dbconnect.php sammt Variablen
	
	//Ruft alle Inhalte aus der Tabelle users auf, wenn diese mit der übermittelten ID übereinstimmen
	$sql = "SELECT * FROM users WHERE ID = '".$id."' ;";
	$result = $conn->query($sql); //Führt den SQL-Befehl aus
	$row = $result->fetch_assoc(); //Schreibt die Datenfelder in ein Arrey
	
	//Speichert den derzeitigen Inhalt von Money in der Tabelle addiert/subtrahiert mit der übermittelten Zahl in eine
	//neue Variable
	$Money = $row["Money"] + $money; 
	//Ändert den Wert in der Tabelle users in den Wert der Variable $Money, wenn die ID übereinstimmt
	$sql = "UPDATE users SET Money = '".$Money."' WHERE ID = '".$id."' ;";
	mysqli_query($conn, $sql); //Führt den SQL-Befehl aus
	header("Location: money.php"); //Leitet auf die Datei money.php um
?>