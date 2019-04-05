<?php
session_start();	//Startet eine Session und leitet auf die Hauptseite um, wenn man nicht angemeldet ist
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../Index.html");

?>
<html>
<head>
	<title>Admin-Kontrollfeld</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<meta charset="UTF8" /> <!--Gibt Sonderzeichen aus-->
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
	<input type="button" value="Adminmodus verlassen" style="width: 15em; height: 3em;" onclick="window.location.href='LogOutProcess.php'"/><br><p>
	<h3>Sie sind jetzt als Admin angemeldet. Unten stehen folgende Optionen.</h3>
		<table>
			<tr>
				<td class="selectAdministration"><h2><a href="userAdministration/postWork.php">Aufträge zuweisen</a></h2></td>
			</tr>
			<tr>
				<td class="selectAdministration"><h2><a href="inventoryAdministration/addInventory.php">Objekt im Haus hinzufügen</a></h2></td>
			</tr>
			<tr>
				<td class="selectAdministration"><h2><a href="inventoryAdministration/removeInventory.php">Objekt aus Haus entfernen</a></h2></td>
			</tr>
			<tr>
				<td class="selectAdministration"><h2><a href="moneyAdministration/money.php">Finanzen</a></h2></td>
			</tr>
			<tr>
				<td class="selectAdministration"><h2><a href="userAdministration/addUser.php">Person im Haus hinzufügen</a></h2></td>
			</tr>
			<tr>
				<td class="selectAdministration"><h2><a href="userAdministration/removeUser.php">Person aus Haus entfernen</a></h2></td>
			</tr>
		</table>
	</div>
</body>
</html>