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
		<form name="home_signup_more" action="home_signup_more_redirect.php" method="post">
			<h2>More information...</h2>
			<table>
				<tr>
					<td><input type="text" name="signup_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td><input type="text" name="signup_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_homecontact" placeholder="Home Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_collegecontact" placeholder="College Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td><input type="submit" name="signup_skip" value="Skip"/></td>
					<td><input type="submit" name="signup_submit" value="Submit"/></td>
				</tr>
			</table>
		</form>
	</body>
	
</html>