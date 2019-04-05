<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Konto Ein- und Auszüge</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
	<center><h2>Konto Ein- und Auszüge</h2></center>
		<input type="button" value="Abbrechen" style="width: 15em; height: 3em;" onclick="window.location.href='money.php'"/><br>
		<form method="get" action="changeMoneyProcess.php">
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
			echo "<input type='number' step='0.01' name='newmoney' required >€</input><br>";
			echo "<input type='submit' />";
		}
			?>
		</form>
	</div>
</body>
</html>