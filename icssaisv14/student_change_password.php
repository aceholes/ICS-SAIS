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
		<form name="student_change_password" action="student_change_password_redirect.php" method="post"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="student_password_old" autofocus="autofocus" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Old Password Here"></td>
					<?php
						if($_SESSION['password_not_found']==1){ 
							echo "<td>Invalid password.</td>";
							$_SESSION['password_not_found']=0;
						}
					?>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="student_password_new" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="New Password Here"/></td>
					<?php
						if($_SESSION['password_match_error']==1){
							 echo "<td>Passwords do not match.</td>";
							 $_SESSION['password_match_error']=0;
						}
					?>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="student_password_new_retype" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Retype New Password Here"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="student_change_password_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>
		</form>
	</body>
</html>