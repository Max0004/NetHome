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
				<li><a href="../UserControl/users.php">Bewohner</a></li>
				<li><a href="../UserControl/workplan.php">Arbeitsplan</a></li>
				<li style="float: right;" class="active"><a href="#">Login</a></li>
			</ul>
		</list>
	</div>
	<div class="loginform">
		<center><form method="post" action="LogInProcess.php">
			<div class="login"><input name="username" type="text" required /><span class="tooltip">Name</span></div><br>
			<div class="login"><input name="password" type="password" required /><span class="tooltip">Passwort</span></div><br>
			<br><input type="submit" name="submit" />
		</form></center>
	</div>
</body>
</html>