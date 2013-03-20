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
		<form name="instructor_change_password" action="instructor_change_password_redirect.php" method="post"/>
			<a href ="instructor_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="instructor_password_old" placeholder="Old Password Here"></td>
					<?php
						if($_SESSION['password_old_error']==1){ 
							echo "<td>Please fill out your old password.</td>";
							$_SESSION['password_old_error']=0;
						}
						if($_SESSION['password_not_found']==1){ 
							echo "<td>Invalid password.</td>";
							$_SESSION['password_not_found']=0;
						}
					?>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="instructor_password_new" placeholder="New Password Here"></td>
					<?php
						if($_SESSION['password_new_error']==1){ 
							echo "<td>Please fill out your new password.</td>";
							$_SESSION['password_new_error']=0;
						}
						if($_SESSION['password_match_error']==1){
							 echo "<td>Passwords do not match.</td>";
							 $_SESSION['password_match_error']=0;
						}
					?>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="instructor_password_new_retype" placeholder="Retype New Password Here"></td>
					<?php
						if($_SESSION['password_new_retype_error']==1){
							 echo "<td>Please retype your new password.</td>";
							 $_SESSION['password_new_retype_error']=0;
						}
					?>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="instructor_change_password_submit" value="Change Password"/></td>
				</tr>
			</table>
			
			
			<a href ="instructor_view_previous_students.php">Previous Students</a><br/>
			<a href ="instructor_view_previous_reg_advisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructor_view_previous_sp_advisees.php">Previous SP Advisees</a><br/>
			<a href ="instructor_view_current_reg_advisees.php">Current Registration Advisees</a><br/>
			<a href ="instructor_view_current_sp_advisees.php">Current SP Advisees</a><br/>
			<a href ="instructor_view_grad_sp_advisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>