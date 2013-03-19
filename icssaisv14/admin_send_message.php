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
		<form name="admin_send_message"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>MESSAGES HERE</h3>
			
			<b>Compose Message</b>&nbsp;&nbsp;&nbsp;	
			<a href="admin_messages.php">Inbox</a> &nbsp;&nbsp;&nbsp;
			<a href="admin_student_sentbox.php">Sentbox</a><br/>

			Subject: <br/>
			<input type="text" name="admin_send_message_subject" size="65" autofocus="autofocus" autocomplete="on" required="required"/><br/><br/>
			Message: <br/>
			<textarea name="admin_send_message_body" cols="50" rows="20" wrap="hard" autocomplete="on" required="required"></textarea><br/><br/>
			<input type="submit" name="admin_send_message_submit" value="Send"/><br/><br/>

			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>