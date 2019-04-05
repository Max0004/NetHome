<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Neuer Bewohner</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
		<input type="button" value="Abbrechen" style="width: 15em; height: 3em;" onclick="window.location.href='../adminControl.php'"/><br>
		<center><h4>Neuen Nutzer anlegen</h4></center>
		<form method="post" action="addUserProcess.php">
		<table>
			<tr>
			<td><label>Vorname:</td>
			<td></label><input type="text" name="firstname" required /></td>
			</tr>
			<tr>
			<td><label>Nachname:</label></td>
			<td><input type="text" name="lastname" required /></td>
			</tr>
			<tr>
			<td><label>Geburtsdatum:</td>
			<td></label><input type="date" name="birthdate" required /></td>
			</tr>
			<tr>
			<td><label>EMail:</td><td></label><input type="email" name="Email" required /></td>
			</tr>
			<tr>
			<td><label>Arbeit:</td><td></label><input type="text" name="workplace" required /></td>
			</tr>
			<tr>
			<td><label>Position:</td><td></label><input type="text" name="position" required /></td>
			</tr>
			<tr>
			<td><label> </td>
			<td></label><input type="submit" /></td>
			</tr>
		</table>
		</form>
		<table border=1 cellpadding=1 cellspacing=1>
			<tr>
				<th>Vorname</th>
				<th>Nachname</th>
				<th>Geburtsdatum</th>
				<th>EMail</th>
				<th>Arbeitsplatz</th>
				<th>Position</th>
			</tr>
			<?php
				include "../../DB_Connection/dbconnect.php";
				//Ruft die Werte in der Tabelle users auf und baut einen Inner Join zu household auf
				$sql = "SELECT users.FirstName,users.LastName,users.Birthdate,users.EMail,users.Workplace,household.Position FROM users INNER JOIN household ON household.UserID=users.ID;";
				
				$result = $conn->query($sql); //Führt den SQL-Befehl aus
				
				//Zeigt die abgefragten Werte in einer Tabelle an
				//Durchläuft eine Schleife bis zum Ende der Tabelle
				while($row = $row = $result->fetch_assoc()){
					echo "<tr>";
					echo "<td>".$row["FirstName"]."</td>";
					echo "<td>".$row["LastName"]."</td>";
					echo "<td>";
					echo date ("d.M.Y", strtotime($row["Birthdate"]));
					echo "</td>";
					echo "<td>".$row["EMail"]."</td>";
					echo "<td>".$row["Workplace"]."</td>";
					echo "<td>".$row["Position"]."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
</body>
</html>