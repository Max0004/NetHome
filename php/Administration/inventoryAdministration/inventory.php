<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hausinventar</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
	<input type="button" value="Zurück zur Übersicht" style="width: 15em; height: 3em;" onclick="window.location.href='../adminControl.php'"/>
	<input type="button" value="Objekt hinzufügen" style="width: 15em; height: 3em;" onclick="window.location.href='addInventory.php'"/>
	<input type="button" value="Objekt entfernen" style="width: 15em; height: 3em;" onclick="window.location.href='removeInventory.php'"/><br>
	<center><h2>Alle Inhalte im Haus</h2></center><br>
	<?php
		include "../../DB_Connection/dbconnect.php";
	
		$sql = "SELECT inventory.*,room.* FROM inventory INNER JOIN roominventory ON roominventory.ObjectID=inventory.ID INNER JOIN categories ON inventory.CategoryID=categories.ID
		INNER JOIN room ON roominventory.RoomID=room.ID;";
		$result = $conn->query($sql);
		
		if($result ->num_rows > 0){
		echo "<table border=1 cellpadding=1 cellspacing=1>";
		echo "<tr>";
			echo "<th>Objektname</th>";
			echo "<th>Raum</th>";
		echo "</tr>";
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row["inventory.Description"]."</td>";
				echo "<td>".$row["room.Description"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else{
			//Wenn keine Einträge vorhanden sind
			echo "In diesem Haushalt sind keine Einrichtungen registriert";
		}
	$conn->close();
	?>
	</div>
</body>
</html>