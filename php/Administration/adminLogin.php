<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<center><h1 style="background-color: white; margin-left: 8em; margin-right: 8em;">NetHome</h1></center>
	<div class="mainheader">
		<list>
			<ul>
				<li><a href="../../index.html">Start</a></li>
				<li><a href="../../html/houseinform.html">Hausinformation</a></li>
				<li><a href="../users.php">Bewohner</a></li>
				<li style="float: right;" class="active"><a href="../Administration/adminLogin.php">Login</a></li>
			</ul>
		</list>
	</div>
	<div class="loginform">
		<center><form method="get" action="">
			<div class="login"><input type="text"><span class="tooltip">Name</span></div><br>
			<div class="login"><input type="password"/><span class="tooltip">Passwort</span></div><br>
			<br><input type="submit"/>
		</form></center>
	</div>
</body>
</html>