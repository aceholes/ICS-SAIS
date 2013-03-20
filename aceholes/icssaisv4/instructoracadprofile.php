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
		<form name="instructoracadprofile"/>
			<a href ="instructorhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructorbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a><br/><br/>
			<a href ="instructorbasicprofile.php">Basic Information</a><br/>
			
			<h4>ACADEMIC INFORMATION</h4>
			<table>
				<tr>
					<td>DESIGNATION</td>
					<td>[designation]</td>
				</tr>
				<tr>
					<td>RANK</td>
					<td>[rank]</td>
				</tr>
				<tr>
					<td>FACULTY ROOM</td>
					<td>[faculty room]</td>
				</tr>
				<tr>
					<td>SP ADVISEES</td>
					<td>[sp advisees]</td>
				</tr>
				<tr>
					<td>REGISTRATION ADVISEES</td>
					<td>[registration advisees]</td>
				</tr>
				<tr>
					<td>PREVIOUS SUBJECTS TAUGHT</td>
					<td>[previous subjects taught]</td>
				</tr>
				<tr>
					<td>CURRENT SUBJECTS TAUGHT</td>
					<td>[current subjects taught]</td>
				</tr>
				<tr>
					<td>PREVIOUS SCHEDULES</td>
					<td>[previous schedules]</td>
				</tr>
			</table>
			
			
			<a href ="instructoreditbasicinfo.php">Edit Basic Information</a><br/>
			<a href ="instructorchangepassword.php">Change Password</a><br/>
		</form>
	</body>
</html>