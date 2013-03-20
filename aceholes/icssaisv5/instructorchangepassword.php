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
		<form name="instructorchangepassword"/>
			<a href ="instructorhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructorprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="instructor_password_old" placeholder="Old Password Here"></td>
					
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="instructor_password_new" placeholder="New Password Here"></td>
					
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="instructor_password_new_retype" placeholder="Retype New Password Here"></td>
					
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="instructor_changepassword_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			
			<a href ="instructorviewpreviousstudents.php">Previous Students</a><br/>
			<a href ="instructorviewpreviousregadvisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructorviewpreviousspadvisees.php">Previous SP Advisees</a><br/>
			<a href ="instructorviewcurrentregadvisees.php">Current Registration Advisees</a><br/>
			<a href ="instructorviewcurrentspadvisees.php">Current SP Advisees</a><br/>
			<a href ="instructorviewgradspadvisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>