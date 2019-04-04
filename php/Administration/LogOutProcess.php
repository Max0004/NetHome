<?php
	session_start();
	$username = null;
	$password = null;
	
	$_SESSION["logged_in"] = false;
	
	$url = ("../../Index.html");
	echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
?>