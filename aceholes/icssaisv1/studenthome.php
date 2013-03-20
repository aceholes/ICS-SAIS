<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']!=1){
		header('Location: home.php');
		exit;
	}
?>
<html>
	<head>
		<title>
			
		</title>
	</head>
	<body>
		<form name="studenthome"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentlogoutredirect.php">Sign-out</a>
			
			<h3>WELCOME <?php echo $_SESSION['emailaddress']; ?>!</h3>
			
		</form>
	</body>
</html>