<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']!=1){
		header('Location: home.php');
		exit;
	}
?>
<html>
	<head>
		<title>
		
		</title>
	</head>
	<body>
		<form name="studentchangepassword" action="studentchangepassword_redirect.php" method="post"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<a href ="studentbasicprofile.php">Basic Information</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentacadprofile.php">Academic Information</a><br/>
			
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="studentpassword_old" placeholder="Old Password Here"></td>
					<?php
						if($_SESSION['password_old_error']==1) echo "<td>Please fill out your old password.</td>";
					?>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="studentpassword_new" placeholder="New Password Here"></td>
					<?php
						if($_SESSION['password_new_error']==1) echo "<td>Please fill out your new password.</td>";
						if($_SESSION['password_match_error']==1) echo "<td>Passwords do not match.</td>";
					?>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="studentassword_new_retype" placeholder="Retype New Password Here"></td>
					<?php
						if($_SESSION['password_new_retype_error']==1) echo "<td>Please retype your new password.</td>";
					?>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="studentchangepassword_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			
			
		</form>
	</body>
</html>