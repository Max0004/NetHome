<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Neues Möbelstück</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
	<meta charset="UTF8" />
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
		<input type="button" value="Abbrechen" style="width: 15em; height: 3em;" onclick="window.location.href='inventory.php'"/><br>	<!--Kehrt zur Inventaransicht zurück-->
		<center><h4>Neues Möbelstück hinzufügen</h4></center>
		<form method="post" action="addInventoryProcess.php">
		<table>
			<tr>
			<td><label>Objektname:</td>
			<td></label><input type="text" name="object" required /></td>
			</tr>
			<tr>
			<td><label>Kategorie:</label></td>
			<td><input type="text" name="category" required /></td>
			</tr>
			<tr>
			<td><label>Raum:</td>
			<td>
			<?php
				include "../../DB_Connection/dbconnect.php";
				$sql = "SELECT * FROM room;";
				$result = $conn->query($sql);
		if($result ->num_rows > 0){
			echo "<select name='room'>";
			//Lädt die Inhalte aus der >Tabeller users in die Combobox und übermittelt die ID des ausgewählten Objekts
			while($row = $result->fetch_assoc()){
				echo "<option value='".$row["ID"]."'>".$row["Description"]."</option>";
			}
			echo "</select><br>";
		}
			?>
			</td>
			</tr>
			<tr>
			<td><label> </td>
			<td></label><input type="submit" /></td>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>