<!DOCTYPE html>
<html>
<head>
	<title>Bewohnerinformationen</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="mainheader">
		<list>
			<ul>
				<li><a href="../index.html">Start</a></li>
				<li><a href="../html/houseinform.html">Hausinformation</a></li>
				<li class="active"><a href="users.php">Bewohner</a></li>
				<li><a href="workplan.php">Arbeitsplan</a></li>
				<li style="float: right;"><a href="../php/Administration/adminLogin.php">Login</a></li>
			</ul>
		</list>
	</div>
	<div class="contentbox">
	<center><h2>Im Haushalt registrierte Nutzer</h2></center>
	<?php
		include "dbconnect.php";
	
		$sql = "SELECT * FROM users;";
		$result = $conn->query($sql);
		
		if($result ->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo $row["FirstName"]."<br>";
				echo $row["LastName"]."<br>";
				echo date ("d.M.Y", strtotime($row["Birthdate"]))."<br>";
				echo $row["Workplace"]."<br><br>";
			}
		}
		else{
			echo "0 results";
		}
	$conn->close();
	?>
	</div>
</body>
</html>