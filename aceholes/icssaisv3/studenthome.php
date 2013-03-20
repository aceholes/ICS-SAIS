<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']!=1 && $_SESSION['user']==""){
		header('Location: home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="instructor"){
		header('Location: instructorhome.php');
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
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a>
			
			<h3>WELCOME <?php echo $_SESSION['emailaddress']; ?>!</h3>
			
			<a href ="studentviewgwa.php">GWA</a><br/>
			<a href ="studentviewsubjectstaken.php">Subjects Taken</a><br/>
			<a href ="studentviewelectives.php">Electives</a><br/>
			<a href ="studentviewge.php">GE</a><br/>
			<a href ="studentviewadviser.php">Adviser</a><br/>
			<a href ="studentviewcases.php">Cases</a><br/>
			<a href ="studentviewacademichistory.php">History</a><br/>
			<a href ="studentsendmessage.php">Send Message to Administrator</a>
		</form>
	</body>
</html>