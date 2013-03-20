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
		<form name="studentbasicprofile"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
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
					<td>ADDRESS</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td>[home address]</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td>[college address]</td>
				</tr>
				<tr>
					<td>CONTACT NO.</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td>[home contact no.]</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td>[college contact no.]</td>
				</tr>
			</table>
			
			<a href ="studentacadprofile.php">Academic Information</a><br/>
			<a href ="studenteditbasicinfo.php">Edit Basic Information</a><br/>
			<a href ="studentchangepassword.php">Change Password</a><br/>
		</form>
	</body>
</html>