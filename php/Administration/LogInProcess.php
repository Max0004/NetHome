<?php

	//Speichert übertragende Werte on lokalen Variablen
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//Überprüft die Ausgabe mit den festen Werten und leitet je nach Ergebnis um
	if($username == "MusterHaus1789" && $password == "mvemJSUNp9"){
		$url = "../../html/adminControl.html";
		echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
	}
	else{
		$url = ("adminLogin.php");
		echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
	}
?>