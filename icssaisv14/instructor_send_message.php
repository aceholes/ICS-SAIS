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
		<form name="instructor_send_message" action="instructor_send_message_redirect.php" method="post"/>
			<a href ="instructor_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/>
			
			<h3>SEND MESSAGE HERE</h3>
			

			<b>Compose Message</b>&nbsp;&nbsp;&nbsp;
			<a href="instructor_messages.php">Inbox</a> &nbsp;&nbsp;&nbsp;
			<a href="instructor_messages_sentbox.php">Sentbox</a><br/>

			Subject: <br/>
			<input type="text" name="instructor_send_message_subject" size="65" autofocus="autofocus" autocomplete="on" required="required"/><br/><br/>
			Message: <br/>
			<textarea name="instructor_send_message_body" cols="50" rows="20" wrap="hard" autocomplete="on" required="required"></textarea><br/><br/>
			<input type="submit" name="instructor_send_message_submit" value="Send"/><br/><br/>

			<a href ="instructor_view_previous_students.php">Previous Students</a><br/>
			<a href ="instructor_view_previous_reg_advisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructor_view_previous_sp_advisees.php">Previous SP Advisees</a><br/>
			<a href ="instructor_view_current_reg_advisees.php">Current Registration Advisees</a><br/>
			<a href ="instructor_view_current_sp_advisees.php">Current SP Advisees</a><br/>
			<a href ="instructor_view_grad_sp_advisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>