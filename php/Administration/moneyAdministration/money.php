<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Finanzübersicht</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
		<center><h2>Haushaltskasse</h2></center>
		<input type="button" value="Zurück zur Übersicht" style="width: 15em; height: 3em;" onclick="window.location.href='../adminControl.php'"/><br>
		<br><input type='button' value='Unternehme Kontoein- und -auszüge' style='width: 19em; height: 2em;' onclick="window.location.href='changeMoney.php'"/><br>
		<?php
		include "../../DB_Connection/dbconnect.php";
			
			$sql = "SELECT FirstName, LastName, Money FROM users;";
			$result = $conn->query($sql);
		
			if($result ->num_rows > 0){
		echo "<table>";
		echo "<tr><td>";
		echo "<table cellspacing='12px'>";
			echo "<tr>";
				echo "<th>Konto</th>";
				echo "<th>Guthaben</th>";
			echo "</tr>";
			}
			?>
			<?php
			include "../../DB_Connection/dbconnect.php";
			
			$sql = "SELECT FirstName, LastName, Money FROM users;";
			$result = $conn->query($sql);
		
			if($result ->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$color = "black";	//setzt $color auf den Defaultwert Schwarz
				if($row["Money"] < 0){
					//Wenn Money kleiner als Null ist, wird $color überschrieben mit Rot
					$color = "red";
					echo "<tr>"."<td>".$row["FirstName"]."</td>"."<td style='text-align: right; color:$color;'>".$row["Money"]."€"."</td>"."</tr>";
				}
				else{
					//Wenn Money >= 0 ist, bleibt $color auf Schwarz
					echo "<tr>"."<td>".$row["FirstName"]."</td>"."<td style='text-align: right; color:$color;'>".$row["Money"]."€"."</td>"."</tr>";
				}
			}
		}
		else{
			//Gibt diesen Text aus, wenn keine Inhalte in der Tabelle users vorhanden sind
			echo "In diesem Haushalt sind keine Einwohner registriert";
		}
			?>
		</table>
			<?php
			include "../../DB_Connection/dbconnect.php";
			
			$sql2 = "SELECT SUM(Money) FROM users;";
			
			$result2 = $conn->query($sql2);
		
			if($result2 ->num_rows > 0){
				$color = "black";	//Setzt den Defaultwert für $color auf Schwarz ("schwarze Zahlen")
				$row2 = $result2->fetch_assoc();
				if($row2["SUM(Money)"] < 0){
					//Wenn SUM(Money) kleiner als 0 ist, wird $color überschrieben mit Rot ("rote Zahlen")
					$color = "red";
				}
				foreach($conn->query($sql2) as $row2){
				//Schreibt die Zeile auf und setzt die Summe von Money mit der übermittelten Farbe
				echo "<table><tr><td>"."Die Haushaltskasse beträgt "."</td><td style='color:$color;'>".$row2["SUM(Money)"]."€";
				}
			}
			?>
	</div>
</body>
</html>