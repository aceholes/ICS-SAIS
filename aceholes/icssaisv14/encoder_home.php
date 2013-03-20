<!DOCTYPE HTML>
<?php
	session_start();
?>
<html>
	<head>
		<title>
			
		</title>
	</head>
	<body>
		<form name="encoder_home">
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>WELCOME <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>!</h3>
			
			<a href="encoder_course.php"> Courses </a><br/>
			<a href="encoder_adviser.php"> Adviser </a><br/>
			<a href="encoder_case.php"> Case </a><br/>
		</form>
	</body>
</html>