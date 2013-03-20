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
						<td><input type="text" name="signup_firstname" placeholder="First Name"/></td>
					</tr>
					<tr>
						<td><input type="text" name="signup_lastname" placeholder="Last Name"/></td>
					</tr>
					<tr>
						<td>
							<input type="radio" name="signup_gender" value="male"/> Male
							<input type="radio" name="signup_gender" value="female"/> Female
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
						<td><input type="password" name="signup_retype_password" placeholder="Retype Password"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="signup_submit" value="Sign Up"/></td>
					</tr>
				</table>
		</form>
	</body>
	
</html>