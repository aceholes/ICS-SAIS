<!DOCTYPE HTML>
<?php
	session_start();
	$_SESSION["login"]=0;
	$_SESSION["user"]="";
	$_SESSION["errorlogin"]=0;
	$_SESSION["password_not_found"]=0;
	$_SESSION["password_old_error"]=0;
	$_SESSION["password_new_error"]=0;
	$_SESSION["password_new_retype_error"]=0;
	$_SESSION["password_match_error"]=0;
	$_SESSION["signup_role_error"]=0;
	$_SESSION["signup_number_error"]=0;
	$_SESSION["signup_firstname_error"]=0;
	$_SESSION["signup_lastname_error"]=0;
	$_SESSION["signup_gender_error"]=0;
	$_SESSION["signup_emailaddress_error"]=0;
	$_SESSION["signup_username_error"]=0;
	$_SESSION["signup_password_error"]=0;
	$_SESSION["signup_password_retype_error"]=0;
	$_SESSION["edit_basic_info_successful"]=0;
	$_SESSION["change_password_successful"]=0;
	$_SESSION["signup_number_invalid"]=0;
	$_SESSION["signup_firstname_invalid"]=0;
	$_SESSION["signup_lastname_invalid"]=0;
	$_SESSION["signup_emailaddress_invalid"]=0;
	$_SESSION["signup_username_invalid"]=0;
	$_SESSION["signup_password_match_error"]=0;
	$_SESSION["edit_basic_info_successful"]=0;
	$_SESSION["change_password_successful"]=0;
?>

<html>
	<head>
		<title>
			ICS SAIS
		</title>
	</head>
	<body>
		<form name="home" action="home_redirect.php" method="post">
			<h1>ICS SAIS</h1>
				<input type="text" name="login_username" placeholder="Username"/> &nbsp;&nbsp;&nbsp;
				<input type="password" name="login_password" placeholder="Password"/>
				<input type="submit" value="Log In" name="login_submit"/><br/><br/><br/>
				
			
			<h2>Sign-up</h2>
				<table>
					<tr>
						<td>
							<input type="radio" name="signup_role" value="student"/> Student
							<input type="radio" name="signup_role" value="instructor"/> Instructor
						</td>
					</tr>
					<tr>
						<td><input type="number" name="signup_number" placeholder="Number"/></td>
					</tr>
					<tr>
						<td><input type="text" name="signup_firstname" placeholder="First Name"/></td>
					</tr>
					<tr>
						<td><input type="text" name="signup_lastname" placeholder="Last Name"/></td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="signup_gender" value="Male"/> Male
							<input type="radio" name="signup_gender" value="Female"/> Female
						</td>
					</tr>
					<tr>
						<td><input type="text" name="signup_emailaddress" placeholder="Email Address"/></td>
					</tr>
					<tr>
						<td><input type="text" name="signup_username" placeholder="Username"/></td>
					</tr>
					<tr>
						<td><input type="password" name="signup_password" placeholder="Password"/></td>
					</tr>
					<tr>
						<td><input type="password" name="signup_password_retype" placeholder="Retype Password"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="signup_submit" value="Sign Up"/></td>
					</tr>
				</table>
		</form>
	</body>
	
</html>