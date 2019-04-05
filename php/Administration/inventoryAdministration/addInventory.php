<?php
session_start();
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) header("location: ../../../Index.html");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Neues Möbelstück</title>
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
</head>
<body><!--"Work in Progress"-->
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="contentbox">
		<input type="button" value="Zurück zur Übersicht" style="width: 15em; height: 3em;" onclick="window.location.href='../adminControl.php'"/><br>	<!--Kehrt zur Kontrollfläche zurück-->
	</div>
</body>
</html>