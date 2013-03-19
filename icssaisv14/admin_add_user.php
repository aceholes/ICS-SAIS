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
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
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
							<input type="radio" name="admin_add_user_role" value="student" required="required"/> Student
							<input type="radio" name="admin_add_user_role" value="instructor" required="required"/> Instructor
							<input type="radio" name="admin_add_user_role" value="encoder" required="required"/> Encoder
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<input type="text" name="admin_add_user_number1" required="required" autocomplete="on" pattern="^(1[0-9]{3}|8[0-9]{3}|19(09|[1-9][0-9])|(20((0[0-9])|(1[0-2]))))" maxlength="4" size="4" placeholder="Role"/>-
						<input type="text" name="admin_add_user_number2" required="required" autocomplete="on" pattern="[0-9]{5}" maxlength="5" size="5"placeholder="Number"/>
					</tr>

					<tr>
						<td><input type="text" name="admin_add_user_firstname" required="required" autocomplete="on" pattern="^(([A-Z][a-z]*\ )|([A-Z][a-z]*))*" placeholder="First Name"/></td>
					</tr>
					<tr>
						<td><input type="text" name="admin_add_user_lastname" required="required" autocomplete="on" pattern="^(([A-Z][a-z]*\ )|([A-Z][a-z]*))*" placeholder="Last Name"/></td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="admin_add_user_gender" value="Male" required="required" /> Male
							<input type="radio" name="admin_add_user_gender" value="Female" required="required" /> Female
						</td>
					</tr>
					<tr>
						<td><input type="email" name="admin_add_user_emailaddress" required="required" autocomplete="on" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Email Address"/></td>
					</tr>
					<tr>
						<td><input type="text" name="admin_add_user_username" required="required" autocomplete="on" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Username"/></td>
					</tr>
					<tr>
						<td><input type="password" name="admin_add_user_password" required="required" autocomplete="on" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Password"/></td>
						<?php
							if($_SESSION["admin_add_user_password_match_error"]==1){
								echo "<td>Passwords do not match!</td>";
								$_SESSION["admin_add_user_password_match_error"]=0;
							}
						?>
					</tr>
					<tr>
						<td><input type="password" name="admin_add_user_password_retype" required="required" autocomplete="on" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{8,}$" placeholder="Retype Password"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="admin_add_user_submit" value="Add"/></td>
					</tr>
				</table>
			
			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>