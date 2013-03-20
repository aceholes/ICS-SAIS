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
		<form name="student_send_message" action="student_send_message_redirect.php" method="post"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/>
			
			<h3>MESSAGES HERE</h3>

			<b>Compose Message</b>&nbsp;&nbsp;&nbsp;
			<a href="student_messages.php">Inbox</a> &nbsp;&nbsp;&nbsp;
			<a href="student_messages_sentbox.php">Sentbox</a><br/>
			
			Subject: <br/>
			<input type="text" name="student_send_message_subject" size="65" autofocus="autofocus" autocomplete="on" required="required"/><br/><br/>
			Message: <br/>
			<textarea name="student_send_message_body" cols="50" rows="20" wrap="hard" autocomplete="on" required="required"></textarea><br/><br/>
			<input type="submit" name="student_send_message_submit" value="Send"/><br/><br/>

			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>
		</form>
	</body>
</html>