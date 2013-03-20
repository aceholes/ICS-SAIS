<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']==1 && $_SESSION['user']=="student"){
		header('Location: student_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="instructor"){
		header('Location: instructor_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="encoder"){
		header('Location: encoder_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="admin"){
		header('Location: admin_home.php');
		exit;
	}
	
?>

<html>
	<head>
		<title>
			ICS SAIS
		</title>
	</head>
	<body>
		<form name="home_login_error" action="home_redirect.php" method="post">
			<h1>ICS SAIS</h1>
				<input type="text" name="login_username" placeholder="Username"/> &nbsp;&nbsp;&nbsp;
				<input type="password" name="login_password" placeholder="Password"/>
				<input type="submit" value="Log In" name="login_submit"/><br/><br/><br/>
				<?php
					if($_SESSION['errorlogin']==1){
						echo "Invalid account. Please try again.";
						$_SESSION['errorlogin']=0;
					}else if($_SESSION['pending']==1){
						echo "Your registration is not yet approved.";
						$_SESSION['pending']=0;
					}else if($_SESSION['deactivated']==1){
						echo "Your account is deactivated.";
						$_SESSION['deactivated']=0;
					}else if($_SESSION['wait']==1){
						echo "You should wait for the administrator to approve your registration request.";
						$_SESSION['wait']=0;
					}
				?>
			
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