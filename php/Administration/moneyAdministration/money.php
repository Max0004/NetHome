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
		<input type="button" value="Zurück zur Übersicht" style="width: 15em; height: 3em;" onclick="window.location.href='../../../html/adminControl.html'"/><br>
		<?php
		include "../../DB_Connection/dbconnect.php";
			
			$sql = "SELECT FirstName, LastName, Money FROM users;";
			$result = $conn->query($sql);
		
			if($result ->num_rows > 0){
		echo "<br><input type='button' value='Unternehme Kontoein- und -auszüge' style='width: 19em; height: 2em;' onclick='window.location.href='changeMoney.php''/><br>";
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
				$color = "black";
				if($row["Money"] < 0){
					$color = "red";
					echo "<tr>"."<td>".$row["FirstName"]."</td>"."<td style='text-align: right; color:$color;'>".$row["Money"]."€"."</td>"."</tr>";
				}
				else{
					echo "<tr>"."<td>".$row["FirstName"]."</td>"."<td style='text-align: right; color:$color;'>".$row["Money"]."€"."</td>"."</tr>";
				}
			}
		}
		else{
			echo "In diesem Haushalt sind keine Einwohner registriert";
		}
			?>
		</table>
			<?php
			include "../../DB_Connection/dbconnect.php";
			
			$sql2 = "SELECT SUM(Money) FROM users;";
			
			$result2 = $conn->query($sql2);
		
			if($result2 ->num_rows > 0){
				$color = "black";
				$row2 = $result2->fetch_assoc();
				if($row2["SUM(Money)"] < 0){
					$color = "red";
				}
				foreach($conn->query($sql2) as $row2){
				echo "<table><tr><td>"."Die Haushaltskasse beträgt "."</td><td style='color:$color;'>".$row2["SUM(Money)"]."€";
				}
			}
			?>
	</div>
</body>
</html>