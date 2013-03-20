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
		<form name="instructoreditbasicinfo"/>
			<a href ="instructorhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructorprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="instructor_edit_firstname" placeholder="First Name"/></td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td><input type="text" name="instructor_edit_lastname" placeholder="Last Name"/></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>
						<input type="radio" name="instructor_edit_gender" value="male"/> Male
						<input type="radio" name="instructor_edit_gender" value="female"/> Female
					</td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="text" name="instructor_edit_emailaddress" placeholder="Email Address"/></td>
				</tr>
				<tr>
					<td>ADDRESS</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="text" name="instructor_edit_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="text" name="instructor_edit_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td>CONTACT NO.</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="number" name="instructor_edit_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="number" name="instructor_edit_collegecontact" placeholder="College Address Contact No."/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="instructor_edit_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="instructor_edit_submit" value="Submit"/>
					</td>
				</tr>
			</table>
			
			
			<a href ="instructoraddbasicinfo.php">Add</a><br/>
			<a href ="instructordeletebasicinfo.php">Delete</a><br/>
			<a href ="instructorchangepassword.php">Change Password</a><br/><br/>
			
			<a href ="instructorviewpreviousstudents.php">Previous Students</a><br/>
			<a href ="instructorviewpreviousregadvisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructorviewpreviousspadvisees.php">Previous SP Advisees</a><br/>
			<a href ="instructorviewcurrentregadvisees.php">Current Registration Advisees</a><br/>
			<a href ="instructorviewcurrentspadvisees.php">Current SP Advisees</a><br/>
			<a href ="instructorviewgradspadvisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>