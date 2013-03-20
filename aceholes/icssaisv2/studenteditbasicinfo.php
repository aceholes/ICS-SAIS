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
		<form name="studenteditbasicinfo"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a><br/><br/>
			<a href ="studentbasicprofile.php">Basic Information</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentacadprofile.php">Academic Information</a><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="student_edit_firstname" placeholder="First Name"/></td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td><input type="text" name="student_edit_lastname" placeholder="Last Name"/></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>
						<input type="radio" name="student_edit_gender" value="male"/> Male
						<input type="radio" name="student_edit_gender" value="female"/> Female
					</td>
				</tr>
				<tr>
					<td>ADDRESS</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="text" name="student_edit_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="text" name="student_edit_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td>CONTACT NO.</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="number" name="student_edit_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="number" name="student_edit_collegecontact" placeholder="College Address Contact No."/></td>
				</tr>
			</table>
			
			
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