<?php
	require "db_connect.php";
	require "header.php";
	session_start();
	
	if(empty($_SESSION['type']));
	else if(strcmp($_SESSION['type'], "librarian") == 0)
		header("Location: librarian/home.php");
	else if(strcmp($_SESSION['type'], "member") == 0)
		header("Location: member/home.php");
		
         
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="css/index_style.css" />
	</head>
	<body>
		<div id="allTheThings">
			<div id="member">
				<a href="member">
					<img src="img/icon-g9c9f7fca3_640.png" width="200px" height="200px"/><br />
					&nbsp;Member Login
				</a>
			</div>
			<div id="verticalLine">
				<div id="librarian">
					<a id="librarian-link" href="librarian">
						<img src="img/librarian.jpg" width="200px" height="200px" /><br />
						&nbsp;&nbsp;&nbsp;Librarian Login
					</a>
				</div>
			</div>
		</div>
	</body>
</html>