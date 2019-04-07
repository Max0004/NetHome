<?php

	include "../DB_Connection/dbconnect.php";
	//Speichert übertragende Werte on lokalen Variablen
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	
	$sql = "SELECT * FROM users WHERE UserID= $username OR Password=$password;";
	$result = $conn->query($sql);
	if($result ->num_rows > 0){
			session_start();
			$_SESSION["logged_in"] = $result->object->ID;	//Setzt die Session für die verknüpften Dateien auf true
			$url = "adminControl.php?login=success";
			echo "Funktioniert";
			//header("location: $url");
		}
	else{
		$url = ("adminLogin.php");
		echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
	}
?>