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
		<form name="adminprofile"/>
			<a href ="adminhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="adminprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h4>BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td>[firstname]</td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td>[lastname]</td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>[gender]</td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td>[email address]</td>
				</tr>
				<tr>
					<td>ADDRESS</td>
					<td>[address]</td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td>[home contact no.]</td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td>[mobile no.]</td>
				</tr>
			</table>
			
			<!-- ikaw na bahala kung san to. :) -->
			<a href ="admineditbasicinfo.php">Edit</a><br/>
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