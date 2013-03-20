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
		<form name="admin_change_password" action="admin_change_password_redirect.php" method="post"/>
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="admin_password_old" autofocus="autofocus" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Old Password Here"></td>
					<?php
						if($_SESSION['password_not_found']==1){ 
							echo "<td>Invalid password.</td>";
							$_SESSION['password_not_found']=0;
						}
					?>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="admin_password_new" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="New Password Here"/></td>
					<?php
						if($_SESSION['password_match_error']==1){
							 echo "<td>Passwords do not match.</td>";
							 $_SESSION['password_match_error']=0;
						}
					?>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="admin_password_new_retype" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Retype New Password Here"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="admin_change_password_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>