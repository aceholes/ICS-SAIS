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
		<form name="admin_delete_basic_info"/>
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>DELETE BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>ADDRESS</td>
					<td><input type="text" name="admin_add_address" placeholder="Address"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td><input type="number" name="admin_add_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="admin_add_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="admin_add_submit" value="Submit"/>
					</td>
				</tr>
			</table>
			
			
			<a href ="admin_edit_basic_info.php">Edit</a><br/>
			<a href ="admin_add_basic_info.php">Add</a><br/>
			<a href ="admin_change_password.php">Change Password</a><br/><br/>
			
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_delete_users.php">Delete Users</a><br/>
			<a href ="admin_request_approval.php">Registration Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">User Log Files</a><br/>
		</form>
	</body>
</html>