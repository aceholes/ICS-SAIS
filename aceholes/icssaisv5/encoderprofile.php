<!DOCTYPE HTML>
<?php
	session_start();
?>

<html>
	<head>
		<title>
		
		</title>
	</head>
	<body>
		<form name="encoderbasicprofile"/>
			<a href ="encoderhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoderprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
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
				<tr>
					<td>MOBILE NO.</td>
					<td>[mobile no.]</td>
				</tr>
			</table>
			
			<!-- ikaw na bahala kung san to. :) -->
			<a href ="encodereditbasicinfo.php">Edit</a><br/>
			<a href ="encoderaddbasicinfo.php">Add</a><br/>
			<a href ="encoderdeletebasicinfo.php">Delete</a><br/>
			<a href ="encoderchangepassword.php">Change Password</a><br/><br/>
			
			<a href ="encoderviewstudentacad.php">View User Academic Profile</a><br/>
			<a href ="encoderadduser.php">Add User</a><br/>
			<a href ="encoderedituser.php">Edit User</a><br/>
			<a href ="encoderdeleteusers.php">Delete Users</a><br/>
		</form>
	</body>
</html>