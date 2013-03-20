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
		<form name="studentbasicprofile"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
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