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
		<form name="adminchangepassword"/>
			<a href ="adminhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="adminprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="admin_password_old" placeholder="Old Password Here"></td>
					
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="admin_password_new" placeholder="New Password Here"></td>
					
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="admin_password_new_retype" placeholder="Retype New Password Here"></td>
					
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="admin_changepassword_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			<a href ="adminviewusers.php">View Users</a><br/>
			<a href ="adminadduser.php">Add User</a><br/>
			<a href ="admindeleteusers.php">Delete Users</a><br/>
			<a href ="adminrequestapproval.php">Registration Requests Approval</a><br/>
			<a href ="adminaccountactivation.php">Account Activation</a><br/>
			<a href ="adminlogfiles.php">User Log Files</a><br/>
			
		</form>
	</body>
</html>