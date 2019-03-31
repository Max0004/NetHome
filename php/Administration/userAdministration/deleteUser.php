<?php
	include "../../DB_Connection/dbconnect.php";
	$sql = "DELETE FROM users WHERE ID='$_GET[id]';";	//Löscht die Daten durch die übergebene ID

	$result = $conn->query($sql);
	
	if($conn->query($sql)){
		header("refresh:1; url=removeUser.php");			//Lädt die Seite neu und leitet auf die Admin Nutzer-Übersicht um
	}
	else{
		echo"Kann nicht gelöscht werden!";
	}
?>