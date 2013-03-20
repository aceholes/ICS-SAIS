<!DOCTYPE HTML>
<?php
	session_start();
?>

<html>
	<head>
		<title>
			ICS SAIS
		</title>
	</head>
	<body>
		<form name="home_signup_student_more" action="home_signup_student_more_redirect.php" method="post">
			<h2>More information...</h2>
			<table>
				<tr>
					<td><input type="text" name="signup_homeaddress" autofocus="autofocus" autocomplete="on"  title="Invalid home address." placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td><input type="text" name="signup_collegeaddress" autocomplete="on"  title="Invalid college address." placeholder="College Address"/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_homecontact" autocomplete="on" pattern="^[0-9]{7,11}$"  title="Invalid home contact no." placeholder="Home Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_collegecontact" autocomplete="on" pattern="^[0-9]{7,11}$"  title="Invalid college contact no." placeholder="College Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_mobile" autocomplete="on" pattern="^[0-9]{7,11}$"  title="Invalid mobile no." placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td><input type="submit" name="signup_submit" value="Submit"/></td>
				</tr>
			</table>
		</form>
	</body>
	
</html>