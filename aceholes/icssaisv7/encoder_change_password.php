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
		<form name="encoder_change_password"/>
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
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
			
			<a href ="encoder_view_student_acad.php">View User Academic Profile</a><br/>
			<a href ="encoder_add_user.php">Add User</a><br/>
			<a href ="encoder_edit_user.php">Edit User</a><br/>
			<a href ="encoder_delete_users.php">Delete Users</a><br/>
		</form>
	</body>
</html>