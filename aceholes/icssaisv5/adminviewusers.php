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
		<form name="adminviewusers"/>
			<!-- top right po	-->
			<a href ="adminhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="adminprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>VIEW USERS HERE</h3><br/><br/>
			
			<!-- sidebar po ito :) -->
			<a href ="adminviewusers.php">View Users</a><br/>
			<a href ="adminadduser.php">Add User</a><br/>
			<a href ="admindeleteusers.php">Delete Users</a><br/>
			<a href ="adminrequestapproval.php">Registration Requests Approval</a><br/>
			<a href ="adminaccountactivation.php">Account Activation</a><br/>
			<a href ="adminlogfiles.php">User Log Files</a><br/>
		</form>
	</body>
</html>