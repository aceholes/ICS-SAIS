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
		<form name="encoder_change_password" action="encoder_change_password_redirect.php" method="post"/>
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="encoder_password_old" autofocus="autofocus" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Old Password Here"></td>
					<?php
						if($_SESSION['password_not_found']==1){ 
							echo "<td>Invalid password.</td>";
							$_SESSION['password_not_found']=0;
						}
					?>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="encoder_password_new" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="New Password Here"></td>
					<?php
						if($_SESSION['password_match_error']==1){
							 echo "<td>Passwords do not match.</td>";
							 $_SESSION['password_match_error']=0;
						}
					?>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="encoder_password_new_retype" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$"  placeholder="Retype New Password Here"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="encoder_change_password_submit" value="Change Password"/></td>
				</tr>
			</table>
			<a href="encoder_course.php"> Courses </a><br/>
			<a href="encoder_adviser.php"> Adviser </a><br/>
			<a href="encoder_case.php"> Case </a><br/>	
		</form>
	</body>
</html>