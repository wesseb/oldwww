<?php
	ob_start();
	session_start();
?>
<html>
	<head>
		<title>Profile - MineMTACraft Project</title>
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
				Profile - MineMTACraft Project
			</center>
		</div>
		<br>
		<br>
		<?php
			if ($_SESSION['logged']) {
				echo '<div id="menu">
				<center>
				Your ID: '.$_SESSION['id'].'
				<br>
				Your Nick: '.$_SESSION['nick'].'
				</center>
				</div>';
			} else {
				echo '<div id="Error">
				You arent logged in
				</div>';
			}
			ob_end_flush();
		?>
	</body>
</html>