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
		<form name="encodereditbasicinfo"/>
			<a href ="encoderhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoderprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="encoder_edit_firstname" placeholder="First Name"/></td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td><input type="text" name="encoder_edit_lastname" placeholder="Last Name"/></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>
						<input type="radio" name="encoder_edit_gender" value="male"/> Male
						<input type="radio" name="encoder_edit_gender" value="female"/> Female
					</td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="text" name="encoder_edit_emailaddress" placeholder="Email Address"/></td>
				</tr>
				<tr>
					<td>ADDRESS</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="text" name="encoder_edit_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="text" name="encoder_edit_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td>CONTACT NO.</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="number" name="encoder_edit_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="number" name="encoder_edit_collegecontact" placeholder="College Address Contact No."/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="encoder_edit_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="encoder_edit_submit" value="Submit"/>
					</td>
				</tr>
			</table>
			
			
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