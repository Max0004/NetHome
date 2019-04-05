<?php
	session_start();
	$username = null;
	$password = null;
	
	$_SESSION["logged_in"] = false;	//Setzt die Session für verknüpfte Dateien auf false
	
	$url = ("../../Index.html");	//Speichert den Link zu Index.html in der Variable $url
	echo "<script type='text/javascript'>document.location.href='{$url}';</script>";	//Leitet auf die in $url gespeicherte Datei um
?>