<?php
	//Erhält die übermittelten Informationen aus addInventory.php und speichert in Variablen
	$o = $_GET["object"];
	$c = $_GET["category"];
	$r = $_GET["room"];
			
	include "../../DB_Connection/dbconnect.php"; //Bindet die Datei dbconnect.php mit ihren Variablen ein
	
	//...in die Tabelle categories
	$sql = "INSERT INTO categories(Description) VALUE('$c');";
	mysqli_query($conn, $sql);
	//Schreibt die übermittelten Daten in die Tabelle users und ...
	$sql = "INSERT INTO inventory(Description,CategoryID) VALUE('$o') SELECT ID FROM categories;";
	mysqli_query($conn, $sql);
	$sql = "INSERT INTO roominventory(OjectID,RoomID) SELECT categories.ID,room.ID FROM categories INNER JOIN inventory ON inventory.CategoryID=categories.ID WHERE roominventory.CategoryID=$c;";
	mysqli_query($conn, $sql);
	header("Location: inventory.php"); //Leitet nach dem Prozess um auf addUser.php
?>