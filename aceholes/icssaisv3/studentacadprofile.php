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
		<form name="studentacadprofile"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a><br/><br/>
			<a href ="studentbasicprofile.php">Basic Information</a><br/>
			
			<h4>ACADEMIC INFORMATION</h4>
			<table>
				<tr>
					<td>REGISTRATION ADVISER</td>
					<td>[registration adviser]</td>
				</tr>
				<tr>
					<td>SP ADVISER</td>
					<td>[sp adviser]</td>
				</tr>
				<tr>
					<td>PREVIOUS SP ADVISERS</td>
					<td>[previous sp advisers]</td>
				</tr>
				<tr>
					<td>CURRICULUM</td>
					<td>[curriculum]</td>
				</tr>
				<tr>
					<td>GE COURSES</td>
					<td>[ge courses]</td>
				</tr>
				<tr>
					<td>ELECTIVES</td>
					<td>[electives]</td>
				</tr>
				<tr>
					<td>EXTRA SUBJECTS</td>
					<td>[extra subjects]</td>
				</tr>
				<tr>
					<td>GRADES</td>
					<td>[grades]</td>
				</tr>
			</table>
			
			<a href ="studenteditbasicinfo.php">Edit Basic Information</a><br/>
			<a href ="studentchangepassword.php">Change Password</a><br/><br/>
			
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