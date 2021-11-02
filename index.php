<?php
	ob_start();
	session_start();
?>
<html>
	<head>
		<title>Index Page - MineMTACraft Project</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="EN" />
		<meta name="Author" content="Wesseb" />
		<meta http-equiv="Reply-To" content="wesseb@interia.pl" />
		<meta name="Robots" content="all" />
		<link rel="Shortcut icon" href="iconka.png" />
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		
		<script type="text/javascript" src="js/swfobject.js"></script>
		<script type="text/javascript" src="js/CU3ER.js"></script>
		<script type="text/javascript">
			var vars = { xml_location : 'CU3ER-config.xml' };
			var params = { bgcolor : '#ffffff' };
			var attributes = { id:'CU3ER', name:'CU3ER' };
			swfobject.embedSWF('CU3ER.swf', 'CU3ER', 640, 480, "9.0.45", "js/expressInstall.swf", vars, params, attributes );
			var CU3ER = new CU3ER("CU3ER");
		</script>
		
	</head>
	<body bgcolor="#000000">
		<?php
			if ($_SESSION['logged']) {
				echo('<div id="links">');
				echo('You logged in as '.$_SESSION['nick'].'! [ <a href="logout.php">Logout</a> ]');
				echo('</div>');
			} else {
				echo('<div id="links">');
				echo('You arent logged in. [ <a href="login.php">Login</a> | <a href="register.php">Register</a> ]');
				echo('</div>');
			}
			ob_end_flush();
		?>
		<div id="logo">
			<center>MineMTACraft Project</center>
		</div>
		<br>
		<center>
		<div id="CU3ER">
			<noscript>
				<!--...-->
			</noscript>
		</div>
		</center>
		<br>
		<br>
		<!--<div id="menu">
			<center>
				<tr>
					<td>
						<a href="chat.php">Chat system!</a>
					</td>
				</tr>
			</center>
		</div>-->
		<br>
		<br>
		<div id="stopka">
			<center>Copyright by Wesseb</center>
		</div>
	</body>
</html>