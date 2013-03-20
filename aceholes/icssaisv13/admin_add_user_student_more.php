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
		<form name="admin_add_user_student_more" action="admin_add_user_student_more_redirect.php" method="post"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h2>More information...</h2>
			<table>
				<tr>
					<td><input type="text" name="admin_add_user_homeaddress" autofocus="autofocus" autocomplete="on" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td><input type="text" name="admin_add_user_collegeaddress" autocomplete="on" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td><input type="number" name="admin_add_user_homecontact" autocomplete="on" pattern="^[0-9]{11}$" placeholder="Home Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="admin_add_user_collegecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="College Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="admin_add_user_mobile" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td><input type="submit" name="admin_add_user_submit" value="Submit"/></td>
				</tr>
			</table>

			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>