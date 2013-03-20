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
		<form name="studenteditbasicinfo"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			<a href ="studentbasicprofile.php">Basic Information</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentacadprofile.php">Academic Information</a><br/>
			
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="edit_firstname" placeholder="First Name"/></td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td><input type="text" name="edit_lastname" placeholder="Last Name"/></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>
						<input type="radio" name="edit_gender" value="male"/> Male
						<input type="radio" name="edit_gender" value="female"/> Female
					</td>
				</tr>
				<tr>
					<td>ADDRESS</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="text" name="edit_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="text" name="edit_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td>CONTACT NO.</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="number" name="edit_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="number" name="edit_collegecontact" placeholder="College Address Contact No."/></td>
				</tr>
			</table>
			
			
			<a href ="studentchangepassword.php">Change Password</a><br/>
		</form>
	</body>
</html>