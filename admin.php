<?php
	ob_start();
	session_start();
?>
<html>
	<head>
		<title>Admin Panel - MineMTACraft Project</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="EN" />
		<link rel="Shortcut icon" href="iconka.png" />
		<link rel="stylesheet" type="text/css" href="css/index.css" />
	</head>
	<body bgcolor="#000000">
		<?php
			if ($_SESSION['logged']) {
				echo('<div id="links">');
				echo('You logged in as '.$_SESSION['nick'].'! [ <a href="logout.php">Logout</a> | <a href="index.php">Home</a> ]');
				echo('</div>');
			} else {
				echo('<div id="links">');
				echo('You arent logged in. [ <a href="login.php">Login</a> | <a href="index.php">Home</a> ]');
				echo('</div>');
			}
		?>
		<div id="logo">
			<center>
				Admin Panel - MineMTACraft Project</title>
			</center>
		</div>
		<br>
		<br>
		<?php
			mysql_connect('localhost','root','sebastian1995')
				or die('Error with connect to Database');
			
			mysql_select_db('site')
				or die('Error with connect to DB');
				
			
			ob_end_flush();
		?>
	</body>
</html>