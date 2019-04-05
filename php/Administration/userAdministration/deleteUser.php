<?php
	include "../../DB_Connection/dbconnect.php";
	//Löscht alle Inhalte in den Tabellen users und household, wenn diese mit der überlieferten id übereinstimmt
	$sql = "DELETE users.*,household.* FROM users JOIN household ON household.UserID=users.ID WHERE users.ID='$_GET[id]' AND household.UserID='$_GET[id]';";	//Löscht die Daten durch die übergebene ID
	
	//Wenn der Befehl funktioniert...
	if($conn->query($sql) === TRUE){
		header("refresh:1; url=removeUser.php");			//... lädt die Seite neu und leitet auf die Admin Nutzer-Übersicht um
	}
	//Wenn nicht...
	else{
		echo"Kann nicht gelöscht werden!".$conn->error; //Gibt eine Fehlermeldung aus
	}
?>