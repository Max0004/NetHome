<!DOCTYPE html>
<html>
<head>
	<title>Finanzübersicht</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
		<center><h2>Haushaltskasse</h2></center>
		<input type="button" value="Zurück zur Übersicht" style="width: 15em; height: 3em;" onclick="window.location.href='../../html/adminControl.html'"/><br>
		<br><input type="button" value="Unternehme Kontoeinzüge" style="width: 13em; height: 2em;" onclick="window.location.href='addMoney.php'"/>
		<br><input type="button" value="Unternehme Kontoauszüge" style="width: 13em; height: 2em;" onclick="window.location.href='removeMoney.php'"/><br>
		<?php
			include "../dbconnect.php";
		?>
		<table>
		<tr><td>
		<table cellspacing="12px">
			<tr>
				<th>Konto</th>
				<th>Guthaben</th>
			</tr>
			<?php
			include "../dbconnect.php";
			
			$sql = "SELECT FirstName, LastName, Money FROM users;";
			$result = $conn->query($sql);
		
			if($result ->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "<tr>"."<td>".$row["FirstName"]."</td>"."<td style='text-align: right;'>".$row["Money"]."€"."</td>"."</tr>";
			}
		}
			?>
		</table>
			<?php
			include "../dbconnect.php";
			
			$sql2 = "SELECT SUM(Money) FROM users;";
			foreach($conn->query($sql2) as $row2){
			echo "Die Haushaltskasse beträgt ".$row2["SUM(Money)"]."€";
			}
			?>
	</div>
</body>
</html>