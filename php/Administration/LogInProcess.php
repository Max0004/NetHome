<?php

session_start();

	//Speichert übertragende Werte on lokalen Variablen
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//Überprüft die Ausgabe mit den festen Werten und leitet je nach Ergebnis um
	if($username == "MusterHaus1789" && $password == "mvemJSUNp9"){
		$url = "adminControl.php";
		$_SESSION["logged_in"] = true;	//Setzt die Session für die verknüpften Dateien auf true
		echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
	}
	else{
		$url = ("adminLogin.php");
		echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
	}
?>