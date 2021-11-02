<?php
	ob_start();
	session_start();
?>
<html>
	<head>
		<title>Login - MineMTACraft Project</title>
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
				echo('You arent logged in. [ <a href="register.php">Register</a> | <a href="index.php">Home</a> ]');
				echo('</div>');
			}
		?>
		<div id="logo">
			<center>
				Login - MineMTACraft Project
			</center>
		</div>
		<br>
		<br>
		<?php
			mysql_connect('localhost', 'root', 'sebastian1995')
				or die('Nieudane polaczenie z baza danych...');
 
			mysql_select_db('site')
				or die('Nie udalo sie wybrac bazy danych...');
 
			if($_SESSION['logged']) echo '<div id="Error">You are logged in</div>';
			else
				{
					echo '<div id="registerpanel">
					<center>
					<form action="login.php" method="POST">
					Nick: <br />
					<input type="text" name="nick"><br />
					Password: <br />
					<input type="password" name="pass"><br />
					<input type="submit" name="ok" value="Login">
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
									$nick = strip_tags( mysql_real_escape_string( HTMLSpecialChars($nick)));
									$pass = strip_tags( mysql_real_escape_string( HTMLSpecialChars($pass)));
 
									$pass = md5($pass);
 
									$result = mysql_query("SELECT * FROM users WHERE nick='$nick' AND pass='$pass'");
 
									if(mysql_num_rows($result)==0) echo '<div id="Error">Bad username or password!</div>';
									else
										{
											$row = mysql_fetch_array($result);
 
											$_SESSION['logged'] = true;
 
											$_SESSION['id'] = $row['id'];
											$_SESSION['nick'] = $row['nick'];
											$_SESSION['data_rejestracji'] = $row['data_rejestracji'];
											$_SESSION['premium'] = $row['premium'];
											$_SESSION['admin'] = $row['admin'];
 
											echo '<div id="done">You are logged in. <a href="index.php">Main site!</a></div></a>';
										}
								}
						}
				}
 
			mysql_close();
 
			ob_end_flush(); 
		?>
	</body>
</html>