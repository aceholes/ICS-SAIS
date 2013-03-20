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
		<form name="encoderchangepassword"/>
			<a href ="encoderhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoderprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="encoder_password_old" placeholder="Old Password Here"></td>
					
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="encoder_password_new" placeholder="New Password Here"></td>
					
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="encoder_password_new_retype" placeholder="Retype New Password Here"></td>
					
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="encoder_changepassword_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			<a href ="encoderviewstudentacad.php">View User Academic Profile</a><br/>
			<a href ="encoderadduser.php">Add User</a><br/>
			<a href ="encoderedituser.php">Edit User</a><br/>
			<a href ="encoderdeleteusers.php">Delete Users</a><br/>
			
		</form>
	</body>
</html>