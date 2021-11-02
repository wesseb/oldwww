<?php
	ob_start();
	session_start();
	include("mta_sdk.php");
?>
<html>
	<head>
	<title>Register - MineMTACraft Project</title>
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
			ob_end_flush();
		?>
		<div id="logo">
			<center>
				Register - MineMTACraft Project
			</center>
		</div>
		<br>
		<br>
		<br>
		<?php
			mysql_connect('localhost', 'root', 'sebastian1995')
				or die('Nieudane polaczenie z baza danych...');
				
			mysql_select_db('site')
				or die('Nie udalo sie wybrac bazy danych...');
 
			echo '<div id="registerpanel">
			<center>
			<form action="register.php" method="POST">
			Nick: <br />
			<input type="text" name="nick"><br />
			Password: <br />
			<input type="password" name="pass"><br />
			<input type="submit" name="ok" value="Register">
			</form>
			</center>
			</div>';

			if(isset($_POST['ok']))
				{
					$nick = trim($_POST['nick']);
					$pass = trim($_POST['pass']);

					if(empty($nick) || empty($pass)) echo '<div id="Error">Fill all labels!</div>';
				
					else
						{
				
							$nick = strip_tags( mysql_real_escape_string(HTMLSpecialChars($nick)));
							$pass = strip_tags( mysql_real_escape_string(HTMLSpecialChars($pass)));
							$result = mysql_query("SELECT * FROM users WHERE nick='$nick'");
		
							if(mysql_num_rows($result)!=0) echo '<div id="Error">Account name is already used!</div>';
					
							else
								{
									$data = time();
									$pass = md5($pass);
									$query = "INSERT INTO `users` (`nick` , `pass`, `data_rejestracji`, `premium`, `admin`) VALUES ('$nick', '$pass', '$data', 0, 0)";
									if(mysql_query($query)) echo '<div id="done">You are registered! <a href="login.php">Login!</a></div>';
								
									
								}
						}
				}
			mysql_close(); 
		?>
	</body>
</html>