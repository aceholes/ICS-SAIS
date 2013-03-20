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
		<form name="encoderhome"/>
			<!-- top right po	-->
			<a href ="encoderhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoderprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>WELCOME HOME ENCODER!</h3><br/><br/>
			
			<!-- sidebar po ito :) -->
			<a href ="encoderviewstudentacad.php">View User Academic Profile</a><br/>
			<a href ="encoderadduser.php">Add User</a><br/>
			<a href ="encoderedituser.php">Edit User</a><br/>
			<a href ="encoderdeleteusers.php">Delete Users</a><br/>
			
		</form>
	</body>
</html>