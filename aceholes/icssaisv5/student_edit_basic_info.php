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
		<form name="student_edit_basic_info" action="student_edit_basic_info_redirect.php" method="post"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>HOME ADDRESS</td>
					<td><input type="text" name="student_edit_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td>COLLEGE ADDRESS</td>
					<td><input type="text" name="student_edit_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td><input type="number" name="student_edit_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>COLLEGE CONTACT NO.</td>
					<td><input type="number" name="student_edit_collegecontact" placeholder="College Address Contact No."/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="student_edit_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="text" name="student_edit_emailaddress" placeholder="Email Address"/></td>
				</tr>
				
				<tr>
					<td><input type="submit" name="student_edit_submit" value="Submit"/></td>
				</tr>
			</table>
			
			
			<a href ="student_add_basic_info.php">Add</a><br/>
			<a href ="student_delete_basic_info.php">Delete</a><br/>
			<a href ="student_change_password.php">Change Password</a><br/><br/>
			
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