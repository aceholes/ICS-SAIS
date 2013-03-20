<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']!=1 && $_SESSION['user']==""){
		header('Location: home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="student"){
		header('Location: studenthome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="encoder"){
		header('Location: encoderhome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="admin"){
		header('Location: adminhome.php');
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
			<a href ="instructorhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructorbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a>
			
			<h3>WELCOME <?php echo $_SESSION['emailaddress']; ?>!</h3>
			
			
		</form>
	</body>
</html>