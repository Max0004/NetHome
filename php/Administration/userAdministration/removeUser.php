<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bewohner ausziehen lassen</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
		<input type="button" value="Zurück zur Übersicht" style="width: 15em; height: 3em;" onclick="window.location.href='../adminControl.php'"/><br><p>
		<table border=1 cellpadding=1 cellspacing=1>
			<tr>
				<th>Nachname</th>
				<th>Vorname</th>
				<th>Löschen</th>
			</tr>
			<?php
				include "../../DB_Connection/dbconnect.php";
				//Ruft alle Inhalte aus der Tabelle users auf
				$sql = "SELECT * FROM users;";
				//Führt den SQL-Befehl aus
				$result = $conn->query($sql);
				//Durchläuft eine Schleife, zeigt die Inhalte vom Datenfeld LastName und FirstName an und implementiert einen
				//Link mit der ID, um die Datenfelder zu löschen
				while($row = $result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row["LastName"]."</td>";
					echo "<td>".$row["FirstName"]."</td>";
					echo "<td><a href=deleteUser.php?id=".$row["ID"].">Löschen</a></td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
</body>
</html>