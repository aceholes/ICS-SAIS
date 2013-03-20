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
		<form name="instructor_add_basic_info"/>
			<a href ="instructor_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>ADD BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>HOME ADDRESS</td>
					<td><input type="text" name="instructor_add_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td>COLLEGE ADDRESS</td>
					<td><input type="text" name="instructor_add_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT</td>
					<td><input type="number" name="instructor_add_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>COLLEGE CONTACT</td>
					<td><input type="number" name="instructor_add_collegecontact" placeholder="College Address Contact No."/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="instructor_add_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="instructor_add_submit" value="Submit"/>
					</td>
				</tr>
			</table>
			
			
			<a href ="instructor_edit_basic_info.php">Edit</a><br/>
			<a href ="instructor_delete_basic_info.php">Delete</a><br/>
			<a href ="instructor_change_password.php">Change Password</a><br/><br/>
			
			<a href ="instructor_view_previous_students.php">Previous Students</a><br/>
			<a href ="instructor_view_previous_reg_advisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructor_view_previous_sp_advisees.php">Previous SP Advisees</a><br/>
			<a href ="instructor_view_current_reg_advisees.php">Current Registration Advisees</a><br/>
			<a href ="instructor_view_current_sp_advisees.php">Current SP Advisees</a><br/>
			<a href ="instructor_view_grad_sp_advisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>