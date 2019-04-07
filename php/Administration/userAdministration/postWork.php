<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Vergebe Arbeitsaufträge</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
	<meta charset="UTF8"/>
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
		<input type="button" value="Zurück zur Übersicht" style="width: 15em; height: 3em;" onclick="window.location.href='../adminControl.php'"/><br>
		<form method="POST" action="postWorkProcess.php">
			<?php
				include "../../DB_Connection/dbconnect.php";
				$sql = "SELECT * FROM users;";
				$result = $conn->query($sql);
		if($result ->num_rows > 0){
			echo "<select name='Name'>";
			//Lädt die Inhalte aus der >Tabeller users in die Combobox und übermittelt die ID des ausgewählten Objekts
			while($row = $result->fetch_assoc()){
				echo "<option value='".$row["ID"]."'>".$row["FirstName"].$row["LastName"]."</option>";
			}
			echo "</select><br>";
			//Die eingegebene Zahl (positiver oder negativer Wert) wird als newmoney übermittelt
			echo "<input type='text' name='work' required /><br>";
			echo "<input type='date' name='Date' required /><br>";
			echo "<input type='submit' />";
		}
		else{
			echo "Es sind keine Einwohner registriert";
		}
			?>
		</form>
	</div>
</body>
</html>