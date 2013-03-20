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
		<form name="admineditbasicinfo"/>
			<a href ="adminhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="adminprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="admin_edit_firstname" placeholder="First Name"/></td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td><input type="text" name="admin_edit_lastname" placeholder="Last Name"/></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>
						<input type="radio" name="admin_edit_gender" value="male"/> Male
						<input type="radio" name="admin_edit_gender" value="female"/> Female
					</td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="text" name="admin_edit_emailaddress" placeholder="Email Address"/></td>
				</tr>
				<tr>
					<td>ADDRESS</td>
					<td><input type="text" name="admin_edit_address" placeholder="Address"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td><input type="number" name="admin_edit_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="admin_edit_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="admin_edit_submit" value="Submit"/>
					</td>
				</tr>
			</table>
			
			
			<a href ="adminaddbasicinfo.php">Add</a><br/>
			<a href ="admindeletebasicinfo.php">Delete</a><br/>
			<a href ="adminchangepassword.php">Change Password</a><br/><br/>
			
			<a href ="adminviewusers.php">View Users</a><br/>
			<a href ="adminadduser.php">Add User</a><br/>
			<a href ="admindeleteusers.php">Delete Users</a><br/>
			<a href ="adminrequestapproval.php">Registration Requests Approval</a><br/>
			<a href ="adminaccountactivation.php">Account Activation</a><br/>
			<a href ="adminlogfiles.php">User Log Files</a><br/>
		</form>
	</body>
</html>