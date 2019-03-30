<!DOCTYPE html>
<html>
<head>
	<title>Kontoeinzüge</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
	<center><h2>Kontoeinzüge</h2></center>
		<input type="button" value="Abbrechen" style="width: 15em; height: 3em;" onclick="window.location.href='money.php'"/><br>
		<form method="post" action="addMoney.php">
			<?php
				include "../dbconnect.php";
				$sql = "SELECT FirstName, LastName FROM users;";
				$result = $conn->query($sql);
		
		if($result ->num_rows > 0){
			echo "<select name='Name'>";
			while($row = $result->fetch_assoc()){
				echo "<option value='".$row["FirstName"].$row["LastName"]."'>".$row["FirstName"].$row["LastName"]."</option>";
			}
			echo "</select>";
		}
			?>
		</form>
	</div>
</body>
</html>