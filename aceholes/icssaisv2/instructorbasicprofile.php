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
		<form name="instructorbasicprofile"/>
			<a href ="instructorhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructorbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a><br/><br/>
			
			<h4>BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td>[firstname]</td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td>[lastname]</td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>[gender]</td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td>[email address]</td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td>[mobile no.]</td>
				</tr>
			</table>
			
			<a href ="instructoracadprofile.php">Academic Information</a><br/>
			<a href ="instructoreditbasicinfo.php">Edit Basic Information</a><br/>
			<a href ="instructorchangepassword.php">Change Password</a><br/>
		</form>
	</body>
</html>