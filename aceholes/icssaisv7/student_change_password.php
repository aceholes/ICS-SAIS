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
		<form name="student_change_password"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="student_password_old" placeholder="Old Password Here"></td>
					
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="student_password_new" placeholder="New Password Here"></td>
					
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="student_password_new_retype" placeholder="Retype New Password Here"></td>
					
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="student_changepassword_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			<a href ="student_view_grades.php">Subject Grades</a><br/>
			<a href ="student_view_gwa.php">GWA</a><br/>
			<a href ="student_view_subjects_taken.php">Subjects Taken</a><br/>
			<a href ="student_view_allowed_electives.php">Allowed Electives</a><br/>
			<a href ="student_view_approved_electives.php">Approved Electives</a><br/>
			<a href ="student_view_approved_ge.php">Approved GE</a><br/>
			<a href ="student_view_reg_adviser.php">Registration Adviser</a><br/>
			<a href ="student_view_sp_adviser.php">SP Adviser</a><br/>
			<a href ="student_view_cases.php">Cases</a><br/>
			<a href ="student_view_academic_history.php">Academic History</a><br/>
			<a href ="student_send_message.php">Send Message to Administrator</a>
			
		</form>
	</body>
</html>