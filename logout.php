<?php
	ob_start();
	session_start();
?>
<html>
	<head>
		<title>Logout - MineMTACraft Project</title>
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
		<div id="Logo">
			<center>
				Logout - MineMTACraft Project
			</center>
		</div>
		<br>
		<br>
		<?php
			if ($_SESSION['logged']) {
				$_SESSION['logged'] = false;
				$_SESSION['nick'] = '';
				$_SESSION['id'] = '';
				echo '<div id="done">You are logged out! <a href="index.php">Index</a></div>';
			} else {
				echo '<div id="Error">You arent logged in! <a href="index.php">Back</a></div>';
			}
		ob_end_flush();
		?>
	</body>
</html>