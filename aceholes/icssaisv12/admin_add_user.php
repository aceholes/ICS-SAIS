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
		<form name="admin_add_user" action="admin_add_user_redirect.php" method="post"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<?php
				if($_SESSION["added"]==1){
					echo "User successfully added.";
					$_SESSION["added"]=0;
				}
			?>

			<h2>Add User</h2>
				<table>
					<tr>
						<td>
							<input type="radio" name="admin_add_user_role" value="student"/> Student
							<input type="radio" name="admin_add_user_role" value="instructor"/> Instructor
							<input type="radio" name="admin_add_user_role" value="encoder"/> Encoder
						</td>
						<?php
							if($_SESSION["admin_add_user_role_error"]==1){
								echo "<td>Please fill out your role.</td>";
								$_SESSION["admin_add_user_role_error"]=0;
							}

						?>
					</tr>
					<tr>
						<td><input type="number" name="admin_add_user_number" placeholder="Number"/></td>
						<?php
							if($_SESSION["admin_add_user_number_error"]==1){
								echo "<td>Please fill out your number.</td>";
								$_SESSION["admin_add_user_number_error"]=0;
							}

							if($_SESSION["admin_add_user_number_invalid"]==1){
								echo "<td>Invalid number.</td>";
								$_SESSION["admin_add_user_number_invalid"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="text" name="admin_add_user_firstname" placeholder="First Name"/></td>
						<?php
							if($_SESSION["admin_add_user_firstname_error"]==1){
								echo "<td>Please fill out your first name.</td>";
								$_SESSION["admin_add_user_firstname_error"]=0;
							}

							if($_SESSION["admin_add_user_firstname_invalid"]==1){
								echo "<td>Invalid first name.</td>";
								$_SESSION["admin_add_user_firstname_invalid"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="text" name="admin_add_user_lastname" placeholder="Last Name"/></td>
						<?php
							if($_SESSION["admin_add_user_lastname_error"]==1){
								echo "<td>Please fill out your last name.</td>";
								$_SESSION["admin_add_user_lastname_error"]=0;
							}

							if($_SESSION["admin_add_user_lastname_invalid"]==1){
								echo "<td>Invalid last name.</td>";
								$_SESSION["admin_add_user_lastname_invalid"]=0;
							}
						?>
					</tr>
					<tr>
						<td>
							<input type="radio" name="admin_add_user_gender" value="Male"/> Male
							<input type="radio" name="admin_add_user_gender" value="Female"/> Female
						</td>
						<?php
							if($_SESSION["admin_add_user_gender_error"]==1){
								echo "<td>Please fill out your gender.</td>";
								$_SESSION["admin_add_user_gender_error"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="text" name="admin_add_user_emailaddress" placeholder="Email Address"/></td>
						<?php
							if($_SESSION["admin_add_user_emailaddress_error"]==1){
								echo "<td>Please fill out your email address.</td>";
								$_SESSION["admin_add_user_emailaddress_error"]=0;
							}

							if($_SESSION["admin_add_user_emailaddress_invalid"]==1){
								echo "<td>Invalid email address.</td>";
								$_SESSION["admin_add_user_emailaddress_invalid"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="text" name="admin_add_user_username" placeholder="Username"/></td>
						<?php
							if($_SESSION["admin_add_user_username_error"]==1){
								echo "<td>Please fill out your username.</td>";
								$_SESSION["admin_add_user_username_error"]=0;
							}

							if($_SESSION["admin_add_user_username_invalid"]==1){
								echo "<td>Invalid username.</td>";
								$_SESSION["admin_add_user_username_invalid"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="password" name="admin_add_user_password" placeholder="Password"/></td>
						<?php
							if($_SESSION["admin_add_user_password_error"]==1){
								echo "<td>Please fill out your password.</td>";
								$_SESSION["admin_add_user_password_error"]=0;
							}

							if($_SESSION["admin_add_user_password_match_error"]==1){
								echo "<td>Passwords do not match.</td>";
								$_SESSION["admin_add_user_password_match_error"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="password" name="admin_add_user_password_retype" placeholder="Retype Password"/></td>
						<?php
							if($_SESSION["admin_add_user_password_retype_error"]==1){
								echo "<td>Please retype your password.</td>";
								$_SESSION["admin_add_user_password_retype_error"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="submit" name="admin_add_user_submit" value="Sign Up"/></td>
					</tr>
				</table>
			
			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Registration Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">User Log Files</a><br/>
		</form>
	</body>
</html>