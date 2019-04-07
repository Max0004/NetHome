<?php
	//Erhält die übermittelten Informationen aus addUser.php und speichert in Variablen
	$n = $_POST["Name"];
	$w = $_POST["work"];
	$d = $_POST["Date"];
			
	include "../../DB_Connection/dbconnect.php"; //Bindet die Datei dbconnect mit ihren Variablen ein
			
	//Schreibt die übermittelten Daten in die Tabelle users und ...
	$sql = "INSERT INTO work(Description,ID,Date) VALUES('$w','$n','$d') SELECT ID FROM users WHERE ID=$n;";
	mysqli_query($conn, $sql);
	//header("Location: postWork.php"); //Leitet nach dem Prozess um auf addUser.php
?>